<?php
//Controlador per carregar l'Intranet

defined('BASEPATH') OR exit('No direct script access allowed');

class Intranet extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuari_model');
        $this->load->helper('url_helper');
        $this->load->library('ion_auth');
        //$this->load->library('grocery_CRUD');
    }

    public function index(){
        //Si esta loggejat carregarem la intranet
        if($this->ion_auth->logged_in() ){
            $data['id'] = $this->session->userdata('user_id');
            $data['correu'] = $this->session->userdata('email');
            $data['nom'] = $this->ion_auth->user()->row();
            $data['foto_url'] = $this->obtenir_foto();
            $data['registre_cron'] = $this->obtenir_registre_cron();

            $data['usuaris'] = $this->obtenir_usuaris();
            $data['grups_usuaris'] = $this->obtenir_grups_usuaris();
            $data['estatserveis'] = $this->obtenir_monitoreig_serveis();

            //$data['punts'] = $this->loteria_model->get_puntuacio_usuari($this->session->userdata('user_id'));
            //$data['usuaris'] = $this->loteria_model->get_usuaris_bd();
            $this->load->view('intranet', $data);
        }else{redirect('auth/login', 'refresh');}
    }
    public function obtenir_foto(){
        //Foto per defecte
        return "assets/img/icono-usuariDefecte.png";
    }

    //Monitoreig Monitors RASPBERRY
    public function obtenir_monitoreig_raspberry(){
        $temperatura = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
        $us_cpu = shell_exec('ps aux | awk \' {cpu+=$3} END {printf("%d%%",cpu) }\'');
        $memoria = shell_exec('cat /proc/meminfo | grep Mem');
        $espai = shell_exec('df -h | grep /dev/root');
        $array_monitoreig = array($temperatura,$us_cpu,$memoria,$espai);
        print_r(json_encode($array_monitoreig));
    }

    //Monitoreig Serveis RASPBERRY
    public function obtenir_monitoreig_serveis(){
        $ftp = shell_exec('service vsftpd status');
        $ftp = explode(' ', $ftp);
        if (in_array("(running)", $ftp)){$ftp=true;}else{$ftp=false;}
        $apache = shell_exec('service apache2 status');
        $apache = explode(' ', $apache);
        if (in_array("(running)", $apache)){$apache=true;}else{$apache=false;}
        $noip = shell_exec('ping pieye.ddns.net -c 1');
        $noip = explode(',', $noip);
        if (in_array(" 1 received", $noip)){$noip=true;}else{$noip=false;}
        $mysql = shell_exec('service mysql status');
        $mysql = explode(' ', $mysql);
        if (in_array("(running)", $mysql)){$mysql=true;}else{$mysql=false;}
        $ssh = shell_exec('service ssh status');
        $ssh = explode(' ', $ssh);
        if (in_array("(running)", $ssh)){$ssh=true;}else{$ssh=false;}
        $red = shell_exec('ifconfig wlan0 | grep netmask');
        $red = explode(' ', $red);
        $cpu_info = shell_exec(' cat /proc/cpuinfo | grep -e Model -e model');
        $cpu_info = explode(':', $cpu_info);
        $so_info = shell_exec('cat /etc/os-release | grep PRETTY');
        $so_info = explode('"', $so_info);
        $array_monitoreig_serveis = array($ftp,$apache,$noip,$mysql,$ssh,$red,$cpu_info,$so_info);
        return $array_monitoreig_serveis;
    }

    //Obrenir Usuaris RASPBERRY
    public function obtenir_usuaris(){
        $usuaris = $this->usuari_model->get_usuaris_bd();
        return $usuaris;
    }
    //Obrenir Grups Usuaris RASPBERRY
    public function obtenir_grups_usuaris(){
        $usuaris = $this->usuari_model->get_usuaris_grups_bd();
        return $usuaris;
    }

    //Mostrar VISTA SOFTWARE WINDOWS
    public function mostrar_software_windows(){
      if($this->ion_auth->logged_in() ){
          $data['id'] = $this->session->userdata('user_id');
          $data['correu'] = $this->session->userdata('email');
          $data['nom'] = $this->ion_auth->user()->row();
          $data['foto_url'] = $this->obtenir_foto();

          $this->load->view('software_windows', $data);
      }else{redirect('auth/login', 'refresh');}
    }

    //Mostrar VISTA SOFTWARE APPLE
    public function mostrar_software_apple(){
      if($this->ion_auth->logged_in() ){
          $data['id'] = $this->session->userdata('user_id');
          $data['correu'] = $this->session->userdata('email');
          $data['nom'] = $this->ion_auth->user()->row();
          $data['foto_url'] = $this->obtenir_foto();

          $this->load->view('software_mac', $data);
      }else{redirect('auth/login', 'refresh');}
    }

    //Mostrar VISTA SOFTWARE ANDROID
    public function mostrar_software_android(){
      if($this->ion_auth->logged_in() ){
          $data['id'] = $this->session->userdata('user_id');
          $data['correu'] = $this->session->userdata('email');
          $data['nom'] = $this->ion_auth->user()->row();
          $data['foto_url'] = $this->obtenir_foto();

          $this->load->view('software_android', $data);
      }else{redirect('auth/login', 'refresh');}
    }

    //Enviar correu electronic d'avís a eloi.roca20@gmail.com
    public function enviar_correu_electronic(){
      if($this->ion_auth->logged_in() ){
            shell_exec('echo "Test" | mail -a "From: Pieye <eloi@compsaonline.com>" -s "TEST" eloi.roca20@gmail.com');
      }
    }

    //Llegir el fitxer de Log del Cron
    public function obtenir_registre_cron(){
      $liniesFitxer=array();
      if ($file = fopen(base_url('assets/logs/LogCronRaspberry.log'), "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            array_push($liniesFitxer,$line);
        }
        fclose($file);
      }
      //Girem el array
      $liniesFitxer = array_reverse($liniesFitxer);
      return $liniesFitxer;
    }

