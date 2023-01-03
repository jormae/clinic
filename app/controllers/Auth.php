<?php 

class Auth extends Controller {
	
	public function index()
	{
		$session 	= new Session();
		$isUserLoggedIn = $session->isLoggedIn();

		if ($isUserLoggedIn) {
		 	header( "location: ../#/dashboard" );
		}else{
			$this->view('templates/header');
	 		// $this->view('templates/navbar', $data);
		 	$this->view('auth/index');
		}
	}

	public function login()
	{
		$session 	= new Session();
		$validation = $this->model('Auth_model')->validateLoginInfo(); 

		// if ($validation['workStatusId'] == '0') {
		// 	$respond['success'] = false;
		// 	$respond['message'] = "บัญชีผู้ใช้ถูกระงับการใช้งาน กรุณาติดต่อผู้ดูแลระบบ";
		// }
		// else{

			if ($validation == true) {
				$loginInfo = $session->login();
				$respond['success'] = true;
				$respond['message'] = 'เข้าสู่ระบบสำเร็จ';
				// sleep(3);

			}
			else{
				$respond['success'] = false;
				$respond['message'] = "เข้าสู่ระบบล้มเหลว กรุณาลองใหม่อีกครั้ง";
			}
		// }
		// $respond['success'] = true;
		// $respond['message'] = 'เข้าสู่ระบบสำเร็จ';
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($respond);
	}

	function logout()
	{
		$session = new Session();
		$_SESSION= array();
		session_destroy();
		if (isset($_COOKIE[session_name()])) {
		    unset($_COOKIE[session_name()]);
		    setcookie(session_name(), null, time()-14400, '/');
		}
		header( "Location: ../auth" );
	}

}
