<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function index()
	{
		//$this->load->view('encabezado');
		if ($this->session->userdata('code')) {
			$this->load->view('welcome_message');
			$this->load->view('prueba');
		}else{
			$res['mensaje']="Incorrect Username or Password";
				$this->load->view('plantilla');
		$this->load->view('formulario',$res);
		}
	}
	public function cerrar(){
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
