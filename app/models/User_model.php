<?php 

class User_model{
	
	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllUsersInfo()
	{
		$query 	= 'SELECT * FROM user';		
		$this->db->query($query);
		return $this->db->fetch_rows();
	}

	public function getUserInfoByUsername($username)
	{
		$query 	= 'SELECT * FROM user WHERE username = :username';		
		$this->db->query($query);
		$this->db->bind('username',$username);
		return $this->db->fetch_row();
	}

	// public function sendLineNotify()
	// {
	// 	$user 		= new User_model();
	// 	$usersInfo 	= $user->getAllUsersInfo();
		
	// 	$line 	= new Utils();
	// 	$i 		= 1;
	// 	$length = count($usersInfo);
	// 	ini_set('max_execution_time', 60 * $length);
	// 	foreach ($usersInfo as $value) {
	// 		$message = $i++.'/'.$length.' - ' .$value['fname'] .' '.  $value['lname'];
	// 		$line->lineNotify($message);
	// 		$respond['message'] = $message;
	// 		sleep(10);
	// 	}
	// 	echo json_encode($respond);

	// }

	// public function updateUserInfo($userId)
	// {
	// 	$status 	= $_REQUEST['status'];
	// 	$stockId 	= $_REQUEST['stockId'];
	// 	$dataUser 	= array('status' => $status);

	// 	$update = $this->db->update("tbl_user", $dataUser, "userId = $userId");

	// 	if ($update == true) {

	// 		$respond['success'] = true;
	// 		$respond['message'] = "แก้ไขข้อมูลสถานะเรียบร้อยแล้ว!";

	// 	}else{

	// 		$respond['success'] = false;
	// 		$respond['message'] = "ERROR :: ไม่สามารถแก้ไขข้อมูลสถานะได้ กรุณาติดต่อผู้ดูแลระบบ!";

	// 	}
	// 	$data 					= new User_model();
	// 	$respond['usersInfo'] 	= $data->getAllUsersInfoByStockId($stockId);
	// 	echo json_encode($respond);
	// }

	// public function updateUserTypeInfo($userId)
	// {
	// 	$userTypeId 	= $_REQUEST['userTypeId'];
	// 	$stockId 		= $_REQUEST['stockId'];
	// 	$dataUser 	= array('userTypeId' => $userTypeId);

	// 	$update = $this->db->update("tbl_user", $dataUser, "userId = $userId");

	// 	if ($update == true) {

	// 		$respond['success'] = true;
	// 		$respond['message'] = "แก้ไขข้อมูลประเภทผู้ใช้เรียบร้อยแล้ว!";

	// 	}else{

	// 		$respond['success'] = false;
	// 		$respond['message'] = "ERROR :: ไม่สามารถแก้ไขข้อมูลประเภทผู้ใช้ได้ กรุณาติดต่อผู้ดูแลระบบ!";

	// 	}
	// 	$data 					= new User_model();
	// 	$respond['usersInfo'] 	= $data->getAllUsersInfoByStockId($stockId);
	// 	echo json_encode($respond);
	// }

	// public function deleteUserInfo($userId)
	// {
	// 	$stockId 	= $_REQUEST['stockId'];
	// 	$deleteData = $this->db->delete("tbl_user", "userId = $userId");

	// 	if ($deleteData == true) {
	// 		$respond['success'] = true;
	// 		$respond['message'] = "ลบข้อมูลผู้ใช้เรียบร้อย!";
	// 	}else{
	// 		$respond['success'] = false;
	// 		$respond['message'] = "ERROR :: ไม่สามารถลบข้อมูลผู้ใช้ได้ กรุณาติดต่อผู้ดูแลระบบ!";
	// 	}

	// 	$data 					= new User_model();
	// 	$respond['usersInfo'] 	= $data->getAllUsersInfoByStockId($stockId);
	// 	echo json_encode($respond);
	// }
}