<?php
//Controlador per carregar els Vehicles

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuari_model');
        $this->load->model('vehicle_model');
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

            $data['vehicles'] = $this->obtenir_vehicles_user($data['id']);

            $this->load->view('vehicles', $data);
        }else{redirect('auth/login', 'refresh');}
    }

    public function vehicle_timeline($id_vehicle){
        //Si esta loggejat carregarem la pagina de vehicles
        if($this->ion_auth->logged_in() ){
            $data['id'] = $this->session->userdata('user_id');
            $data['correu'] = $this->session->userdata('email');
            $data['nom'] = $this->ion_auth->user()->row();
            $data['foto_url'] = $this->obtenir_foto();

            $data['dades_vehicle'] = $this->obtenir_dades_vehicle($id_vehicle);
            $data['vehicle_timeline'] = $this->obtenir_vehicle_timeline($id_vehicle);

            $this->load->view('vehicle_timeline', $data);
        }else{redirect('auth/login', 'refresh');}
    }

	public function registre_timeline(){
		//Si esta loggejat carregarem la pagina de vehicles
		if($this->ion_auth->logged_in() ){
			$data['id'] = $this->session->userdata('user_id');
			$data['correu'] = $this->session->userdata('email');
			$data['nom'] = $this->ion_auth->user()->row();
			$data['foto_url'] = $this->obtenir_foto();

			$data['dades_vehicles'] = $this->obtenir_vehicles_user($data['id']);
			$data['dades_reparacions'] = $this->vehicle_model->get_tipus_reparacions_bd();
			$this->load->view('vehicle_registre_directe', $data);
		}else{redirect('auth/login', 'refresh');}
	}

	public function afegir_registre_directe(){
		//Si esta loggejat inserirem el registre de modificacio de vehicle
		if($this->ion_auth->logged_in() ){
			$data['id'] = $this->session->userdata('user_id');
			$data['correu'] = $this->session->userdata('email');
			$data['nom'] = $this->ion_auth->user()->row();
			$data['foto_url'] = $this->obtenir_foto();

			$this->vehicle_model->inserir_registre_directe_vehicle($_POST['vehicle'],$_POST['descripcio'],$_POST['tipus_reparacio'],$_POST['data'],$_POST['km_actuals']);

			$data['vehicles'] = $this->obtenir_vehicles_user($data['id']);

			$this->load->view('vehicles', $data);


			//print_r($_POST);
		}else{redirect('auth/login', 'refresh');}
	}

    public function obtenir_foto(){
        //Foto per defecte
        return "assets/img/icono-usuariDefecte.png";
    }

    /*******************************************************/
    /*************************VEHICLES**********************/
    /*******************************************************/

    //Metode per gestionar la taula Vehicles
    public function grosery_vehicles(){
        //GROCERY CRUD
        $this->grocery_crud->set_theme('tablestrap');
        $this->grocery_crud->set_table('vehicles');

        $this->grocery_crud->columns('matricula','marca','km_totals');
        $this->grocery_crud->edit_fields('matricula','marca','model','km_totals','bastidor','codi_llave_centraleta','codi_inmovilizador_centraleta','data_matriculacio','motor','cavalls','color','seguro','pes','places','tipus_vehicle');

        $this->grocery_crud->unset_read();
        $this->grocery_crud->unset_clone();



        $output = $this->grocery_crud->render();
        $this->vehicles_grocery_output($output);
    }
    public function vehicles_grocery_output($output = null)
    {
        $this->load->view('grocery_view.php',$output);
    }

    /************************OBTENIR************************/
    //obtenir_vehicles_user
    public function obtenir_vehicles_user($usuari){
      $vehicles = $this->vehicle_model->get_vehicles_bd($usuari, $sql='');
      return $vehicles;
    }

    public function obtenir_dades_vehicle($id_vehicle){
      $dades_vehicle = $this->vehicle_model->get_vehicle_bd($id_vehicle);
      return $dades_vehicle;
    }

    public function obtenir_vehicle_timeline($id_vehicle){
      $vehicle_timeline = $this->vehicle_model->get_vehicle_timeline_bd($id_vehicle);

      //Tractem el timeline per pintal ordenadament
      $any_actual =  date("Y");
      $any_anterior="";
      $vehicle_timeline_ordenat_any = array();
      $contador_mes = 0;

      for ($i=$any_actual; $i>=1970; $i--){
        for ($f=12; $f>=1; $f--){
            for ($s=0; $s<count($vehicle_timeline);$s++){
              $any_timeline = date("Y", strtotime ($vehicle_timeline[$s]['data_timeline']));
              $mes_timeline = date("m", strtotime ($vehicle_timeline[$s]['data_timeline']));

              $mes_timeline = str_replace(0,'',$mes_timeline);
              if ($any_timeline==$i && $mes_timeline==$f){

                  $vehicle_timeline_ordenat_any[$any_timeline][$mes_timeline][$contador_mes] = $vehicle_timeline[$s];

                  $contador_mes++;
              }



            }

            $contador_mes = 0;
          }
      }

      /*for ($i=0; $i<count($vehicle_timeline);$i++){
          //for ($l=0; $l<count($vehicle_timeline);$l++){
            $any_timeline = date("Y", strtotime ($vehicle_timeline[$i]['data_timeline']));

            if($any_timeline!=$any_anterior){
                $vehicle_timeline_ordenat_any[$contador_any][$contador_fila] = $vehicle_timeline[$i];
                $contador_fila++;
                $any_anterior = $any_timeline;


            }
            else {
              $contador_any++;
              $vehicle_timeline_ordenat_any[$contador_any][$contador_fila]=$vehicle_timeline[$i];

              //$vehicle_timeline_ordenat_any[$any_timeline][$contador_any] = $vehicle_timeline[$i];

            }



          //}
      }*/

      return $vehicle_timeline_ordenat_any;
    }

}
