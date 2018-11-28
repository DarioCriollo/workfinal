	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questions extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function preguntas(){
		$this->db->select('quest');
		//$this->db->where("cod_alqui",$codigo);
    	$res = $this->db->get("questions");
        return $res->result_array();
	}
	function objects(){
		$this->db->select('code_question,item_eval,question');
		$res = $this->db->get("questions");
		return $res->result_array();
	}
	function lectura($xdato){
		$pro1=$xdato[0];
		$pro2=$xdato[1];
		$pro3=$xdato[2];
		$pro4=$xdato[3];
		$pro5=$xdato[4];


			$this->db->select('code_question');
			$this->db->like('question',$xdato[0]);
			$this->db->or_like('question',$xdato[1]);
			$this->db->or_like('question',$xdato[2]);
			$this->db->or_like('question',$xdato[3]);
			$this->db->or_like('question',$xdato[4]);
			$res = $this->db->get("questions");


		return $res->result_array();

	}

	function codes($xdat){


			$this->db->select('option_one,option_two,option_tree,option_four,option_five,option_six,option_seven,option_eight,correct');
			$this->db->where('question',$xdat[0]);
			$this->db->or_where('question',$xdat[1]);
			$this->db->or_where('question',$xdat[2]);
			$this->db->or_where('question',$xdat[3]);
			$this->db->or_where('question',$xdat[4]);
			$res= $this->db->get("answers");
			return $res->result_array();
	}

	function busca($xdato){
		$dato=$xdato;
		//echo "tiotitoito".$dato;
		$this->db->select('option_one,option_two,option_tree,option_four,option_five,option_six,option_seven,option_eight,correct');
		$this->db->where('question',$dato);
    	$res = $this->db->get("answers");
    	//echo ($res);
    	//echo "titiot".$res;
        return $res->result_array();
	}
		function codigo($xdat){
		//$dato = (string)$xdat;
		$dato= $xdat[0];
		//print_r($dato);
		$this->db->select('code_question');
		$this->db->like('question',$dato);
    	$res = $this->db->get("questions");
    	//print_r($res);
    	return $res->result_array();
	}

	function newQuestions($acertadas,$fallidas){
		$reset;
		$res;
		$array=json_encode($fallidas);
		$longuitud=count($fallidas);
		echo $fallidas[0]."codigo fallida".$array."longuitud".$longuitud;


		//case con el tamaño consultamos una por una y cada letra vamos adicionando aun
		//vector

		for ($i=0; $i<$longuitud; $i++) {
			$this->db->select('tipo');
			$this->db->where('id',$fallidas[$i]);
    		$res =$this->db->get("questions");
    		return $res->result_array();
		}

		echo var_dump($reset)."caro";
		//print_r($reset."que tenemos");
		//echo $reset."caro";
		//ahora vamos a iniciar con hazpregunta con ajax para traer
		//tema de la pregunta ademas traeremos items a evaluar si es necesario
		//deacuerdo a ello  enviamos patrones relacionados que puedan caver
		//en alguna regla

	}
	function nivelPreguntas($xnivel,$title){
		$xdata=$xnivel[0].$xnivel[1];
		$this->db->select('questions.code_question,questions.item_eval,questions.level,
		questions.question,questions.title,questions.texto,titles.contenido,media.content');
		$this->db->from('questions');
		$this->db->join('titles','questions.title=titles.code_title');
		$this->db->join('media','questions.texto=media.code_texto');
		$this->db->where('questions.level',$xdata);
		$this->db->where('questions.title',$title);
		$result = $this->db->get();

		return $result->result_array();
	}



	function maximoResult(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('id');
    $this->db->where('codigo', $codigo);
    $res = $this->db->get('result');
    return $res->result_array();
	}

	function exitcode(){
		$codigo=$this->session->userdata('code');
		$this->db->select('codigo');
		$this->db->where('codigo',$codigo);
    	$res =$this->db->get("result");
    	$numero_filas=$res->num_rows();
    	return $numero_filas;
	}
	function reglas($xvector,$xnivel){

		//print_r($xvector.$xnivel);

		$estadoA1;
		$estadoA2;
		$estadoB1;
		//variables para porcentajes de cada nivel
		$nivelA1=0;
		$nivelA2=0;
		$nivelB1=0;
		//print_r($xvector[0])."dario criollo";
		$tama=$xvector;
		$counttobep=0;
		$counttoben=0;
		$counttobei=0;


			if ($xnivel=='A1') {
				//$codigo="2130341102";
				$codigo=$this->session->userdata('code');
							 $data = array(
							 'codigo' => $codigo,
							 );
				$this->db->insert('estados',$data);
				//$this->db->insert('resultadostemas',$data);

				$num=$this->exitcode();

				$codigo=$this->session->userdata('code');
				$total=5-$tama;
				$data = array(
							 'codigo' => $codigo,
							 'nivela1'=> $total,
							 );
				$this->db->insert('result',$data);


				//aqui are el conteo exacto de el tema especifico que esta fallando y las acertados
				if ($tama==0) {
					$estadoA1='A';
				}
				if ($tama>0 && $tama<=2){
					$estadoA1='M';
				}
				if ($tama>2 && $tama<=10) {
					$estadoA1='B';
				}
				switch ($estadoA1) {
					case 'A':
					$estado='A';
					$nivelestado='estadoA1';
					$this->insertaEstado($estado,$nivelestado);
					$result=$this->retorna();

						return $result;
						break;
					case 'M':
						$estado='M';
						$nivelestado='estadoA1';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retorna();
						return $result;
						break;
					case 'B':
						$estado='B';
						$nivelestado='estadoA1';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retorna();
						return $result;
						break;

					default:
						# code...
						break;
				}
			}//final if para primer bloque de preguntas

			if ($xnivel=='A2') {

				$dato=$this->maximoResult();
				$max=$dato[0]['id'];

				$codigo=$this->session->userdata('code');
				$total=5-$tama;
				$levela2="nivela2";
				$data = array(
							 'nivela2'=> $total,
							 );
				$this->db->where('codigo',$codigo);
				$this->db->where('id',$max);
				$this->db->update('result',$data);

				if ($tama==0) {
					$estadoA2='A';
				}
				if ($tama>0 && $tama<=2) {
					$estadoA2='M';
				}
				if ($tama>2 && $tama<=10) {
					$estadoA2='B';
				}
				switch ($estadoA2) {
					case 'A':
					$estado='A';
						$nivelestado='estadoA2';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retorna2();
						return $result;
						break;
					case 'M':
						$estado='M';
						$nivelestado='estadoA2';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retorna2();
						return $result;
						break;
					case 'B':
						$estado='B';
						$nivelestado='estadoA2';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retorna2();
						return $result;
						break;

				}
			}
			if ($xnivel=='B1') {
				$dato=$this->maximoResult();
				$max=$dato[0]['id'];
				$codigo=$this->session->userdata('code');
				$total=5-$tama;
				$levelb1="nivelb1";
				$data = array(
							 'nivelb1'=> $total,
							 );
				$this->db->where('codigo',$codigo);
				$this->db->where('id',$max);
				$this->db->update('result',$data);

				if ($tama==0) {
					$estadoB1='A';
				}
				if ($tama>0 && $tama<=2) {
					$estadoB1='M';
				}
				if ($tama>2 && $tama<=10) {
					$estadoB1='B';
				}
				switch ($estadoB1) {
					case 'A':
					$estado='A';
						$nivelestado='estadoB1';
						$result=$this->insertaEstado($estado,$nivelestado);
						return $result;
						break;
					case 'M':
						$estado='M';
						$nivelestado='estadoB1';
						$result=$this->insertaEstado($estado,$nivelestado);
						return $result;
						break;
					case 'B':
						$estado='B';
						$nivelestado='estadoB1';
						$result=$this->insertaEstado($estado,$nivelestado);
						return $result;
						break;
				}
			}
			if ($xvector[$i]=="Low") {
				if ($tama>0 && $tama<=3) {
					$estadoA1low='A';
				}
				if ($tama>=4 && $tama<=6) {
					$estadoA1low='M';
				}
				if ($tama>=7 && $tama<=15) {
					$estadoA1low='B';
				}
				switch ($estadoA1low) {
					case 'A':
					$estado='A';
						$nivelestado='estadoA1b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLow();
						return $result;
						break;
					case 'M':
						$estado='M';
						$nivelestado='estadoA1b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLow();
						return $result;
						break;
					case 'B':
						$estado='B';
						$nivelestado='estadoA1b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLow();
						return $result;
						break;

				}
			}

			if ($xvector[$i]=="LowA2") {
				if ($tama>0 && $tama<=3) {
					$estadoA2low='A';
				}
				if ($tama>=4 && $tama<=6) {
					$estadoA2low='M';
				}
				if ($tama>=7 && $tama<=15) {
					$estadoA2low='B';
				}
				switch ($estadoA2low) {
					case 'A':
					$estado='A';
						$nivelestado='estadoA2b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLowA2();
						return $result;
						break;
					case 'M':
						$estado='M';
						$nivelestado='estadoA2b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLowA2();
						return $result;
						break;
					case 'B':
						$estado='B';
						$nivelestado='estadoA2b';
						$this->insertaEstado($estado,$nivelestado);
						$result=$this->retornaLowA2();
						return $result;
						break;

				}
			}


		//para este condicional podemos encontrar el tamaño de las fallidas
		//entre menos fallidas haya podemos pasar de nivel A a el nivel A1
//vamos a insertar cada uno de los porcentajes que obtubo al realizar el test con satisfaccion

}


function maximo(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('id');
    $this->db->where('codigo', $codigo);
    $res = $this->db->get('estados');
    return $res->result_array();
}

 function insertaEstado($estado,$nivelestado){
	 //insertamos el estado de el nivel evaluado a cada usuario
 	$dat=$this->maximo();
 	$max=$dat[0]['id'];
	$codigo=$this->session->userdata('code');
		 			$data = array(
		 			$nivelestado => $estado,
		 			);
	$this->db->where('codigo',$codigo);
	$this->db->where('id',$max);
	 $this->db->update('estados',$data);
}

function estadosA1(){
	$dat=$this->maximo();
 	$max=$dat[0]['id'];
	$codigo=$this->session->userdata('code');
	$nivelestado='estadoA1';
	$this->db->select($nivelestado);
	$this->db->where('codigo',$codigo);
	$this->db->where('id',$max);
	$res =$this->db->get("estados");
	return $res->result_array();
}
function estadosA2(){
	$dat=$this->maximo();
 	$max=$dat[0]['id'];
	$codigo=$this->session->userdata('code');
	$nivelestado='estadoA2';
	$this->db->select($nivelestado);
	$this->db->where('codigo',$codigo);
	$this->db->where('id',$max);
	$res =$this->db->get("estados");
	return $res->result_array();
}
function estadosA1low(){
	$codigo="2130341102";
	$nivelestado='estadoA1b';
	$this->db->select($nivelestado);
	$this->db->where('codigo',$codigo);
	$res =$this->db->get("estados");
	return $res->result_array();
}
function estadosA2low(){
	$codigo="2130341102";
	$nivelestado='estadoA2b';
	$this->db->select($nivelestado);
	$this->db->where('codigo',$codigo);
	$res =$this->db->get("estados");
	return $res->result_array();
}

function retorna(){
	$data=$this->estadosA1();
	if ($data[0]['estadoA1']=='A') {
		//este es me sirve para el nivel A1 A(alto) y M(medio) toca saber que iria en medio
		$xdata="A2";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data[0]['estadoA1']=='M') {
		$xdata="A2";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data[0]['estadoA1']=='B') {
		//necesito saber tipo de preguntas para este tipo de nivel
		$xdata="A0";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
}

function retorna2(){
	$data1=$this->estadosA1();
	$data2=$this->estadosA2();
	if ($data1[0]['estadoA1']=='A' && $data2[0]['estadoA2']=='A') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='A' && $data2[0]['estadoA2']=='M') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='M' && $data2[0]['estadoA2']=='M') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='M' && $data2[0]['estadoA2']=='A') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='A' && $data2[0]['estadoA2']=='B') {
		$xdata="20";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='M' && $data2[0]['estadoA2']=='B') {
		$xdata="20";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
}

