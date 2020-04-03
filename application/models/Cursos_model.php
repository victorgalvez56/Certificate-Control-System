<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_model extends CI_Model {

	public function getCursos($sede){
		$this->db->select("c.*,e.nombre_espe as especialidad");
		$this->db->from("cursos c");
		$this->db->join("especialidades e","c.id_espe = e.id_espe");
		$this->db->where("c.estado_curso","1");
		$this->db->where("c.id_sede",$sede);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getCurso($id){
		$this->db->where("id_curso",$id);
		$resultado = $this->db->get("cursos");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("cursos",$data);
	}

	public function update($id,$data){
		$this->db->where("id_curso",$id);
		return $this->db->update("cursos",$data);
	}

}