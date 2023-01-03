<?php  

class Validation{

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function isDataExisted($field, $table, $condition)
	{

		$query = "SELECT $field FROM $table WHERE $condition";
		// echo $query;
		return $this->db->fetchColumn($query);

	}

	public function isAuthorized($username, $stockId)
	{
		// $query 	= 'SELECT * FROM tbl_user WHERE  status = 1 AND username = :username AND stockId =:stockId';		
		// $this->db->query($query);
		// $this->db->bind('username', $username);
		// $this->db->bind('stockId', $stockId);
		// $result = $this->db->fetch_row();
		// if (!$result) {
		// 	$res = false; 
		// }
		// else{
		// 	$res = true;
		// }
		// return $res;
	}

}
