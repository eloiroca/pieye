<?php
  class Configuracio_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Funcio que retornara la ruta de backup de la BD
    public function get_config_bd(){
        $query = $this->db->query("SELECT * from configuracio");
        return $query->result_array();
    }

    //Funcio que guardara un parametre a la base de dades
	  public function set_parametre_bd($nom_parametre, $valor_parametre){
    	  $sql = "UPDATE configuracio SET valor='$valor_parametre' WHERE nom_parametre='$nom_parametre'";
		  $query = $this->db->query($sql);
	  }

  }
?>
