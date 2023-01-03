<?php 

class Session {

	// public $url 		= "http://portal.bachohospital.com";
	public $url 		= SESSION_URL;
	public $timeLimit	= 3600; // 1800 sec means 30 min.
	public $username;
	public $fullname;
	// public $deptId;

	function __construct() {


		if(!session_start())
		{
			die("session is not enabled.");
		}
	}

	// check if any user is logged in
	function isLoggedIn()
	{
		$isExpired = false;
		if(isset($_SESSION['userSessionTime']))
		{
			$isExpired = (time() - $_SESSION['userSessionTime'])<$this->timeLimit ? false : true;
		}
		if(isset($_SESSION['username']) && !$isExpired)
		{
			$this->username 	= $_SESSION['username'];
			$this->fullname 	= $_SESSION['fullname'];
			// $this->deptId 		= $_SESSION['deptId'];
			$_SESSION['userSessionTime'] = time();
			return true;
		}
		else
		{
			return false;
			// redirect("index.php");
		}
	}

	function checkLogin()
	{
		if(!$this->isLoggedIn())
		{
			die('<meta http-equiv="refresh" content="0;URL='.$this->url.'">');
		}
	}

	function login()
	{
		$auth 		= new Auth_model();
		$loginInfo 	=  $auth->getLoginInfoByUsername();

		$_SESSION['fullname'] 	= $loginInfo['fname'].' '.$loginInfo['lname'];
		$this->fullname 		= $loginInfo['fname'].' '.$loginInfo['lname'];
		$_SESSION['username'] 	= $loginInfo['username'];
		$this->username 		= $loginInfo['username'];
		// $_SESSION['deptId'] 	= $loginInfo['deptId'];
		// $this->deptId 			= $loginInfo['deptId'];
		$_SESSION['grouplevel'] = $loginInfo['grouplevel'];
		$this->grouplevel 		= $loginInfo['grouplevel'];
		$_SESSION['userSessionTime'] 	= time();
		
	}




	function isAuthorizedToView()
    {
		 if( $_SESSION['bhip'] == 0){
   //      	die("<br><br><br><br>
			// 	<center>
			// 	<img src='https://e-project.bachohospital.com/template/minimal/images/bacho401.png' width='500'>
			// 	<br>
			// 	<a href='https://portal.bachohospital.com' style=\"color:red; text-align:center; font-size:30px\">BACK</a>
			// 	</center>");
			// }
			die('<meta http-equiv="refresh" content="0;URL=https://portal.bachohospital.com/view/auth/page=error">');

			// redirect('https://portal.bachohospital.com/view/auth/page=error');
		}
	
	}

}
