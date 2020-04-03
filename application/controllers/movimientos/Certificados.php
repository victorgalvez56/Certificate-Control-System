<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->permisos = $this->backend_lib->control();
		
		$this->load->model("Certificados_model");
		$this->load->model("Alumnos_model");
		$this->load->model("Cursos_model");
		$this->load->model("Sedes_model");

		$this->load->model("TipoCertificados_model");

	}


	public function index(){
 		$sede = $this->session->userdata("sede");		
		$data  = array(
			'permisos' => $this->permisos,
			
			'certificados' => $this->Certificados_model->getCertificados($sede), 
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/certificados/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
 		$sede = $this->session->userdata("sede");

		$data = array(
			
			"alumnos" => $this->Alumnos_model->getAlumnos($sede),
			"cursos" => $this->Cursos_model->getCursos($sede),
			"sedes" => $this->Sedes_model->getSedes(),

			"tipos" => $this->TipoCertificados_model->getTipos($sede)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/certificados/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Certificados_model->getproductos($valor);
		echo json_encode($clientes);
	}

	public function store(){
		$fecha = $this->input->post("fecha");
		$idalumno = $this->input->post("idalumno");
		$idusuario = $this->session->userdata("nombre");
		$idtipo = $this->input->post("tipo");
 		$sede = $this->session->userdata("sede");
		$idcurso = $this->input->post("idcurso");
				
				$data = array(
					'fecha_entrega' => $fecha,
					'id_alumn' => $idalumno,
					'id_sede' => $sede,
					'id_tipo' => $idtipo,
					'responsable' => $idusuario,
					'estado_cert' => 'EN ESPERA',
					'estado' => '1'
				);	


		if ($idalumno!='') {
			
			if ($this->Certificados_model->save($data)) {
				$idcertificado = $this->Certificados_model->lastID();
				$this->save_detalle($idcurso,$idcertificado);
				redirect(base_url()."movimientos/certificados");

			}else{
				redirect(base_url()."movimientos/certificados/add");
			}					
		}else{
				
			redirect(base_url()."movimientos/certificados/add");
		}






	}

	public function edit($id){
		$data  = array(
			'certificado' => $this->Certificados_model->getCertificado($id), 

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/certificados/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idCertificado = $this->input->post("idCertificado");
		$codigo = $this->input->post("codigo");
		$fecha = $this->input->post("fecha");



			$data = array(
				'codigo_cert' => $codigo, 
				'fecha_entrega' => $fecha,
				'estado_cert' => 'DISPONIBLE',
			);

			if ($this->Certificados_model->update($idCertificado,$data)) {
				redirect(base_url()."movimientos/certificados");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."movimientos/certificados/edit/".$idCertificado);
			}


		
	}
	protected function save_detalle($idcurso,$idcertificado){
		
		if(is_array($idcurso)){
			for ($i=0; $i < count($idcurso); $i++) { 
				$data  = array(
					'id_curso' => $idcurso[$i], 
					'id_cert' => $idcertificado,

				);

				$this->Certificados_model->save_detalle($data);

			}			
		}else{
			for ($i=0; $i < count($idcurso); $i++) { 
				$data  = array(
					'id_curso' => '1', 
					'id_cert' => $idcertificado,

				);

				$this->Certificados_model->save_detalle($data);

			}	

		}

	}


	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"certificado" => $this->Certificados_model->getCertificado($idventa),
			"detalles" =>$this->Certificados_model->getDetalle($idventa)
		);
		$this->load->view("admin/certificados/view",$data);
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Certificados_model->update($id,$data);
		echo "movimientos/certificados";
	}
}