<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoCertificados extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("TipoCertificados_model");
	}

	public function index()
	{
 		$sede = $this->session->userdata("sede");		

		$data  = array(
			'permisos' => $this->permisos,
			'tipocertificados' => $this->TipoCertificados_model->getTipos($sede), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tipocertificados/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tipocertificados/add");
		$this->load->view("layouts/footer");
	}

	public function store(){

		$nombre = $this->input->post("nombre_tipo");
		$precio = $this->input->post("precio");
 		$sede = $this->session->userdata("sede");		





			$data  = array(
				'nombre_tipo' => $nombre, 
				'precio' => $precio,
				'estado_tipo' => "1",
				'id_sede' => $sede,
			);

			if ($this->TipoCertificados_model->save($data)) {
				redirect(base_url()."mantenimiento/tipocertificados");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/tipocertificados/add");
			}

		
	}

	public function edit($id){
		$data  = array(
			'tipo' => $this->TipoCertificados_model->getTipo($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tipocertificados/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idTipo = $this->input->post("idTipo");
		$nombre = $this->input->post("nombre_tipo");
		$tipoactual = $this->TipoCertificados_model->getTipo($idTipo);

		if ($nombre == $tipoactual->nombre_tipo) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[tipos_certificados.nombre_tipo]";

		}


		$this->form_validation->set_rules("nombre_tipo","Nombre","required".$is_unique);
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre_tipo' => $nombre, 
			);

			if ($this->TipoCertificados_model->update($idTipo,$data)) {
				redirect(base_url()."mantenimiento/tipocertificados");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/tipocertificados/edit/".$idTipo);
			}
		}else{
			$this->edit($idTipo);
		}

		
	}

	public function view($id){
		$data  = array(
			'tipo' => $this->TipoCertificados_model->getTipo($id), 
		);
		$this->load->view("admin/tipocertificados/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_tipo' => "0", 
		);
		$this->TipoCertificados_model->update($id,$data);
		echo "mantenimiento/tipocertificados";
	}
}
