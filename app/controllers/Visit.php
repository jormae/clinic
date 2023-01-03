<?php 

class Visit extends Controller {
	
	public function vn($visitno)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	$data['pageTitle'] 	= 'Examine and Diagnose Detail :: ข้อมูลการตรวจและวินิจฉัย';
	 	$data['visitInfo'] 	= $this->model('Visit_model')->getVisitDetailsInfoByVisitNo($visitno);
	 	// $data['diagsInfo'] 	= $this->model('Visit_model')->getAllDiagnosesInfoByVisitNo($visitno);
	 	// $data['drugsInfo'] 	= $this->model('Visit_model')->getAllDrugsInfoByVisitNo($visitno);
	 	// $pid 				= $data['visitInfo']['pid'];
	 	// $data['appointmentsInfo'] 	= $this->model('Visit_model')->getAllAppointmentsInfoByPid($pid);
	 	
	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
		$this->view('visit/visit-detail', $data);
	 	$this->view('templates/footer');
	}

}