<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos_model extends CI_Model {

	public function getPagos($sede){
		$this->db->select("p.*,tc.nombre as comprobante");
		$this->db->from("pagos p");
		$this->db->join("tipo_comprobante tc","p.id_comprobante= tc.id");
		$this->db->where("p.id_sede",$sede);
		$this->db->where("p.estado_pago",'1');
		$this->db->order_by("id_pago desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getPago($id){
		$this->db->select("p.*,tc.nombre as comprobante");
		$this->db->from("pagos p");
		$this->db->join("tipo_comprobante tc","p.id_comprobante= tc.id");
		$this->db->where("p.id_pago",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function getDetalle($id){
		$this->db->select("dt.*,c.codigo_cert,c.estado_cert,c.responsable,s.nombre_sede,a.nombres_alumn,a.apellidos_alumn,tp.precio");
		$this->db->from("detalle_certificados dt");
		$this->db->join("certificados c","dt.id_cert = c.id_cert");	
		$this->db->join("sedes s","s.id_sede = c.id_sede");	
		$this->db->join("alumnos a","a.id_alumn = c.id_alumn");
		$this->db->join("tipos_certificados tp","tp.id_tipo = c.id_tipo");
		$this->db->where("dt.id_pago",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function getComprobantes(){
		$resultados = $this->db->get("tipo_comprobante");
		return $resultados->result();
	}

	public function getComprobante($idcomprobante){
		$this->db->where("id",$idcomprobante);
		$resultado = $this->db->get("tipo_comprobante");
		return $resultado->row();
	}
	public function updateComprobante($idcomprobante,$data){
		$this->db->where("id",$idcomprobante);
		$this->db->update("tipo_comprobante",$data);
	}
	public function save($data){
		return $this->db->insert("pagos",$data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function save_detalle($data){
		$this->db->insert("detalle_certificados",$data);
	}

	public function years(){
		$this->db->select("YEAR(fecha) as year");
		$this->db->from("ventas");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos($year){
		$this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
		$this->db->from("ventas");
		$this->db->where("fecha >=",$year."-01-01");
		$this->db->where("fecha <=",$year."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function update($id,$data){
		$this->db->where("id_pago",$id);
		return $this->db->update("pagos",$data);
	}
}