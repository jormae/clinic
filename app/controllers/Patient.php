<?php 

class Patient extends Controller {
	
	public function index($clinic)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];


	 	if ($clinic == "ht") {
	 		$clinicTitle = "คลินิคความดัน";
	 	}
	 	elseif ($clinic == "dm") {
	 		$data['patientsInfo'] = $this->model('Patient_model')->getAllDMPatientsInfo();
	 	}
	 	elseif ($clinic == "anc") {
	 		$data['patientsInfo'] = $this->model('Patient_model')->getAllANCPatientsInfo();
	 	}

	 	$data['pageTitle'] 	= 'Patient Records :: ทะเบียนผู้ป่วย'.$clinicTitle;

	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
 		$this->view('patient/index', $data);
	 	$this->view('templates/footer');
	}

	public function d($idcard) //detail
	{
		$this->model('Person_model')->updateHNInfo($idcard);
	}

}