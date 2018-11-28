<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graficos extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function graphCarrer($carrer){
		$this->db->select('result.final_level,users.carrer');
		$this->db->where('users.carrer',$carrer);
		$this->db->from('result');
		$this->db->join('users','result.code_user=users.code');
		$res = $this->db->get();
		return $res->result();

	}
	function busca(){
	$codigo=$this->session->userdata('code');
	//print_r($codigo);
	$this->db->select('nivela1,nivela2,nivela2a,nivelb1,nivelb1a');
	$this->db->where('code_user',$codigo);
	$this->db->order_by("id", "desc");
    $res = $this->db->get("result");
    //print_r($res);
    return $res->result_array();
	}
	function niveles(){
	$codigo=$this->session->userdata('code');
	//print_r('codigo'.$codigo);
	$this->db->select('nivela1,nivela2,nivela2a,nivelb1,nivelb1a,nivelb2,nivelb2a,nivelc1,nivelc1a');
	$this->db->where('code_user',$codigo);
	$this->db->order_by("id", "desc");
		$res = $this->db->get("result");
		//print_r($res);
		return $res->result_array();
	}
	function buscaThemes(){
	$codigo=$this->session->userdata('code');
	$this->db->select('correcta1g,correcta1r,faileda1g,faileda1r,correcta2g,correcta2r,correcta2l,faileda2g,faileda2r,faileda2l
										correctb1g,correctb1r,correctb1l,failedb1g,failedb1r,failedb1l,correctb2g,correctb2r,correctb2l,correctc1g,correctc1l');
	$this->db->where('code_user',$codigo);
	$this->db->order_by("id", "desc");
		$res = $this->db->get("themes");
		//print_r($res);
		return $res->result_array();
	}

	function themesadmin(){
	$this->db->select('final_level');
	$this->db->from('result');
	$res = $this->db->get();
	return $res->result();
	}

	function reportThemes(){
		$codigo=$this->session->userdata('code');
		$this->db->distinct();
		$this->db->select('result.id,result.fecha,result.nivela1,result.nivela2,result.nivela2a,
		result.nivelb1,result.nivelb1a,result.nivelb2,result.nivelb2a,result.nivelc1,nivelc1a,
		result.final_level,users.name,users.code');
		$this->db->where('result.code_user',$codigo);
		$this->db->from('result');
		$this->db->join('users','result.code_user=users.code');
		$this->db->order_by("users.name", "asc");
		$res = $this->db->get();
		//print_r($res);
		return $res->result();

	}

	function reportStudents(){
		$codigo=$this->session->userdata('code');
		$this->db->distinct();
		$this->db->select('result.id,result.fecha,result.nivela1,result.nivela2,result.nivela2a,
		result.nivelb1,result.nivelb1a,result.nivelb2,result.nivelb2a,result.nivelc1,nivelc1a,
		result.final_level,users.name,users.code');
		$this->db->from('result');
		$this->db->join('users','result.code_user=users.code');
		$this->db->order_by("users.name", "asc");
		$res = $this->db->get();
		//print_r($res);
		return $res->result();
	}
	function listAdmin(){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('kind','a');
		$this->db->from('users');
		$res = $this->db->get();
		//print_r($res);
		return $res->result();
	}
	function listUser(){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('kind','e');
		$this->db->from('users');
		$res = $this->db->get();
		//print_r($res);
		return $res->result();
	}

	function graphicStudents(){
		$this->db->select('final_level');
		$this->db->from('result');
		$res = $this->db->get();
		return $res->result();

	}

	function deleteA($id){
		$this->db->where('id',$id);
		$res=$this->db->delete('users');

		if (!$res) return "error al insertar usuario";
    else return "Usuario eliminado con exito";

	}

}
