<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades_model extends CI_Model {

	public function getEspecialidades(){
		$this->db->where("estado_espe","1");
		$resultados = $this->db->get("especialidades");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("especialidades",$data);
	}
	public function getEspecialidad($id){
		$this->db->where("id_espe",$id);
		$resultado = $this->db->get("especialidades");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_espe",$id);
		return $this->db->update("especialidades",$data);
	}
}
