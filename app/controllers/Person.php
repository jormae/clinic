<?php 

class Person extends Controller {
	
	public function index($cid = NULL)
	{
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	$username 	= $_SESSION['username'];

	 	$data['pageTitle'] 	= 'Person Records :: ทะเบียนประชากร';

	 	
	 	$this->view('templates/header');
	 	$this->view('templates/navbar', $data);
	 	if (!$cid) {
 			$this->view('person/index', $data);
 		}
 		else{
 			$data['personInfo'] = $this->model('Person_model')->getPersonInfoByCid($cid);
 			$this->view('person/detail', $data);
 		}
	 	$this->view('templates/footer');
	}

	public function update_hn($idcard)
	{
		$this->model('Person_model')->updateHNInfo($idcard);
	}

}