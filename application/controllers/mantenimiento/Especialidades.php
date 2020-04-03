<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Especialidades_model");
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'especialidades' => $this->Especialidades_model->getEspecialidades(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/especialidades/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/especialidades/add");
		$this->load->view("layouts/footer");
	}

	public function store(){

		$nombre = $this->input->post("nombre_espe");

		$this->form_validation->set_rules("nombre_espe","Nombre","required|is_unique[especialidades.nombre_espe]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre_espe' => $nombre, 
				'estado_espe' => "1"
			);

			if ($this->Especialidades_model->save($data)) {
				redirect(base_url()."mantenimiento/especialidades");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/especialidades/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/especialidades/add");*/
			$this->add();
		}

		
	}

	public function edit($id){
		$data  = array(
			'especialidad' => $this->Especialidades_model->getEspecialidad($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/especialidades/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idEspecialidad = $this->input->post("idEspecialidad");
		$nombre = $this->input->post("nombre_espe");
		$especialidadactual = $this->Especialidades_model->getEspecialidad($idEspecialidad);

		if ($nombre == $especialidadactual->nombre_espe) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[especialidades.nombre_espe]";

		}


		$this->form_validation->set_rules("nombre_espe","Nombre","required".$is_unique);
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre_espe' => $nombre, 
			);

			if ($this->Especialidades_model->update($idEspecialidad,$data)) {
				redirect(base_url()."mantenimiento/especialidades");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/especialidades/edit/".$idEspecialidad);
			}
		}else{
			$this->edit($idEspecialidad);
		}

		
	}

	public function view($id){
		$data  = array(
			'especialidad' => $this->Especialidades_model->getEspecialidad($id), 
		);
		$this->load->view("admin/especialidades/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_espe' => "0", 
		);
		$this->Especialidades_model->update($id,$data);
		echo "mantenimiento/especialidades";
	}
}
