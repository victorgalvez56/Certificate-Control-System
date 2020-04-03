<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sedes extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sedes_model");
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'sedes' => $this->Sedes_model->getSedes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sedes/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sedes/add");
		$this->load->view("layouts/footer");
	}

	public function store(){

		$nombre = $this->input->post("nombre_sede");
		$direccion = $this->input->post("direccion_sede");
		$ciudad = $this->input->post("ciudad");

		$this->form_validation->set_rules("nombre_sede","Nombre","required|is_unique[sedes.nombre_sede]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre_sede' => $nombre, 
				'direccion_sede' => $direccion,
				'ciudad' => $ciudad,
				'estado_sede' => "1"
			);

			if ($this->Sedes_model->save($data)) {
				redirect(base_url()."mantenimiento/sedes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/sedes/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/especialidades/add");*/
			$this->add();
		}

		
	}

	public function edit($id){
		$data  = array(
			'sede' => $this->Sedes_model->getSede($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sedes/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){

		$idSede = $this->input->post("idSede");
		$nombre = $this->input->post("nombre_sede");
		$direccion = $this->input->post("direccion_sede");
		$ciudad = $this->input->post("ciudad");

		$sedeactual = $this->Sedes_model->getSede($idSede);

		if ($nombre == $sedeactual->nombre_sede) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[sedes.nombre_sede]";

		}


		$this->form_validation->set_rules("nombre_sede","Nombre","required".$is_unique);
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre_sede' => $nombre, 
				'direccion_sede' => $direccion,
				'ciudad' => $ciudad,
			);

			if ($this->Sedes_model->update($idSede,$data)) {
				redirect(base_url()."mantenimiento/sedes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/sedes/edit/".$idSede);
			}
		}else{
			$this->edit($idSede);
		}

		
	}
	public function view($id){
		$data  = array(
			'sede' => $this->Sedes_model->getSede($id), 
		);
		$this->load->view("admin/sedes/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_sede' => "0", 
		);
		$this->Sedes_model->update($id,$data);
		echo "mantenimiento/sedes";
	}
}
