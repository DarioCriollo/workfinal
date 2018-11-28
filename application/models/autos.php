<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autos extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function busca(){
		$this->db->select('marca,cantidad');
    $res = $this->db->get("autos");
    return $res->result_array();
	}

}
