<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		
		$this->load->model("Especialidades_model");
		$this->load->model("Cursos_model");
	}

	public function index()
	{
 		$sede = $this->session->userdata("sede");		
		$data  = array(
			'permisos' => $this->permisos,
			'cursos' => $this->Cursos_model->getCursos($sede), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cursos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		$data =array( 
			"especialidades" => $this->Especialidades_model->getEspecialidades()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cursos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$codigo = $this->input->post("codigo_curso");
		$nombre = $this->input->post("nombre_curso");
		$fechaI = $this->input->post("fecha_inicio");
		$fechaF = $this->input->post("fecha_fin");
		$especialidad = $this->input->post("especialidad");
 		$sede = $this->session->userdata("sede");		

		$this->form_validation->set_rules("codigo_curso","Codigo","required|is_unique[cursos.codigo_curso]");
		$this->form_validation->set_rules("nombre_curso","Nombre","required");
		$this->form_validation->set_rules("fecha_inicio","Fecha Inicio","required");
		$this->form_validation->set_rules("fecha_fin","Fecha Fin","required");

		if ($this->form_validation->run()) {
			$data  = array(
				'codigo_curso' => $codigo, 
				'nombre_curso' => $nombre,
				'fecha_inicio' => $fechaI,
				'fecha_fin' => $fechaF,
				'id_espe' => $especialidad,
				'estado_curso' => "1",
				'id_sede' => $sede,
			);

			if ($this->Cursos_model->save($data)) {
				redirect(base_url()."mantenimiento/cursos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/cursos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"curso" => $this->Cursos_model->getCurso($id),
			"especialidades" => $this->Especialidades_model->getEspecialidades()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cursos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idCurso = $this->input->post("idCurso");
		$codigo = $this->input->post("codigo_curso");
		$nombre = $this->input->post("nombre_curso");
		$fechaI = $this->input->post("fecha_inicio");
		$fechaF = $this->input->post("fecha_fin");
		$especialidad = $this->input->post("especialidad");

		$cursoActual = $this->Cursos_model->getCurso($idCurso);

		if ($codigo == $cursoActual->codigo_curso) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[cursos.codigo_curso]';
		}

	
		$this->form_validation->set_rules("nombre_curso","Nombre","required");
		$this->form_validation->set_rules("fecha_inicio","Fecha Inicio","required");
		$this->form_validation->set_rules("fecha_fin","Fecha Fin","required");


		if ($this->form_validation->run()) {
			$data  = array(
				'codigo_curso' => $codigo, 
				'nombre_curso' => $nombre,
				'fecha_inicio' => $fechaI,
				'fecha_fin' => $fechaF,
				'id_espe' => $especialidad,
				'estado_curso' => "1"
			);
			if ($this->Cursos_model->update($idCurso,$data)) {
				redirect(base_url()."mantenimiento/cursos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/cursos/edit/".$idCurso);
			}
		}else{
			$this->edit($idCurso);
		}

		
	}
	public function delete($id){
		$data  = array(
			'estado_curso' => "0", 
		);
		$this->Cursos_model->update($id,$data);
		echo "mantenimiento/cursos";
	}

}