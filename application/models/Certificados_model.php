<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {

	public function getCertificados($sede){
		$this->db->select("c.*,s.nombre_sede as nombresede,tc.nombre_tipo as nombretipo,tc.precio as precio,a.nombres_alumn as nombrealumno,a.apellidos_alumn as apellidoalumno");
		$this->db->from("certificados c");
		$this->db->join("sedes s","s.id_sede = c.id_sede");
		$this->db->join("tipos_certificados tc","c.id_tipo = tc.id_tipo");
		$this->db->join("alumnos a","a.id_alumn = c.id_alumn");
		$this->db->where("c.id_sede",$sede);
		$this->db->where("c.estado",'1');
		$this->db->order_by("id_cert desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getproductos($valor){
		$this->db->select("id_alumn,nombres_alumn,apellidos_alumn as label,telefono");
		$this->db->from("alumnos");
		$this->db->like("apellidos_alumn",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}
	public function getCertificado($id){
		$this->db->select("c.*,s.nombre_sede as nombresede,tc.nombre_tipo as nombretipo,a.nombres_alumn as nombrealumno,a.apellidos_alumn as apellidoalumno,a.telefono_alumn as telefono");
		$this->db->from("certificados c");
		$this->db->join("sedes s","s.id_sede = c.id_sede");
		$this->db->join("tipos_certificados tc","c.id_tipo = tc.id_tipo");
		$this->db->join("alumnos a","a.id_alumn = c.id_alumn");
		$this->db->where("c.id_cert",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getDetalle($id){
		$this->db->select("dt.*,p.codigo_curso,p.nombre_curso");
		$this->db->from("detalle_curso dt");
		$this->db->join("cursos p","dt.id_curso = p.id_curso");
		$this->db->where("dt.id_cert",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getAlumno($id){
		$this->db->select("*");
		$this->db->from("alumnos");
		$this->db->where("id_alumn",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save($data){
		return $this->db->insert("certificados",$data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function save_detalle($data){
		$this->db->insert("detalle_curso",$data);
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
		$this->db->where("id_cert",$id);
		return $this->db->update("certificados",$data);
	}
}