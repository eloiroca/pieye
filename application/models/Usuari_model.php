<?php
  class Usuari_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Funcio que retornara els usuaris existents a la BD
    public function get_usuaris_bd(){
        $query = $this->db->query("SELECT * from users");
        return $query->result_array();
    }
    //Funcio que retornara els grups d'usuaris existents a la BD
    public function get_usuaris_grups_bd(){
        $query = $this->db->query("SELECT u.id, u.username, g.name from users u inner join users_groups ug inner join groups g on g.id = ug.group_id where u.id = ug.user_id");
        return $query->result_array();
    }

  }
?>
