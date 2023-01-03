<?php 

class Api extends Controller {
	
	public function person($cid = null)
	{
		header('Access-Control-Allow-Origin: *');  
		if ($cid) {
			$res['data'] = $this->model('Person_model')->getPersonInfoByCid($cid);
		}
		else{
			$res['data'] = $this->model('Person_model')->getAllPersonsInfo();
		}
		echo json_encode($res);
	}

	public function diagnose($vn)
	{
		header('Access-Control-Allow-Origin: *');  
		$res['data'] = $this->model('Visit_model')->getAllDiagnosesInfoByVisitNo($vn);
		echo json_encode($res);
	}

	public function lab($vn)
	{
		header('Access-Control-Allow-Origin: *');  
		$res['data'] = $this->model('Visit_model')->getAllLabOrderItemsInfoByVisitNo($vn);
		echo json_encode($res);
	}

	public function drug($vn)
	{
		header('Access-Control-Allow-Origin: *');  
		$res['data'] = $this->model('Visit_model')->getAllDrugsInfoByVisitNo($vn);
		echo json_encode($res);
	}

	public function appointment($vn)
	{
		header('Access-Control-Allow-Origin: *');  
		$pid 		= $this->model('Visit_model')->getPIDInfoByVisitNo($vn);
		$res['data']= $this->model('Visit_model')->getAllAppointmentsInfoByPid($pid);
		echo json_encode($res);
	}

	public function dept_doctor($date)
	{
		header('Access-Control-Allow-Origin: *');  
		$res['data']= $this->model('Visit_model')->getAllVisitsInfoByDate($date);
		echo json_encode($res);
	}

	public function dept_lab($date)
	{
		header('Access-Control-Allow-Origin: *');  
		$res['data']= $this->model('Visit_model')->getAllLabOrdersInfoByDate($date);
		echo json_encode($res);
	}

	public function patient($clinic)
	{
		header('Access-Control-Allow-Origin: *');  
		if ($clinic == "ht") {
	 		$res['data']=  $this->model('Patient_model')->getAllHTPatientsInfo();
	 	}
	 	elseif ($clinic == "dm") {
	 		$res['data']=  $this->model('Patient_model')->getAllDMPatientsInfo();
	 	}
	 	elseif ($clinic == "anc") {
	 		$res['data']=  $this->model('Patient_model')->getAllANCPatientsInfo();
	 	}
		echo json_encode($res);
	}


}