<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reglas extends CI_Model
{

function __construct()
{
  parent::__construct();
  $this->load->database();
}

function reglasInferencia($size,$level,$correct,$failed){
  $this->insertThemes($level,$correct,$failed);
  //print_r('que tenemos : '.$size.'otro'.$level.'daito');

  if($level==='A1'){
    $codigo=$this->session->userdata('code');
							 $data = array(
							 'code_user' => $codigo,
							 );
		$this->db->insert('premises',$data);

    $this->insertResult($size,$level);
    //$this->insertThemes($level,$correct,$failed);
    //echo 'si A1';
    if($size==0){
    //  echo 'bien';
      $premise='T';
      $level='premisea1';
      $this->insertPremises($premise,$level);
      $result='true';
      return $result;
    }
    if($size>0 && $size<=4){
      //echo 'medio';
      $premise='T';
      $level='premisea1';
      $this->insertPremises($premise,$level);
      $result='true';
      return $result;
    }
    if($size > 4 && $size < 20){
      $premise='F';
      $level='premisea1';
      $this->insertPremises($premise,$level);
      $lev='A1';
      $this->insertLevel($lev);
      $result='falseA1';
      return $result;
    }

  }
  if($level==='A2'){
    $this->insertResult($size,$level);
    if ($size==0) {
      $premise='T';
      $level='premisea2';
      $this->insertPremises($premise,$level);
      $result='trueA2';
      return $result;
    }
    if($size > 0 && $size<=4){
      $premise='T';
      $level='premisea2';
      $this->insertPremises($premise,$level);
      $result='trueA2';
      return $result;
    }
    if($size>4 && $size<=20){
      $premise='F';
      $level='premisea2';
      $this->insertPremises($premise,$level);
      $lev='A2';
      $this->insertLevel($lev);
      $result='falseA2';
      return $result;
    }

  }

  if($level==='2A'){
    $this->insertResult($size,$level);
    if ($size==0) {
      $premise='T';
      $level='premisea2a';
      $this->insertPremises($premise,$level);
      $result='trueB1';
      return $result;
    }
    if($size > 0 && $size<=2){
      $premise='T';
      $level='premisea2a';
      $this->insertPremises($premise,$level);
      $result='trueB1';
      return $result;
    }
    if($size>2 && $size<=9){
      $premise='F';
      $level='premisea2a';
      $this->insertPremises($premise,$level);
      $lev='A2+';
      $this->insertLevel($lev);
      $result='falseB1';
      return $result;
    }

  }

  if($level=='B1'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premiseb1';
      $this->insertPremises($premise,$level);
      $result='true1B';
      return $result;
    }
    if($size>0 && $size<=3){
      $premise='T';
      $level='premiseb1';
      $this->insertPremises($premise,$level);
      $result='true1B';
      return $result;
    }
    if($size>3 && $size<=15){
      $premise='F';
      $level='premiseb1';
      $this->insertPremises($premise,$level);
      $lev='B1';
      $this->insertLevel($lev);
      $result='false1B';
      return $result;
    }
  }
  if($level=='1B'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premiseb1a';
      $this->insertPremises($premise,$level);
      //insertamos nivel ya que cambia hacia B1 quitar cuando sea C1
      $lev='B1+';
      $this->insertLevel($lev);
      $result='trueB1F';
      return $result;
    }
    if($size>0 && $size<=2){
      $premise='T';
      $level='premiseb1a';
      $this->insertPremises($premise,$level);
      //insertamos nivel ya que cambia hacia B1 quitar cuando sea C1 modificar reglas
      $lev='B1+';
      $this->insertLevel($lev);
      $result='trueB1F';
      return $result;
    }
    if($size>2 && $size<=8){
      $premise='F';
      $level='premiseb1a';
      $this->insertPremises($premise,$level);
      $lev='B1+';
      $this->insertLevel($lev);
      $result='falseB1F';
      return $result;
    }
  }
  if($level=='B2'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premiseb2';
      $this->insertPremises($premise,$level);
      $result='trueB2F';
      return $result;
    }
    if($size>0 && $size<=2){
      $premise='T';
      $level='premiseb2';
      $this->insertPremises($premise,$level);
      $result='trueB2F';
      return $result;
    }
    if($size>2 && $size<=10){
      $premise='F';
      $level='premiseb2';
      $this->insertPremises($premise,$level);
      $lev='B2';
      $this->insertLevel($lev);
      $result='falseB2F';
      return $result;
    }
  }
  if($level=='2B'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premiseb2a';
      $this->insertPremises($premise,$level);
      $result='true2BF';
      return $result;
    }
    if($size>0 && $size<=1){
      $premise='T';
      $level='premiseb2a';
      $this->insertPremises($premise,$level);
      $result='true2BF';
      return $result;
    }
    if($size>1 && $size<=2){
      $premise='F';
      $level='premiseb2a';
      $this->insertPremises($premise,$level);
      $lev='B2+';
      $this->insertLevel($lev);
      $result='false2BF';
      return $result;
    }
  }
  if($level=='C1'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premisec1';
      $this->insertPremises($premise,$level);
      $result='trueC1F';
      return $result;
    }
    if($size>0 && $size<=1){
      $premise='T';
      $level='premisec1';
      $this->insertPremises($premise,$level);
      $result='trueC1F';
      return $result;
    }
    if($size>1 && $size<=5){
      $premise='F';
      $level='premisec1';
      $this->insertPremises($premise,$level);
      $lev='C1';
      $this->insertLevel($lev);
      $result='falseC1F';
      return $result;
    }
  }
  if($level=='1C'){
    $this->insertResult($size,$level);
    if($size==0){
      $premise='T';
      $level='premisec1a';
      $this->insertPremises($premise,$level);
      $lev='C1';
      $this->insertLevel($lev);
      $result='true1CF';
      return $result;
    }
    if($size>0 && $size<=1){
      $premise='T';
      $level='premisec1a';
      $this->insertPremises($premise,$level);
      $lev='C1';
      $this->insertLevel($lev);
      $result='true1CF';
      return $result;
    }
    if($size>1 && $size<=2){
      $premise='F';
      $level='premisec1a';
      $this->insertPremises($premise,$level);
      $lev='C1';
      $this->insertLevel($lev);
      $result='false1CF';
      return $result;
    }
  }

}
function maximo(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('id');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('premises');
  return $res->result_array();
}
function maximoR(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('id');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('result');
  return $res->result_array();
}
function maximoT(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('id');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('themes');
  return $res->result_array();
}
function valorA2(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('nivela2');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('result');
  return $res->result_array();
}
function valorA2A(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('nivela2a');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('result');
  return $res->result_array();
}
function valorB1(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('nivelb1');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('result');
  return $res->result_array();
}
function valorB1A(){
	$codigo=$this->session->userdata('code');
	$this->db->select_max('nivelb1a');
  $this->db->where('code_user', $codigo);
  $res = $this->db->get('result');
  return $res->result_array();
}
function insertPremises($premise,$level){
  $dat=$this->maximo();
 	$max=$dat[0]['id'];
	$codigo=$this->session->userdata('code');
  // if($codigo==''){echo 'no hay nada ';}
  //print_r('codigo : '.$codigo);
		 			$data = array(
		 			$level => $premise,
		 			);
	$this->db->where('code_user',$codigo);
	$this->db->where('id',$max);
	$this->db->update('premises',$data);
}
function insertResult($size,$level){
    if($level=='A1'){
      $codigo=$this->session->userdata('code');
  		$total=20-$size;
      $fecha=$this->load->helper('date');
      $data = array(
  					 'code_user' => $codigo,
  					 'nivela1' => $total,
             'fecha' => date("Y-m-d"),
  					 );
  		$this->db->insert('result',$data);
    }
    if($level=='A2'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
  		$total=20-$size;
      $data = array(
  					 'nivela2' => $total,
  					 );
      $this->db->where('code_user',$codigo);
      $this->db->where('id',$max);
  		$this->db->update('result',$data);
    }
    if($level=='2A'){
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
      $codigo=$this->session->userdata('code');
  		$total=9-$size;
      $data = array(
  					 'nivela2a' => $total,
  					 );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
  		$this->db->update('result',$data);
    }
    if($level=='B1'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
  		$total=15-$size;
      $data = array(
  					 'nivelb1' => $total,
  					 );
      $this->db->where('code_user',$codigo);
			$this->db->where('id',$max);
  		$this->db->update('result',$data);
    }
    if($level=='1B'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
      // $valor=$this->valorB1();
      // $b1=$valor[0]['nivelb1'];
  		$total=8-$size;
      $data = array(
  					 'nivelb1a' => $total,
  					 );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
  		$this->db->update('result',$data);

    }
    if($level=='B2'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
      $max=$dat[0]['id'];
      // $valor=$this->valorB1();
      // $b1=$valor[0]['nivelb1'];
      $total=10-$size;
      $data = array(
             'nivelb2' => $total,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('result',$data);

    }
    if($level=='2B'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
      // $valor=$this->valorB1();
      // $b1=$valor[0]['nivelb1'];
  		$total=2-$size;
      $data = array(
  					 'nivelb2a' => $total,
  					 );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
  		$this->db->update('result',$data);

    }
    if($level=='C1'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
  		$total=5-$size;
      $data = array(
  					 'nivelc1' => $total,
  					 );
      $this->db->where('code_user',$codigo);
			$this->db->where('id',$max);
  		$this->db->update('result',$data);
    }

    if($level=='1C'){
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
     	$max=$dat[0]['id'];
      // $valor=$this->valorB1();
      // $b1=$valor[0]['nivelb1'];
  		$total=2-$size;
      $data = array(
  					 'nivelc1a' => $total,
  					 );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
  		$this->db->update('result',$data);

    }
}

  function insertThemes($level,$correct,$failed){
    // print_r($correct);
    // print_r($failed);

    $arr=[];
    $countG=0;
    $countR=0;
    $countL=0;
    $countfG=0;
    $countfR=0;
    $countfL=0;
    if($level=='A1'){
      $codigo=$this->session->userdata('code');
  							 $data = array(
  							 'code_user' => $codigo,
  							 );
  		$this->db->insert('themes',$data);
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Grammar'){
          $countG ++;
        }
        if ($correct[$i]=='Reading') {
          $countR ++;
        }
      }

      //vamos en A 1
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correcta1g' => $countG,
             'correcta1r' => $countR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Grammar'){
          $countfG ++;
        }
        if ($failed[$j]=='Reading') {
          $countfR ++;
        }
      }
      $date = array(
             'faileda1g' => $countfG,
             'faileda1r' => $countfR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //para nivel A2
    if($level=='A2'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Grammar'){
          $countG ++;
        }
        if ($correct[$i]=='Reading') {
          $countR ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correcta2g' => $countG,
             'correcta2r' => $countR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Grammar'){
          $countfG ++;
        }
        if ($failed[$j]=='Reading') {
          $countfR ++;
        }
      }
      $date = array(
             'faileda2g' => $countfG,
             'faileda2r' => $countfR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //nivel 2A

    if($level=='2A'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Listening'){
          $countL ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correcta2l' => $countL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Listening'){
          $countfL ++;
        }
      }
      $date = array(
             'faileda2l' => $countfL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }
    //para nivel B1

    if($level=='B1'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Grammar'){
          $countG ++;
        }
        if ($correct[$i]=='Reading') {
          $countR ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctb1g' => $countG,
             'correctb1r' => $countR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Grammar'){
          $countfG ++;
        }
        if ($failed[$j]=='Reading') {
          $countfR ++;
        }
      }
      $date = array(
             'failedb1g' => $countfG,
             'failedb1r' => $countfR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //para nivel 1B
    if($level=='1B'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Listening'){
          $countL ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctb1l' => $countL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Listening'){
          $countfL ++;
        }
      }
      $date = array(
             'failedb1l' => $countfL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //para nivel B2

    if($level=='B2'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Grammar'){
          $countG ++;
        }
        if ($correct[$i]=='Reading') {
          $countR ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctb2g' => $countG,
             'correctb2r' => $countR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Grammar'){
          $countfG ++;
        }
        if ($failed[$j]=='Reading') {
          $countfR ++;
        }
      }
      $date = array(
             'failedb2g' => $countfG,
             'failedb2r' => $countfR,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //para 2B
    if($level=='2B'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Listening'){
          $countL ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctb2l' => $countL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Listening'){
          $countfL ++;
        }
      }
      $date = array(
             'failedb2l' => $countfL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }
    //para C1
    if($level=='C1'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Grammar'){
          $countG ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctc1g' => $countG,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Grammar'){
          $countfG ++;
        }
      }
      $date = array(
             'failedc1g' => $countfG,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

    //para 1C

    if($level=='1C'){
      for($i=0; $i<count($correct); $i++){
        if($correct[$i]=='Listening'){
          $countL ++;
        }
      }
      $codigo=$this->session->userdata('code');
      $dat=$this->maximoT();
      $max=$dat[0]['id'];
      $data = array(
             'correctc1l' => $countL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$data);

      for($j=0; $j<count($failed); $j++){
        if($failed[$j]=='Listening'){
          $countfL ++;
        }
      }
      $date = array(
             'failedc1l' => $countfL,
             );
      $this->db->where('id',$max);
      $this->db->where('code_user',$codigo);
      $this->db->update('themes',$date);

    }

  }

  function insertLevel($level){

      $codigo=$this->session->userdata('code');
      $dat=$this->maximoR();
      $max=$dat[0]['id'];
      $data = array(
             'final_level' => $level,
             );
      $this->db->where('code_user',$codigo);
      $this->db->where('id',$max);
      $this->db->update('result',$data);

  }
}
