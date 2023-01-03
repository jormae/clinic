<?php 

class System extends Controller {
	

	 public function index()
	 {
	 	$session = new Session();
	 	$session->checkLogin();
	 	// $session->isAuthorizedToView();

	 	$data['pageTitle'] 	= 'ตั้งค่าระบบ';
	 	$data['linesInfo'] 	= $this->model('System_model')->getAllLinesInfo();

	 	$this->view('templates/header', $data);
	 	$this->view('templates/navbar');
	 	$this->view('system/index', $data);
	 	$this->view('templates/footer');
	 }

	public function export()
	{

		$host = DB_HOST;
		$user = DB_USER;
		$pass = DB_PASS;
		$name = DB_NAME;
		$backup_name = 'BHIP_';

		$this->model('Setting_model')->exportDatabase($host,$user,$pass,$name,$tables=false,$backup_name);
		// $this->model('Setting_model')->exportDatabase();

	}

	public function linenotify()
 	{
 		$this->model('System_model')->sendLineNotify(); 		
 	}

}
