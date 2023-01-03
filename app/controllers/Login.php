<?php 

class Login extends Controller {
	
	public function index()
	{
		// $session 	= new Session();
		// $session->checkLogin();
		// $isUserLoggedIn = $session->isLoggedIn();
		// $session->checkLogin();
		// if ($isUserLoggedIn) {
		//  	// header( "location: auth/index" );
		//  	print_r($isUserLoggedIn);
		// }else{
		 	// $this->view('auth/index');
		// }
		// $data['userInfo'] = $session->login($username, $password);
	 	$data['pageTitle'] = 'Dashboard :: หน้าหลัก';

		$this->view('templates/header');
	 	$this->view('templates/navbar');
	 	$this->view('templates/sidebar');
		$this->view('login/index', $data);
	 	$this->view('templates/footer');

	}

	public function login()
	{
	 // 	header('Access-Control-Allow-Origin: *');
		// header("Content-Type: application/json; charset=UTF-8");
		
		// $username = $_REQUEST['username'];
		// $password = $_REQUEST['password'];
	 	
	 	$session 	= new Session();
	 	$data['pageTitle'] = 'Dashboard :: หน้าหลัก';
	 	
		// $data['userInfo'] = $session->login($username, $password);
		// echo $data['userInfo'];
		// echo json_encode( $data['userInfo']);
		// $userInfo = $session->login($username, $password);

		// $log = new Database();
		// $log->insertLoginLog($username, 'a', 'b');
		// $log->insertLoginLog($username, $res['success'], $res['message']);
		
		// var_dump($userInfo);

	}

	function logout()
	{
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (isset($_COOKIE[session_name()])) {
		    setcookie(session_name(), '', time()-42000, '/');
		}
		session_destroy();
		header( "Location: index" );
	}



	public function enroll()
	{
		$this->model('Auth_model')->enrollUserInfo(); 
	}

	public function approve($requestUserId)
	{
		$this->model('Auth_model')->approveUserInfo($requestUserId); 
	}

	public function reject($requestUserId)
	{
		$this->model('Auth_model')->rejectUserInfo($requestUserId); 
	}

}