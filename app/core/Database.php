<?php 

// require __DIR__ ."vendor/autoload.php";

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// private $db_host = $_ENV["DB_HOST"];
// private $db_user = $_ENV["DB_USER"];
// private $db_pass = $_ENV["DB_PASS"];
// private $db_name = $_ENV["DB_NAME"];
// private $port 	= $_ENV["PORT"];

class Database
{

	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;
	private $port 	= PORT;

	private $dbh; // Database handler
	private $stmt;

	
	public function __construct()
	{
		// Data Source Name
		$dsn 		= 'mysql:host=' .$this->db_host. ';dbname=' .$this->db_name. ';port=' .$this->port;

		$option = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		);

		try{
			$this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $option);
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
		// $fetchStmt = $this->dbh->prepare($query);
		// echo $this->stmt;
	}

	public function fetchColumn($query)
	{

		$count = $this->dbh->prepare($query);
		$count->execute();
		$num_rows =$count->rowCount();

		if($num_rows > 0){ return true; }
		else{ return false; }
	}


	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
		// die($this->stmt->debugDumpParams());
		// echo $this->stmt->execute();

	}

	public function fetch_rows()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function fetch_row()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount()
	{
		$this->execute();
		return $this->stmt->rowCount();
	}

	// public function rowCount()
	// {

	// 	// $count = $this->dbh->prepare($query);
	// 	$count->execute();
	// 	$num_rows =$count->rowCount();

	// 	return $num_rows;
	// }

	public function insert($table, $rows = null)
	{

		global $msg;

		$sql = "INSERT INTO $table";

		$row = null;
		$value = null;

		foreach ($rows as $key => $values) {
			$row .= ",".$key;
			$value .= ",'".$values."'";
		}

			$sql .= "(".substr($row, 1).")";
			$sql .= " VALUES(".substr($value, 1).")";
			// echo $sql;

			$query = $this->dbh->prepare($sql);	
			$result = $query->execute();

			$log_status = ($result) ? "SUCCESS" : "FAIL";	
			$log = new Database();
			$log->insertLog("INSERT", $log_status, $table, $sql);

			if ($result) {
				return true;
			}else{
				return false;
			}
	}

	public function update($table, $field = null, $condition = null)
	{
	
		global $message;

		$sql = "UPDATE $table SET";
		$set = null;

		foreach ($field as $key => $values) {
			$set .= ", " . $key . " = '" . $values . "'";
		}
		$sql .= substr($set, 1). " WHERE $condition";
		// echo $sql;
		$query = $this->dbh->prepare($sql);
		$result = $query->execute();

		$log_status = ($result) ? "SUCCESS" : "FAIL";	
		$log = new Database();
		$log->insertLog("UPDATE", $log_status, $table, $sql);

		if ($result) {
			return true;
		}else{
			return false;
		}

		
	}

	public function delete($table, $condition)
	{

		$sql = "DELETE FROM $table WHERE $condition";
		// die($sql);

		$query = $this->dbh->prepare($sql);
		$query->execute();
		$result = $query->execute();

		$log_status = ($result) ? "SUCCESS" : "FAIL";	
		$log = new Database();
		$log->insertLog("DELETE", $log_status, $table, $sql);

		if ($result) {
			return true;
		}else{
			$query->errorCode(); 
			return false;
		}
    }

    public function insertLog($log_action, $log_status, $log_table, $log_script)
    {
    	// $session 	= new Session();
    	$fullname  	= $_SESSION['fullname'];

    	$thDate 	= new ThaiDate();
    	$thDate->thaiTimeZone();
    	$datetime 	= date('Y-m-d H:i:s');

    	$logSQL   = 'INSERT INTO tbl_log_query (log_action, log_status, log_table, log_script, log_user, log_datetime) VALUES("'.$log_action.'", "'.$log_status.'", "'.$log_table.'" , "'.$log_script.'", "'.$fullname.'", "'.$datetime.'")';
    	$logQuery = $this->dbh->prepare($logSQL);
    	$logQuery->execute();
    }
}