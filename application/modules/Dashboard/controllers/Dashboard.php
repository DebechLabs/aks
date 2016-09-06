<?php

defined("BASEPATH") or exit("No direct access script allowed");

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->call_admin_template();
	}
}