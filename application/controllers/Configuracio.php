<?php
//Controlador per carregar els Vehicles

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuari_model');
		$this->load->model('configuracio_model');
        //$this->load->model('vehicle_model');
        $this->load->helper('url_helper');
        $this->load->library('ion_auth');
        $this->load->library('grocery_CRUD');
    }

    public function index(){
        //Si esta loggejat carregarem la pagina de vehicles
        if($this->ion_auth->logged_in() ){
            $data['id'] = $this->session->userdata('user_id');
            $data['correu'] = $this->session->userdata('email');
            $data['nom'] = $this->ion_auth->user()->row();
            $data['foto_url'] = $this->obtenir_foto();

            $data['dades_configuracio'] = $this->obtenir_dades_configuracio();
			$data['data_ultima_copia'] = $this->obtenir_data_copia_bd();
            //$data['vehicles'] = $this->obtenir_vehicles_user($data['id']);

            $this->load->view('configuracio', $data);
        }else{redirect('auth/login', 'refresh');}
    }



    public function obtenir_foto(){
        //Foto per defecte
        return "assets/img/icono-usuariDefecte.png";
    }

	//Obrenir dades CONFIGURACIO
	public function obtenir_dades_configuracio(){
		$dades_configuracio = $this->configuracio_model->get_config_bd();
		return $dades_configuracio;
	}

	//Realitzar backup bd
	public function realitzar_backupbd(){
    	//Guardem la ruta que fiqui el usuari
		$ruta_backup = $_POST['valorRutaBackup'];
		$this->configuracio_model->set_parametre_bd('ruta_backup',$ruta_backup);

		//Fem la copia
		//MySQL server and database
		$dbhost = 'localhost';
		$dbuser = $this->db->username;
		$dbpass = $this->db->password;
		$dbname = $this->db->database;
		$tables = '*';

		$link = mysqli_connect($dbhost,$dbuser,$dbpass, $dbname);

		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit;
		}
		mysqli_query($link, "SET NAMES 'utf8'");

		//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysqli_query($link, 'SHOW TABLES');
			while($row = mysqli_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

		$return = '';
		//cycle through
		foreach($tables as $table)
		{
			$result = mysqli_query($link, 'SELECT * FROM '.$table);
			$num_fields = mysqli_num_fields($result);
			$num_rows = mysqli_num_rows($result);

			$return.= 'DROP TABLE IF EXISTS '.$table.';';
			$row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			$counter = 1;

			//Over tables
			for ($i = 0; $i < $num_fields; $i++)
			{   //Over rows
				while($row = mysqli_fetch_row($result))
				{
					if($counter == 1){
						$return.= 'INSERT INTO '.$table.' VALUES(';
					} else{
						$return.= '(';
					}

					//Over fields
					for($j=0; $j<$num_fields; $j++)
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = str_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}

					if($num_rows == $counter){
						$return.= ");\n";
					} else{
						$return.= "),\n";
					}
					++$counter;
				}
			}
			$return.="\n\n\n";
		}
		//save file
		$hoy = getdate();
		$hoy['hours']=$hoy['hours']+1;
		$fileName = $ruta_backup.'/db-backup-'.$hoy['mday'].'-'.$hoy['month'].'-'.$hoy['year'].' '.$hoy['hours'].'-'.$hoy['minutes'].'.sql';
		$handle = fopen($fileName,'w+');
		fwrite($handle,$return);
		if(fclose($handle)){
			echo true;
			exit;
		}else{
			echo false;
			exit;
		}
    }

    //Obtenir data ultima copia
	public function obtenir_data_copia_bd(){
    	$dades_config = $this->obtenir_dades_configuracio();
		foreach ($dades_config as $dada_config){
			if ($dada_config['nom_parametre'] == 'ruta_backup'){
				$ruta_backup = $dada_config['valor'];
			}
		}
		return date('d F Y H:i:s', filemtime($ruta_backup));
	}


}