function retornaLow(){
	$data1=$this->estadosA1();
	$data2=$this->estadosA1low();
	if ($data1[0]['estadoA1']=='B' && $data2[0]['estadoA1b']=='A') {
		$xdata="A2";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='B' && $data2[0]['estadoA1b']=='M') {
		$xdata="A2";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA1']=='B' && $data2[0]['estadoA1b']=='B') {
		//por aqui no retornamos nada
	}
}

function retornaLowA2(){
	//$data1=$this->estadosA1();
	$data1=$this->estadosA2();
	$data2=$this->estadosA2low();
	if ($data1[0]['estadoA2']=='B' && $data2[0]['estadoA2b']=='A') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA2']=='B' && $data2[0]['estadoA2b']=='M') {
		$xdata="B1";
		$this->db->select('*');
		$this->db->where('nivel',$xdata);
		$res =$this->db->get("preguntas");
		return $res->result_array();
	}
	if ($data1[0]['estadoA2']=='B' && $data2[0]['estadoA2b']=='B') {
	//no sabrimos que enviar o talvez que termine todo el test y luego
	//hablar con el experto
	}
}
//vamos a insertar la puntuacion de cada tema por el nivel A1

function conteoFallidas($xvector){

	$puntaje1=0;
	$puntaje2=0;
	$puntaje3=0;
	$puntaje4=0;


	for($i=0 ; $i<count($xvector); $i++){
			if ($xvector[$i]=="Verb TO-BE: Present") {

				$tema="tobep";
				$puntaje1 +=1;
				$this->guardaPorcentajetemaA1($tema,$puntaje1);

			}
			if ($xvector[$i]=="Verb TO-BE: Negative") {
				$tema="toben";
				$puntaje2 +=1;
				$this->guardaPorcentajetemaA1($tema,$puntaje2);
			}
			if ($xvector[$i]=="Verb TO-BE: Interrog") {
				$tema="tobei";
				$puntaje3 +=1;
				$this->guardaPorcentajetemaA1($tema,$puntaje3);
			}
			if ($xvector[$i]=="Auxiliary verbs") {
				$tema="auxiliaryv";
				$puntaje4 +=1;
				$this->guardaPorcentajetemaA1($tema,$puntaje4);
			}

		}

}


function guardaPorcentajetemaA1($tema,$puntaje){
$codigo="2130341102";
				$data = array(
				$tema => $puntaje,
				 );
 	$this->db->where('codigo',$codigo);
	$this->db->update('resultadostemas',$data);

}
function guardaPorcentajetemaA2($tema,$puntaje){
	$codigo="2130341102";
				 $data = array(
				$tema =>$puntaje,
				 );
 	$this->db->where('codigo',$codigo);
	$this->db->update('resultadostemas',$data);

}
function crea(){
	$codigo="2130341102";
				 $data = array(
				'codigo' => $codigo,
				 );
	$this->db->insert('resultadostemas',$data);
}
}
