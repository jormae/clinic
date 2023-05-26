<?php 

class User extends Controller {
	
	public function index()
	{
	 	$session = new Session();
	 	$session->checkLogin();

	 	$data['pageTitle'] 	= 'USERS LIST :: รายชื่อผู้ใช้ทั้งหมด';
	 	// $data['usersInfo'] 	= $this->model('User_model')->getAllUsersInfo();	 
	
	 	$this->view('templates/header', $data);
	 	$this->view('templates/navbar', $data);
	 	$this->view('user/index', $data);
	 	$this->view('templates/footer');
	}

	public function form($idcard)
	{
	 	$session = new Session();
	 	$session->checkLogin();

	 	$data['pageTitle'] 	= 'UPDATE USER :: แก้ไขข้อมูลบริษัท';
	 	// $data['stockInfo'] 		= $this->model('Stock_model')->getStocksInfoByStockId($stockId);
	 	// $data['companyInfo'] 	= $this->model('Company_model')->getCompaniesInfoByCompanyId($companyId);	
	 	
	 	$this->view('templates/header', $data);
	 	$this->view('templates/navbar', $data);
	 	$this->view('user/form', $data);
	 	$this->view('templates/footer');
	}
 
  	public function linenotify()
 	{
 		$this->model('User_model')->sendLineNotify(); 		
 	}

}