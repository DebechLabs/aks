<?php

defined("BASEPATH") or exit("No direct script access allowed");

class M_User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function find()
	{
		$query = $this->db->get('user');

		return $query->result();
	}
}