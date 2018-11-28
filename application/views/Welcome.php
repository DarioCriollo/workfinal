<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
			$this->load->view('principal');
	}
	public function about(){
		$this->load->view('about');
	}
	public function parlanateam(){
		$this->load->view('parlanateam');
	}
	public function Collaborators(){
		$this->load->view('Collaborators');
	}
	public function home(){
		$this->load->view('principal');
	}
	public function graficas(){
		$this->load->view('graficas');
	}
	public function graficos(){
		$this->load->view('welcome_message');
		$this->load->model('graficos');
		$datos["autos"]=$this->graficos->busca();
		$this->load->view("graphics",$datos);
	}
	public function themes(){
		$this->load->view('welcome_message');
		$this->load->model('graficos');
		$datos["autos"]=$this->graficos->buscaThemes();
		$this->load->view("themes",$datos);

	}
	public function report(){
		$this->load->view('welcome_message');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->reportThemes();
		$this->load->view("report",$datos);


	}
	public function datos(){
		//$this->load->view('welcome_message');
		$this->load->view('welcome_message');
		$this->load->model('graficos');
		//$result=$this->autos->busca();
		//echo json_encode($result);
		//$this->load->view('datos');
		$datos["autos"]=$this->graficos->niveles();
		$this->load->view("datos",$datos);
	}

	public function login(){
		$this->form_validation->set_rules('txtlog','login','required');
		$this->form_validation->set_rules('txtcla','clave','required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('principal');
			$this->load->view('formulario');
		}else{
			//por falso para ingresar
			echo "paso para ingresar";
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->consultar_usr();
			if ($res['mensaje']=='Incorrect Username or Password') {
					$this->load->view('principal');
				$this->load->view('formulario',$res);
			}else{
				redirect('usuarios');
			}
		}
	}

	public function register(){
		$this->form_validation->set_rules('txtname','name','required');
		$this->form_validation->set_rules('txtnick','nickname','required');
		$this->form_validation->set_rules('txtcode','code','required');
		$this->form_validation->set_rules('txtemail','email','required');
		$this->form_validation->set_rules('txtcla','clave','required');

		if ($this->form_validation->run()==TRUE) {
			$name=$this->input->post('txtname');
			$nick=$this->input->post('txtnick');
			$code=$this->input->post('txtcode');
			$email=$this->input->post('txtemail');
			$clave=$this->input->post('txtcla');
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->registrarUsuario($name,$nick,$code,$email,$clave);
			$this->load->view('registro',$res);
		}
		$this->load->view('principal');
		$this->load->view('registro');
	}
	public function prueba(){
		$this->load->view('welcome_message');
		$this->load->view('prueba');
	}
	public function information(){
		$this->load->view('welcome_message');
		$this->load->view('information');
	}

	public function testnivel(){
		// $this->load->view('welcome_message');
		// $this->load->view('prueba');
		echo "hola mundo";
	}

}
