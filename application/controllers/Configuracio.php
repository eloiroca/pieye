<?php
//Controlador per carregar els Vehicles

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuari_model');
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

            //$data['vehicles'] = $this->obtenir_vehicles_user($data['id']);

            $this->load->view('configuracio', $data);
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


    /************************OBTENIR************************/

}