/*
    //Metode que guardara les dades del login i Logejara
    public function dades_login(){

        if($this->input->post() ){
            $nom = $this->input->post('nom');
            $contrasenya = $this->input->post('contra');
            $recordar = $this->input->post('recordar');


            $this->ion_auth->login($nom, $contrasenya, $recordar);

            if($this->ion_auth->logged_in() ){
                //Si loggeja passem les dades a la vista de la Intranet
                /*echo "<pre>";
                    print_r($this->session->all_userdata());
                echo "</pre>";
                $data['id'] = $this->session->userdata('user_id');
                $data['correu'] = $this->session->userdata('email');
                $data['nick'] = $this->session->userdata('identity');
                $data['lote'] = $this->generar_loteria();
                $data['punts'] = $this->loteria_model->get_puntuacio_usuari();


                $data['usuaris'] = $this->loteria_model->get_usuaris_bd();

                $this->load->view('intranet', $data);

            }else{redirect(Intranet);}
        }
    }

    //Metode per gestionar la taula Puntuacio
    public function grosery(){
        //GROCERY CRUD
        $this->grocery_crud->set_table('puntuacio');
        $this->grocery_crud->columns('usuari_id','usuari','punts','comentari');
        $this->grocery_crud->edit_fields('usuari_id','usuari','punts','comentari');

        $output = $this->grocery_crud->render();
        $this->exemple_output($output);
    }
    public function exemple_output($output = null)
    {
        $grup = $this->ion_auth->get_users_groups()->result();
        $grup[0]->id;
        if ($grup[0]->id == 1){
            $this->load->view('example.php',$output);

        }
    }

    //Metode que generara la Loteria
    public function generar_loteria(){
        //Generem la Loteria per passarla

        $numeros_sortits = array();
        $long_array = count($numeros_sortits);

        for ($i=0; $i<=5; $i++){
            while ($long_array<=5){
                $numero=rand(1, 15);

                if (in_array($numero, $numeros_sortits)){

                }
                else{
                    array_push($numeros_sortits, $numero);
                }
                $long_array = count($numeros_sortits);

            }

        }
        return $data['lote'] = $numeros_sortits;
    }


    //Metode que comprovara i donara punts al Usuari
    public function comprovar_loteria(){
        $punts = 0;

        if ($this->input->post('numero_sol1') == $this->input->post('numero1') ){
            $punts+=22;
        }
        if ($this->input->post('numero_sol2') == $this->input->post('numero2') ){
            $punts+=55;
        }
        if ($this->input->post('numero_sol3') == $this->input->post('numero3') ){
            $punts+=70;
        }
        if ($this->input->post('numero_sol4') == $this->input->post('numero4') ){
            $punts+=5;
        }
        if ($this->input->post('numero_sol5') == $this->input->post('numero5') ){
            $punts+=88;
        }

        $this->loteria_model->insert_puntuacions($punts);

        redirect('/Intranet', 'location');

    }

    //Metode que guardara les dades del registre i Registrara
    public function dades_registre(){
        if($this->input->post() ){

            $username = $this->input->post('nick');
            $password = $this->input->post('contra');
            $email = $this->input->post('email');
            $additional_data = array(
                                    'first_name' => $this->input->post('nom'),
				    'last_name' => $this->input->post('cognom'),
								);
            $group = array('2'); // Fiquem els usuaris a membres.

            $this->ion_auth->register($username, $password, $email, $additional_data, $group);

            redirect('/Intranet', 'location');
        }
    }

    //Metode que retornara les dades de l'usauri que s'ha triat al combo
    public function dades_usuari(){

        if($this->input->post() ){
            $usuari = $this->input->post('usuari');
            $data['dades'] = $this->loteria_model->get_info_usuari($usuari);
            $data['nick'] = $this->session->userdata('identity');
            $this->load->view('dades_usuari', $data);


        }
    }*/

}
