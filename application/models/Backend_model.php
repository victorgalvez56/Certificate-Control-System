<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("menu_id",$menu);
		$this->db->where("rol_id",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function rowCount($tabla){
		if ($tabla != "certificados") {
		}
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}
	public function rowCountALUMNO(){
		$this->db->select("COUNT(id_alumn) as countalumn");
		$this->db->where("estado_alumn","1");
		$resultados = $this->db->get("alumnos");
		return $resultados->row();
	}	
	public function rowCountESPERA(){
		$this->db->select("COUNT(id_cert) as countespera");
		$this->db->where("estado_cert","EN ESPERA");
		$resultados = $this->db->get("certificados");
		return $resultados->row();
	}
	public function rowCountDISPONIBLE(){
		$this->db->select("COUNT(id_cert) as countdisponible");
		$this->db->where("estado_cert","DISPONIBLE");
		$resultados = $this->db->get("certificados");
		return $resultados->row();
	}
	public function rowCountENTREGADO(){
		$this->db->select("COUNT(id_cert) as countentregado");
		$this->db->where("estado_cert","ENTREGADO");
		$resultados = $this->db->get("certificados");
		return $resultados->row();
	}
	
}