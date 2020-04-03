<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Alumnos_model");
	}

	public function index()
	{
 		$sede = $this->session->userdata("sede");
		$data  = array(
			'permisos' => $this->permisos,
			'alumnos' => $this->Alumnos_model->getAlumnos($sede), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/alumnos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/alumnos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){

		$nombres = $this->input->post("nombres_alumn");
		$apellidos = $this->input->post("apellidos_alumn");
		$dni = $this->input->post("dni");
		$telefono = $this->input->post("telefono_alumn");
 		$sede = $this->session->userdata("sede");

		
		$this->form_validation->set_rules("dni","Dni","required|is_unique[alumnos.dni]");
		$this->form_validation->set_rules("nombres_alumn","Nombres","required[alumnos.nombres_alumn]");
		$this->form_validation->set_rules("apellidos_alumn","Apellidos","required[alumnos.apellidos_alumn]");
		$this->form_validation->set_rules("telefono_alumn","Teléfono","required[alumnos.telefono_alumn]");
		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombres_alumn' => $nombres, 
				'apellidos_alumn' => $apellidos,
				'dni' => $dni,
				'telefono_alumn' => $telefono,
				'estado_alumn' => "1",
				'id_sede'=> $sede
			);

			if ($this->Alumnos_model->save($data)) {
				redirect(base_url()."mantenimiento/alumnos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/alumnos/add");
			}
		}
		else{
			
			$this->add();
		}

		
	}

	public function edit($id){
		$data  = array(
			'alumno' => $this->Alumnos_model->getAlumno($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/alumnos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idAlumno = $this->input->post("idAlumno");

		$nombres = $this->input->post("nombres_alumn");
		$apellidos = $this->input->post("apellidos_alumn");
		$dni = $this->input->post("dni");
		$telefono = $this->input->post("telefono_alumn");

		$alumnoactual = $this->Alumnos_model->getAlumno($idAlumno);

		if ($dni == $alumnoactual->dni) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[alumnos.dni]";

		}
	
		$this->form_validation->set_rules("nombres_alumn","Nombres","required[alumnos.nombres_alumn]");
		$this->form_validation->set_rules("apellidos_alumn","Apellidos","required[alumnos.apellidos_alumn]");
		$this->form_validation->set_rules("telefono_alumn","Teléfono","required[alumnos.telefono_alumn]");
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombres_alumn' => $nombres, 
				'apellidos_alumn' => $apellidos,
				'dni' => $dni,
				'telefono_alumn' => $telefono,
				'estado_alumn' => "1"
			);

			if ($this->Alumnos_model->update($idAlumno,$data)) {
				redirect(base_url()."mantenimiento/alumnos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/alumnos/edit/".$idAlumno);
			}
		}else{
			$this->edit($idAlumno);
		}

		
	}

	public function view($id){
		$data  = array(
			'alumno' => $this->Alumnos_model->getAlumno($id), 
		);
		$this->load->view("admin/alumnos/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_alumn' => "0", 
		);
		$this->Alumnos_model->update($id,$data);
		echo "mantenimiento/alumnos";
	}
}
