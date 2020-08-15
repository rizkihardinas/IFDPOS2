<?php 
/**
 * 
 */
class Employee extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->load->model('JobHistory','job_history');
		
	}
	function addJobHistory(){
		$company_job_hitory = $this->input->post('company_job_hitory');
		$department_job_hitory = $this->input->post('department_job_hitory');
		$designation_job_hitory = $this->input->post('designation_job_hitory');
		$start_date_job_hitory = $this->input->post('start_date_job_hitory');
		$end_date_job_hitory = $this->input->post('end_date_job_hitory');
		$reason_job_hitory = $this->input->post('reason_job_hitory');
			
		$i = count($this->data);
		$i++;
		// $job = new JobHistory();
		// $job->setNama($company_job_hitory);
		$job[$i] = array(
			'company_job_hitory' => $company_job_hitory,
			'department_job_hitory' => $department_job_hitory,
			'designation_job_hitory' => $designation_job_hitory,
			'start_date_job_hitory' => $start_date_job_hitory,
			'end_date_job_hitory' => $end_date_job_hitory,
			'reason_job_hitory' => $reason_job_hitory
		);
		array_push($this->data, $job[$i]);
		$this->getJobHistory()
;		// array_

	}
	function getJobHistory(){
		print_r($this->data);
		// foreach ($this->data as $job) {
		// 	# code...
		// }
	}
}
 ?>