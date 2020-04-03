<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

	}
	public function index()
	{

		$data = array(
			"cantalumn" => $this->Backend_model->rowCountALUMNO(),
			"cantespera" => $this->Backend_model->rowCountESPERA(),
			"cantdisponible" => $this->Backend_model->rowCountDISPONIBLE(),
			"cantentregado" => $this->Backend_model->rowCountENTREGADO(),


		);
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");

	}

	public function getData(){
		$year = $this->input->post("year");
		$resultados = $this->Ventas_model->montos($year);
		echo json_encode($resultados);
	}

}
