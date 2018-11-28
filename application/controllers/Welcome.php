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
	public function createreport(){
		$this->load->view('admin/plantillaadmin');
		$this->load->view('admin/formreport');
	}
	public function graph(){
			$this->load->view('admin/plantillaadmin');
		$carrer=$this->input->post('txtcarrer');
			$this->load->model('graficos');
			$datos["program"]=$this->graficos->graphCarrer($carrer);
			$this->load->view("admin/graphProgram",$datos);
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
	public function themesadmin(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->Themesadmin();
		$this->load->view("admin/drilllevel",$datos);
	}
	public function listadmin(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->listAdmin();
		$this->load->view("admin/listadmin",$datos);
	}
	public function report(){
		$this->load->view('welcome_message');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->reportThemes();
		$this->load->view("report",$datos);
	}
	public function reportstudents(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->reportStudents();
		$this->load->view("reportEstudent",$datos);
	}
	public function graphicstudents(){
		$this->load->view('admin/plantillaadmin');
		$this->load->model('graficos');
		$datos["datos"]=$this->graficos->graphicStudents();
		$this->load->view("graphicstudents",$datos);
		//$this->load->view("admin/drilllevel",$datos);
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
			$this->load->view('plantilla');
			$this->load->view('formulario');
		}else{
			//por falso para ingresar
			echo "paso para ingresar";
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->consultar_usr();
			$tipo=$res;
			$res['tipo']=$this->m_sesion->consultar_tipo($tipo);

			switch ($res['tipo']) {
				case 'e':
						redirect('usuarios');
					break;
				case 'a':
						redirect('administrador');
					break;
			}

			if ($res['mensaje']=='Incorrect Username or Password') {
				$this->load->view('plantilla');
				//$this->load->view('formulario',$res);
			}else{
				$this->load->model('m_sesion');
				redirect('usuarios');
			}
		}
	}

	public function register(){
		$this->form_validation->set_rules('txtname','name','required');
		$this->form_validation->set_rules('txtnick','nickname','required');
		$this->form_validation->set_rules('txtcode','code','required');
		$this->form_validation->set_rules('txtsemester','semester','required');
		$this->form_validation->set_rules('txtcarrer','carrer','required');
		$this->form_validation->set_rules('txtemail','email','required');
		$this->form_validation->set_rules('txtcla','clave','required');

		if ($this->form_validation->run()==TRUE) {
			$name=$this->input->post('txtname');
			$nick=$this->input->post('txtnick');
			$code=$this->input->post('txtcode');
			$semester=$this->input->post('txtsemester');
			$carrer=$this->input->post('txtcarrer');
			$email=$this->input->post('txtemail');
			$clave=$this->input->post('txtcla');
			$this->load->model('m_sesion');
			$res['mensaje']=$this->m_sesion->registrarUsuario($name,$nick,$code,$semester,$carrer,$email,$clave);
				if($res['mensaje']=='the code already exists'){
					$this->load->view('plantilla');
					$this->load->view('registro',$res);
				}else{
					$this->load->view('plantilla');
					$this->load->view('formulario');
				}

			//$this->load->view('registro',$res);
		}else{

			$this->load->view('plantilla');
			$this->load->view('registro');
		}

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
