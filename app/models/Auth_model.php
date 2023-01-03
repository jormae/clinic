<?php 

include_once 'User_model.php';

class Auth_model{

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}


	public function getLoginInfo($username, $password)
	{
		$query = 'SELECT * 
					FROM user
					WHERE username = :username 
					AND password = :password';
		$this->db->query($query);
		$this->db->bind('username', $username);
		$this->db->bind('password', $password);
		return $this->db->fetch_row();
	}

	public function getLoginInfoByUsername()
	{
		$username 	= $_REQUEST['username'];
		$query 		= 'SELECT * 
						FROM user
						WHERE username = :username';
		$this->db->query($query);
		$this->db->bind('username', $username);
		return $this->db->fetch_row();
	}

	public function validateLoginInfo()
	{
		// parse_str($_REQUEST['form_data'], $loginInfo);
		// $loginInfo = array();
		$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

		$auth = new Auth_model();
		$getLoginInfo = $auth->getLoginInfo($username, $password);
		return $getLoginInfo;

	}

}
