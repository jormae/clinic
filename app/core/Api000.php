<?php 

class Api{

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllProfileInfoByCid($cid)
	{
		$query = 'SELECT s.* , c.* , m.* , d.* , p.* , CONCAT(pname,fname," ",lname) AS fullname
					FROM bachohos_portal.tbl_staff s 
					LEFT JOIN bachohos_portal.tbl_contracttype c ON c.contractTypeId = s.contractTypeId
					LEFT JOIN bachohos_portal.tbl_maindepartment m ON m.mainDeptId = s.mainDeptId
					LEFT JOIN bachohos_portal.tbl_department d ON d.deptId = s.deptId 
					LEFT JOIN bachohos_portal.tbl_position p ON p.positionId = s.positionId
			WHERE cid = :cid';
		$this->db->query($query);
		$this->db->bind('cid', $cid);
		return $this->db->fetch_row();
	}

	public function getAllDeptInfoByDeptId($deptId)
	{
		$url 	= 'https://api.bachohospital.org/public/dept/';
		// $url 	= 'http://localhost/dropbox/SYSTEMS/api/public/dept/';
		$apiUrl = $url . $deptId;
		$json   = file_get_contents($apiUrl);

		$data['dept'] = json_decode($json, true);

			$deptInfo['deptName']		= $data['dept']['deptName'];
			$deptInfo['mainDeptId'] 	= $data['dept']['mainDeptId'];
			$deptInfo['mainDeptName']	= $data['dept']['mainDeptName'];

		return $deptInfo;

	}
	
	public function getStaffPositionInfoByStaffName($staffName)
	{
		$url 	= 'https://api.bachohospital.org/public/staff/staffposition/';
		// $url 	= 'http://localhost/dropbox/SYSTEMS/api/public/staff/staffposition/';
		$staffName = str_replace(" ", "%20", $staffName); //solve thai value url to convert white space into %20
		$apiUrl = $url.$staffName;

		$json   = file_get_contents($apiUrl);

		$data['position'] = json_decode($json, true);

			// $deptInfo['positionId']		= $data['position']['positionId'];
			$deptInfo['positionName'] 	= $data['position']['positionName'];

		return $deptInfo;

	}

	public function getStaffInfoByStaffName($staffName)
	{
		
		$sql 	= "	SELECT s.* , c.* , m.* , d.* , p.* , CONCAT(pname,fname,' ',lname) AS fullname
					FROM bachohos_portal.tbl_staff s 
					LEFT JOIN bachohos_portal.tbl_contracttype c ON c.contractTypeId = s.contractTypeId
					LEFT JOIN bachohos_portal.tbl_maindepartment m ON m.mainDeptId = s.mainDeptId
					LEFT JOIN bachohos_portal.tbl_department d ON d.deptId = s.deptId 
					LEFT JOIN bachohos_portal.tbl_position p ON p.positionId = s.positionId
					WHERE CONCAT_WS(' ',CONCAT(pname,fname),lname) LIKE :staffName";

		$this->db->query($sql);
		$this->db->bind('staffName',"%$staffName%");
		return $this->db->fetch_row();
		// echo json_encode($staffInfo);
	
	}

	public function getAllLabOrdersInfoByDate($date)
	{
		$query = '	SELECT *, TIMESTAMPDIFF(YEAR, birth, :date) AS AGE
					FROM visitlabchcyhembmsse l
					LEFT JOIN visit v ON l.visitno = v.visitno
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					WHERE datecheck = :date
					GROUP BY l.visitno';
		$this->db->query($query);
		$this->db->bind('date', $date);
		return $this->db->fetch_rows();
	}
	
}