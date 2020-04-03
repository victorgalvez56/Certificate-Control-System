<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sedes_model extends CI_Model {

	public function getSedes(){
		$this->db->where("estado_sede","1");
		$resultados = $this->db->get("sedes");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("sedes",$data);
	}
	public function getSede($id){
		$this->db->where("id_sede",$id);
		$resultado = $this->db->get("sedes");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_sede",$id);
		return $this->db->update("sedes",$data);
	}
}
