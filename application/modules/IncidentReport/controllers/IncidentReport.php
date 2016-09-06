<?php

defined("BASEPATH") or exit("No direct script access allowed");

/**
* Incident Report Controller
* Created By Chrispine Otaalo <c.otaalo@gmail.com>
* Created On 06th September 2016 at 11:54 AM
*/

class IncidentReport extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('IncidentReport/M_IncidentReport');
	}

	function index()
	{
		$this->template
				->setJavascript('IncidentReport/incident_report_js', NULL);
		$this->template
				->addCss('plugins/datatables/jquery.dataTables.min.css')
				->addCss('plugins/datatables/dataTables.bootstrap.css');

		$this->template
				->addJs('plugins/datatables/jquery.dataTables.min.js')
				->addJs('plugins/datatables/dataTables.bootstrap.js');

		$this->template
			->setContentView('IncidentReport/index')
			->setPageTitle('Incident Reporting');
		$this->template->call_admin_template();
	}

	function newReport()
	{
		if(!$this->input->post())
		{
			$this->load->model('User/M_User');

			
			$data['new_nr'] = $this->getLatestNR();
			$users = $this->M_User->find();
			$users_array = "";
			foreach ($users as $user) {
				$users_array[] = [
					'id'	=>	$user->id,
					'text'	=>	$user->user_firstname . " " . $user->user_lastname
				];
			}
			$js_data = [
				'users_list' => json_encode($users_array, JSON_NUMERIC_CHECK)
			];

			$this->template
					->addCss('plugins/select2/select2.min.css')
					->addCss('plugins/datetimepicker/css/bootstrap-datetimepicker.css');

			$this->template
					->addJs('plugins/select2/select2.min.js')
					->addJs('plugins/daterangepicker/moment.min.js')
					->addJs('plugins/datetimepicker/js/bootstrap-datetimepicker.min.js');

			$this->template->setJavascript('IncidentReport/new_incident_report_js', $js_data);

			$this->template
					->setContentView('IncidentReport/new')
					->setPageTitle('New Incident Report');

			$this->template->call_admin_template($data);
		}else{
			// Add the new report

			$data['site_name'] = $this->input->post('site_name');
			$data['fault_description'] = $this->input->post('fault_description');
			$data['date_fault_occured'] = date('Y-m-d H:i:s', strtotime($this->input->post('date_time_fault_occured')));
			$data['request_id'] = $this->input->post('request_id');
			$data['incident_NR'] = $this->getLatestNR();

			$this->M_IncidentReport->addReport($data);

			$incident_id = $this->db->insert_id();

			$assigned_individuals = $this->input->post('assigned_individuals');

			if ($assigned_individuals) {
				$assigned_individuals_data = [];
				foreach ($assigned_individuals as $individual) {
					$assigned_individuals_data[] = [
						'user_id'		=>	$individual,
						'incident_id'	=>	$incident_id
					];
				}

				$this->M_IncidentReport->addAssignedIndividual($assigned_individuals_data);
			}

			redirect(base_url() . 'IncidentReport');


		}
	}

	function getLatestNR()
	{
		$latestNR = $this->M_IncidentReport->findLatestNR();

		$new_nr = "";
		if (!$latestNR->incident_NR) {
			$new_nr = date('n-y') . '-001';
		}else{
			$previous_nr = $latestNR->incident_NR;
			$previous_nr_frags = explode('-', $previous_nr);

			$previous_nr_number = (int)$previous_nr_frags[2];

			$new_nr_number = $previous_nr_number += 1;
			$new_nr = date('n-y') . "-" . str_pad($new_nr_number, 3, "0", STR_PAD_LEFT);
		}

		return $new_nr;
	}
}