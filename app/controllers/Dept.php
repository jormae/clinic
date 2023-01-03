<?php 

class Dept extends Controller {
	
	public function lab($date = NULL)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	$thDate 		= new ThaiDate();
	 	$date 			= empty($date) ? date('Y-m-d') : $date;
	 	$today 			= date('Y-m-d');
	 	// $today 			= '2020-05-13';
	 	$data['date']	= $date;
	 	$data['thDate']	= $thDate->thaiFullDate($date);
	 	$data['pageTitle'] 	= 'Laboratory Unit :: ห้องปฏิบัติการตรวจวิเคราะห์';
 		// $data['visitsInfo'] = $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
	 	$newVisitsInfo 		= $this->model('Visit_model')->getAllNewLabOrdersInfoByDate($date);
	 	$count 				= count($newVisitsInfo);

 		if ($date == $today && $count >= 1) {
 			$data['btnLineStatus'] = '';
 		}
 		else{
 			$data['btnLineStatus'] = 'disabled="disabled"';
 		}
	 	
	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
		$this->view('dept/lab', $data);
	 	$this->view('templates/footer');
	}

	public function LabOrder($visitno = NULL)
	 {
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	// $date = date('Y-m-d');
	 	$date = '2020-05-13';
	 	$data['pageTitle'] 	= 'Laboratory Unit :: ห้องปฏิบัติการตรวจวิเคราะห์';

	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
	 	$this->view('templates/sidebar', $data);
	 	
	 	if ($visitno) {
	 		$data['personInfo'] = $this->model('Visit_model')->getPersonInfoByVisitNo($visitno);
	 		$data['labsInfo'] 	= $this->model('Visit_model')->getAllLabOrderItemsInfoByVisitNo($visitno);
			$this->view('dept/lab-detail', $data);
	 	}
	 	else{
	 		$data['visitsInfo'] = $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
			$this->view('dept/lab', $data);
	 	}
	 	
	 	$this->view('templates/footer');
	}

	public function doctor($date = NULL)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	$thDate 		= new ThaiDate();
	 	$date 			= empty($date) ? date('Y-m-d') : $date;
	 	$today 			= date('Y-m-d');
	 	// $date 			= '2020-05-13';
	 	$data['date']	= $date;
	 	$data['thDate']	= $thDate->thaiFullDate($date);
	 	$data['pageTitle'] 	= 'Examine and Diagnose Unit :: ห้องตรวจและวินิจฉัย';
 		// $data['visitsInfo'] = $this->model('Visit_model')->getAllVisitsInfoByDate($date);
	 	
	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
		$this->view('dept/doctor', $data);
	 	$this->view('templates/footer');
	}

}