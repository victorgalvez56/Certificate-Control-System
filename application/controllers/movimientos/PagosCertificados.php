<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagosCertificados extends CI_Controller {
	private $permisos;	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->permisos = $this->backend_lib->control();
		
		$this->load->model("Certificados_model");
		$this->load->model("Pagos_model");

	}

	public function index(){
 		$sede = $this->session->userdata("sede");		
		
		$data  = array(

			'permisos' => $this->permisos,

			'pagos' => $this->Pagos_model->getPagos($sede), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pagos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
 		$sede = $this->session->userdata("sede");		

		$data = array(
			"tipocomprobantes" => $this->Pagos_model->getComprobantes(),
			"certificados" => $this->Certificados_model->getCertificados($sede)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pagos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-7 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);

		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idusuario = $this->session->userdata("nombre");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");
 		$sede = $this->session->userdata("sede");		

		$certificados = $this->input->post("idcertificados");
		$precios = $this->input->post("precios");




		$data = array(
			'fecha' => $nuevafecha,
			'total_pago' => $total,
			'id_comprobante' => $idcomprobante,
			'responsable' => $idusuario,
			'num_documento' => $numero,
			'serie' => $serie,
			'estado_pago' => '1',
			'id_sede' => $sede
		);

		if($total>0){
		if ($this->Pagos_model->save($data)) {
			$idpago = $this->Pagos_model->lastID();

			$this->updateComprobante($idcomprobante);
			$this->save_detalle($certificados,$idpago,$precios);
			redirect(base_url()."movimientos/pagoscertificados");

		}else{
			redirect(base_url()."movimientos/pagoscertificados/add");
		}
		}else{
			redirect(base_url()."movimientos/pagoscertificados/");
		}

	}

	protected function save_detalle($certificados,$idpago,$precios){
		for ($i=0; $i < count($precios); $i++) { 
			$data  = array(
				'id_cert' => $certificados[$i], 
				'id_pago' => $idpago,
				'subtotal' => $precios[$i],
			);
			$data2 = array(
				'estado_cert' => 'ENTREGADO',
			);
			$this->Pagos_model->save_detalle($data);
			$this->Certificados_model->update($certificados[$i],$data2);
		}
	}


	public function view(){
		$idpago = $this->input->post("id");
		$data = array(
			"certificado" => $this->Pagos_model->getPago($idpago),
			"detalles" =>$this->Pagos_model->getDetalle($idpago)
		);
		$this->load->view("admin/pagos/view",$data);
	}


	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Pagos_model->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Pagos_model->updateComprobante($idcomprobante,$data);
	}

	public function delete($id){
		$data  = array(
			'estado_pago' => "0", 
		);
		$this->Pagos_model->update($id,$data);
		echo "movimientos/pagoscertificados";
	}	
}