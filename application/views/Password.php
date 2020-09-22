<?php
//Controlador per carregar les Contrasenyes

defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuari_model');
        $this->load->model('password_model');
        $this->load->helper('url_helper');
        $this->load->library('ion_auth');
    }

    public function index(){
        //Si esta loggejat carregarem la intranet
        if($this->ion_auth->logged_in() ){
            $data['id'] = $this->session->userdata('user_id');
            $data['correu'] = $this->session->userdata('email');
            $data['nom'] = $this->ion_auth->user()->row();
            $data['foto_url'] = $this->obtenir_foto();

            $data['passwords'] = $this->obtenir_passsword_user($data['id']);
            $data['categories'] = $this->obtenir_categories_user($data['id']);


            $this->load->view('passwords', $data);
        }else{redirect('auth/login', 'refresh');}
    }
    public function obtenir_foto(){
        //Foto per defecte
        return "assets/img/icono-usuariDefecte.png";
    }

    /*******************************************************/
    /*********************CONTRASENYES**********************/
    /*******************************************************/

    /************************OBTENIR************************/
    //Obtenir_contrasnyes_usuari
    public function obtenir_passsword_user($usuari){
      $contrasenyes = $this->password_model->get_contrasenyes_bd($usuari, $sql='');
      return $contrasenyes;
    }
    //Obtenir_contrasnyes_usuari EN CONCRET
    public function obtenir_passsword_concret_user(){
      $idcontra = $_POST['valorIdcontra'];
      $idusuari = $this->session->userdata('user_id');
      $contrasenya = $this->password_model->get_contrasenya_user_bd($idusuari, $sql='and id='.$idcontra);

      $arrUsuariContra = array('usuari' => $contrasenya[0]['usuari'], 'contrasenya' => $contrasenya[0]['password'], 'categoria' => $contrasenya[0]['categoria'], 'user' => $contrasenya[0]['user'], 'descripcio' => $contrasenya[0]['descripcio'], 'link' => $contrasenya[0]['link'], 'comentari' => $contrasenya[0]['comentari']);
      echo json_encode($arrUsuariContra);
    }
    /***********************MODIFICAR***********************/
    //Afegir o modificar contrasenya
    public function modificar_password(){
      $idcontra = $this->input->post('idcontra');
      $usuari = $this->input->post('usuari');
      $contra = $this->input->post('contra');
      $descripcio = $this->input->post('descripcio');
      $link = $this->input->post('link');
      $comentari = $this->input->post('comentari');
      $categoria = $this->input->post('categoria');
      $idusuari = $this->session->userdata('user_id');

      //Si la contra no existeix dins de la base de dades la afegirem
      if ($this->password_model->existeix_password_bd($idcontra,$idusuari)){
          $this->password_model->update_contrasenyes_bd($idcontra, $usuari, $contra, $categoria, $idusuari, $descripcio, $link, $comentari);
          redirect('passwords', 'refresh');
      }else{
          $this->password_model->put_contrasenyes_bd($usuari, $contra, $categoria, $idusuari, $descripcio, $link, $comentari);
          redirect('passwords', 'refresh');
      }
    }
    /***********************ELIMINAR***********************/
    //Eliminar_contrasnyes_usuari
    public function eliminar_passsword_concret_user(){

      $idcontra = $_POST['valorIdcontra'];
      $idusuari = $this->session->userdata('user_id');
      $contrasenya = $this->password_model->delete_contrasenya_user_bd($idcontra);

      echo json_encode($contrasenya);
    }

    /*******************************************************/
    /***********************CATEGORIES**********************/
    /*******************************************************/

    /************************OBTENIR************************/
    //Obtenir_categories_usuari
    public function obtenir_categories_user($usuari){
      $categories = $this->password_model->get_categories_bd($usuari);
      return $categories;
    }

    /************************AFEGIR*************************/
    //Afegir categoria
    public function afegir_categoria(){
      $nom = $this->input->post('nomcategoria');
      $descripcio = $this->input->post('descricategoria');
      $this->password_model->put_categories_bd($nom, $descripcio,$this->session->userdata('user_id'));
      redirect('passwords', 'refresh');
    }
    /***********************ELIMINAR***********************/
    //Eliminar categoria
    public function eliminar_categoria($categoria){
      $this->password_model->delete_categories_bd($categoria);
      redirect('passwords', 'refresh');
    }
}
