<?php
  class Vehicle_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Funcio que retornara els vehicles existents a la BD del usuari
    public function get_vehicles_bd(){
        $query = $this->db->query("SELECT * from vehicles");
        return $query->result_array();
    }

    //Funcio que retornara les dades del vehicle
    public function get_vehicle_bd($id_vehicle){
        $query = $this->db->query("SELECT * from vehicles where id=".$id_vehicle);
        return $query->result_array();
    }

    //Funcio que retornara les linies tempoorals dels canvis al vehicle i les seves dades
    public function get_vehicle_timeline_bd($id_vehicle){
        $query = $this->db->query("SELECT vhitime.id_timeline, vhitime.descripcio, vhitime.km_actuals, vhitime.data_timeline, (select nom from tipus_reparacio where id_reparacio = vhitime.id_reparacio) as TipusReparacio, (select color from tipus_reparacio where id_reparacio = vhitime.id_reparacio) as TipusReparacioColor FROM vehicle_timeline vhitime where vhitime.id_vehicle = $id_vehicle ORDER by data_timeline DESC");
        return $query->result_array();
    }

    //Funcio que retornara els tipus de reparacions de la bd
	public function get_tipus_reparacions_bd(){
		$query = $this->db->query("SELECT * FROM tipus_reparacio");
		return $query->result_array();
	}

	//Funcio que afegira un registre directe a la BD
	public function inserir_registre_directe_vehicle($vehicle,$descripcio,$tipus_reparacio,$data,$km_actuals){
		$query = $this->db->query("insert into vehicle_timeline (descripcio, id_vehicle, data_timeline, km_actuals, id_reparacio) values ('$descripcio',$vehicle,'$data',$km_actuals,$tipus_reparacio)");
    }


  }
?>
