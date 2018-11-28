<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historial extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function busca(){
	$codigo=$this->session->userdata('code');
	print_r($codigo);
	$this->db->select('codigo,estadoA1,estadoA2,estadoB1');
	$this->db->where('codigo',$codigo);
	$this->db->order_by("id", "asc");
    $res = $this->db->get("estados");
    return $res->result_array();
	}

}