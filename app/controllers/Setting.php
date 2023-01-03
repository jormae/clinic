<?php 

class Setting extends Controller {
	

	 public function index()
	 {
	 	// $session = new Session();
	 	// $session->checkLogin();
	 	// $session->isAuthorizedToView();

	 	$data['pageTitle'] = 'ตั้งค่าระบบ';
	 	$data['staff'] = $this->model('Staff_model')->getAllStaffsInfo();

	 	$this->view('templates/header', $data);
	 	$this->view('templates/sidebar');
	 	$this->view('templates/navbar');
	 	$this->view('setting/index', $data);
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

	public function search($staffId = null)
	{
		// $session = new Session();
	 // 	$session->checkLogin();
	 // 	$session->isAuthorizedToView();
	 	
	 	$data['pageTitle'] = 'บุคลากร';
	 	$data['staff'] = $this->model('Staff_model')->searchAllActiveStaff();

	 	$this->view('templates/header', $data);
	 	$this->view('templates/sidebar');
	 	$this->view('templates/navbar');
	 	$this->view('staff/search', $data);
	 	$this->view('templates/footer');
	}

 	public function delete($staffId)
 	{

 		$this->model('Staff_model')->deleteStaffInfo($staffId); 	

	}

	public function insert()
	{
		$this->model('Staff_model')->insertStaffInfo(); 	

	}
 
 	public function update($staffId)
	{
		$this->model('Staff_model')->updateStaffInfo($staffId); 

	}

	
}

