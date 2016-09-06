<?php

defined("BASEPATH") or exit("No direct script access allowed");

class M_IncidentReport extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function findLatestNR()
	{
		$sql = "SELECT MAX(incident_NR) as incident_NR FROM incident";

		return $this->db->query($sql)->row();
	}

	function addReport($data)
	{
		$this->db->insert('incident', $data);
	}

	function addAssignedIndividual($data)
	{
		$this->db->insert_batch('incident_assigned_individuals', $data);
	}
}