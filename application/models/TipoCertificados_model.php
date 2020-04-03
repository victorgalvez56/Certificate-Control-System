<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoCertificados_model extends CI_Model {

	public function getTipos($sede){
		$this->db->where("estado_tipo","1");
		$this->db->where("id_sede",$sede);
		$resultados = $this->db->get("tipos_certificados");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tipos_certificados",$data);
	}
	public function getTipo($id){
		$this->db->where("id_tipo",$id);
		$resultado = $this->db->get("tipos_certificados");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_tipo",$id);
		return $this->db->update("tipos_certificados",$data);
	}
}
