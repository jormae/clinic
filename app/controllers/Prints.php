<?php 

class Prints extends Controller {
	
	public function StickerLabA4($visitno)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	
 		$data['personInfo'] = $this->model('Visit_model')->getPersonInfoByVisitNo($visitno);
 		$data['labsInfo'] 	= $this->model('Visit_model')->getAllLabOrderItemsInfoByVisitNo($visitno);
		$this->view('prints/sticker-lab-a4', $data);
	 	
	 	
	}
	public function StickerLab($visitno)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	
 		$data['personInfo'] = $this->model('Visit_model')->getPersonInfoByVisitNo($visitno);
 		$data['labsInfo'] 	= $this->model('Visit_model')->getAllLabOrderItemsInfoByVisitNo($visitno);
		$this->view('prints/sticker-lab', $data);
	 	
	 	
	}

	public function StickerLabs($date)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

 		$data['labsInfo'] = $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
		$this->view('prints/sticker-lab-all', $data);
	}

	public function LabOrder($strLabName, $visitno)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

 		$data['personInfo'] = $this->model('Visit_model')->getPersonInfoByVisitNo($visitno);
 		$data['labsInfo'] = $this->model('Visit_model')->getAllLabOrderItemsInfoByVisitNo($visitno);
 		
 		if ($strLabName == "ht") {
 			$data['diag'] = "HT";
 		}
 		elseif($strLabName == "dm"){
 			$data['diag'] = "DM";
 		}
		$this->view('prints/laborder', $data);
	}

	public function DocLabs($date)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

 		$data['labsInfo'] = $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
 		// print_r($data['labsInfo']);
		$this->view('prints/lab-doc', $data);
	}

	public function reportlabs($date)
	 {
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	$thDate 		= new ThaiDate();
	 	$data['thDate']	= $thDate->thaiFullDate($date);
 		$data['visitsInfo'] = $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
		$this->view('prints/report-lab', $data);
	 }

	public function appointment($visitno)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

 		$data['personInfo'] 		= $this->model('Visit_model')->getPersonInfoByVisitNo($visitno);
 		$data['appointmentInfo'] 	= $this->model('Visit_model')->getAppointmentInfoByVisitNo($visitno);
		$this->view('prints/appointment', $data);
	}

	public function patient($clinic)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();

 		$data['patientsInfo'] = $this->model('Patient_model')->getAllHTPatientsInfo();
		$this->view('prints/patient', $data);
	}

}