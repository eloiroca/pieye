<?php
  class Password_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Funcio que retornara les CONTRASENYES existents a la BD del usuari
    public function get_contrasenyes_bd($usuari, $sql=''){
		//CHECK IF USER IS IN GROUP ADMIN
		$query = $this->db->query("SELECT * FROM users_groups WHERE user_id = ".$usuari." AND group_id = 1");
		$result = $query->result_array();
		$query = $this->db->query("SELECT usuari, password, (select nom from categories_passwords cp where cp.id = p.categoria) as categoria, user, descripcio, link, comentari, id from passwords p where user = ".$usuari." ".$sql);
		if(count($result)>0){
			$query = $this->db->query("SELECT usuari, password, categoria, user, descripcio, link, comentari, id from passwords p ".$sql);
		}
        return $query->result_array();
    }

    //Funcio que retornara les CONTRASENYES existents a la BD del usuari
    public function get_contrasenya_user_bd($usuari, $sql=''){
		$query = $this->db->query("SELECT usuari, password, categoria, user, descripcio, link, comentari, id from passwords p where user = ".$usuari." ".$sql);
        return $query->result_array();
    }

    //Funcio que eliminara la contrasenya dins de la base de dades
    public function delete_contrasenya_user_bd($idcontra){
        $query = $this->db->query("delete from passwords where id=".$idcontra);
        return $query;
    }


    //Funcio que ficara la contrasenya dins de la base de dades
    public function put_contrasenyes_bd($usuari, $password, $categoria, $user, $descripcio, $link, $comentari){
        $query = $this->db->query("insert into passwords (usuari, password, categoria, user, descripcio, link, comentari) values ('".$usuari."','".$password."','".$categoria."','".$user."','".$descripcio."','".$link."','".$comentari."')");
    }

    //Funcio que actualitzara la contrasenya dins de la base de dades
    public function update_contrasenyes_bd($idcontra, $usuari, $password, $categoria, $user, $descripcio, $link, $comentari){
        $query = $this->db->query("update passwords set usuari='".$usuari."', password='".$password."', categoria='".$categoria."', user='".$user."', descripcio='".$descripcio."', link='".$link."', comentari='".$comentari."' where id=".$idcontra);
    }

    //Funcio que retornara les CATEGORIES existents a la BD del usuari
    public function get_categories_bd($usuari){
        $query = $this->db->query("SELECT nom, descripcio, id from categories_passwords where user = ".$usuari);
        return $query->result_array();
    }

    //Funcio que desara les noves categories
    public function put_categories_bd($nom, $descripcio, $usuari){
        $query = $this->db->query("insert into categories_passwords (nom, descripcio, user) values ('".$nom."','".$descripcio."','".$usuari."')");
    }
    //Funcio que eliminara les categories
    public function delete_categories_bd($categoria){
        $query = $this->db->query("delete from categories_passwords where id =".$categoria);
    }

    //Funcio que mirara si existeix una contrasenya a la bd
    public function existeix_password_bd($idcontra,$usuari){
        $query = $this->db->query("select id from passwords where user =".$usuari." and id=".$idcontra);
        if ( $query->num_rows() > 0 ){
            return true;
        }else{return false;}
    }



  }
?>
