<?php 

include_once "MySqlSessionHandler.php";
class Session {

	public $url 		= "http://portal.bachohospital.com";
	public $timeLimit	= 86400; // 86400 sec means 24 hrs.
	public $username;
	public $fullname;
	public $stock;
	public $userTypeId;
	public $deptId;

	
	function __construct() {
	
	
		session_name('bachohospital');
		ini_set("session.cookie_domain", ".bachohospital.com");
		session_cache_expire(1); // cache the session for 30 min.

		// set save session data in database
		$session = new MySqlSessionHandler();
		// add db data

		$session->setDbDetails('localhost', 'bachohos_admin', "jormae'69", 'bachohos_portal');
		$session->setDbTable('tbl_session');
		session_set_save_handler(array($session, 'open'),
		                         array($session, 'close'),
		                         array($session, 'read'),
		                         array($session, 'write'),
		                         array($session, 'destroy'),
		                         array($session, 'gc'));
		// The following prevents unexpected effects when using objects as save handlers.
		register_shutdown_function('session_write_close');

		if(!session_start())
		{
			die("session is not enabled.");
		}
	}
	

	// check if any user is logged in
	function isLoggedIn()
	{
		$isExpired = false;
		//if(isset($_SESSION['userSessionTime']))
		//{
		//	$isExpired = (time() - $_SESSION['userSessionTime'])<$this->timeLimit ? false : true;
		//}
		//if(isset($_SESSION['username']) && !$isExpired)
		if(isset($_SESSION['username']))
		{
			$this->username 	= $_SESSION['username'];
			$this->fullname 	= $_SESSION['fullname'];
			$this->deptId 		= $_SESSION['deptId'];
			$this->stock 		= $_SESSION['stock'];
			//$_SESSION['userSessionTime'] = time();
			return true;
		}
		else
		{
			return false;
			// redirect("index.php");
		}
		die( $_SESSION['username']);
	}

	function checkLogin()
	{
		if(!$this->isLoggedIn())
		{
			die('<meta http-equiv="refresh" content="0;URL='.$this->url.'">');
		}
	}




	function isAuthorizedToView()
    	{
		 if( $_SESSION['stock'] == 0){
        	/*die("<br><br><br><br>
				<center>
				<img src='https://e-project.bachohospital.com/template/minimal/images/bacho401.png' width='500'>
				<br>
				<a href='https://portal.bachohospital.com' style=\"color:red; text-align:center; font-size:30px\">BACK</a>
				</center>");*/
		//redirect('https://portal.bachohospital.com/view/auth/page=error');
		die('<meta http-equiv="refresh" content="0;URL=https://portal.bachohospital.com/view/auth/?page=error&sys=stock">');
		}
	}
	
}


