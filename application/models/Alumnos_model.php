<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model {

	public function getAlumnos($sede){
		$this->db->where("estado_alumn","1");
		$this->db->where("id_sede",$sede);
		$resultados = $this->db->get("alumnos");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("alumnos",$data);
	}
	public function getAlumno($id){
		$this->db->where("id_alumn",$id);
		$resultado = $this->db->get("alumnos");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_alumn",$id);
		return $this->db->update("alumnos",$data);
	}
}
