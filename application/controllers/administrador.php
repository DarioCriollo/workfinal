<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		//$this->load->view('encabezado');
		if ($this->session->userdata('code')) {
			$this->load->view('admin/plantillaadmin');
			$this->load->view('admin/functionadmin');
		}else{
			$res['mensaje']="Incorrect Username or Password";
			$this->load->view('principal');
		  $this->load->view('formulario',$res);
		}
	}

  public function functionadmin(){
    $this->load->view('admin/plantillaadmin');
    $this->load->view('admin/functionadmin');
  }
	public function functionuser(){
    $this->load->view('admin/plantillaadmin');
    $this->load->view('admin/functionuser');
  }
	public function deleteadmin(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->listAdmin();
		$this->load->view("admin/deleteadmin",$datos);
	}
	public function deleteUser(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->listUser();
		$this->load->view("admin/deleteuser",$datos);
	}
	public function deleteA(){
		//print_r('criollo');
		//$this->load->view('admin/plantillaadmin');
		$id=$this->input->post('xid');
		$this->load->model('graficos');
		$this->graficos->deleteA($id);
		$this->load->view("admin/deleteadmin");

	}
	public function registerAdmin(){
		$this->load->view('admin/plantillaadmin');
		$this->load->view('admin/registeradmin');
	}
	public function registerUser(){
		$this->load->view('admin/plantillaadmin');
		$this->load->view('admin/registeruser');
	}
	public function register(){

		$this->form_validation->set_rules('txtname','name','required');
		$this->form_validation->set_rules('txtnick','nickname','required');
		$this->form_validation->set_rules('txtcode','code','required');
		$this->form_validation->set_rules('txtsemester','semester','required');
		$this->form_validation->set_rules('txtcarrer','carrer','required');
		$this->form_validation->set_rules('txtemail','email','required');
		$this->form_validation->set_rules('txtcla','clave','required');
		if ($this->form_validation->run()==TRUE){
			$name=$this->input->post('txtname');
			$nick=$this->input->post('txtnick');
			$code=$this->input->post('txtcode');
			$semester=$this->input->post('txtsemester');
			$carrer=$this->input->post('txtcarrer');
			$email=$this->input->post('txtemail');
			$clave=$this->input->post('txtcla');
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->registrarUsuario($name,$nick,$code,$semester,$carrer,$email,$clave);
			//$this->load->view('admin/registeruser',$res);
		}
		$this->load->view('admin/plantillaadmin');
		$this->load->view('admin/registeruser');
	}
	public function registera(){

		$this->form_validation->set_rules('txtname','name','required');
		$this->form_validation->set_rules('txtnick','nickname','required');
		$this->form_validation->set_rules('txtcode','code','required');
		$this->form_validation->set_rules('txtemail','email','required');
		$this->form_validation->set_rules('txtcla','clave','required');
		if ($this->form_validation->run()==TRUE){
			$name=$this->input->post('txtname');
			$nick=$this->input->post('txtnick');
			$code=$this->input->post('txtcode');
			$email=$this->input->post('txtemail');
			$clave=$this->input->post('txtcla');
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->registrarUsuarioadmin($name,$nick,$code,$email,$clave);
			$this->load->view('admin/plantillaadmin');
			$this->load->view('admin/registeradmin',$res);
		}else{
			$this->load->view('admin/plantillaadmin');
			$this->load->view('admin/registeradmin');
		}

	}
	public function cerrar(){
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
