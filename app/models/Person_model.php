<?php 

class Person_model{ //tbl_kpidept

	private $db;
	// private $dataDept;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllPersonsInfo()
	{
		$query = "SELECT pid, idcard, hn, DATE_FORMAT(DATE_ADD(birth, INTERVAL 543 YEAR),'%d-%m-%Y') AS birth, '' AS incup, CONCAT(c.prename,fname,' ',lname) AS fullname, TIMESTAMPDIFF(YEAR, birth, NOW()) AS AGE, rightname,
					CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS 
					FROM person p
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
					LEFT JOIN cright r ON p.rightcode = r.rightcode
					LEFT JOIN creligion l ON l.religioncode = p.religion
					LEFT JOIN cnation cn ON cn.nationcode = p.nation
					LEFT JOIN ceducation ce ON ce.educationcode = p.educate
					LEFT JOIN coccupa co ON co.occupacode = p.occupa
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi  ";
		$this->db->query($query);
		return $this->db->fetch_rows();
	}

	public function getPersonInfoByCid($cid)
	{
		$query = "SELECT *, TIMESTAMPDIFF(YEAR, birth, NOW()) AS AGE_Y, 
					TIMESTAMPDIFF(MONTH, birth, NOW()) % 12 as AGE_M,
					FLOOR( TIMESTAMPDIFF(DAY, birth, NOW()) % 30.4375 ) as AGE_D,
					CONCAT(c.prename,fname,' ',lname) AS fullname, 
					CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS
					FROM person p 
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
					LEFT JOIN cright r ON p.rightcode = r.rightcode
					LEFT JOIN creligion l ON l.religioncode = p.religion
					LEFT JOIN cnation cn ON cn.nationcode = p.nation
					LEFT JOIN ceducation ce ON ce.educationcode = p.educate
					LEFT JOIN coccupa co ON co.occupacode = p.occupa
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi
					WHERE p.idcard = :cid";
		$this->db->query($query);
		$this->db->bind('cid', $cid);
		return $this->db->fetch_row();
	}

	public function updateHNInfo($idcard)
	{
		$session = new Session();

		$hn 		= $_REQUEST['hn'];
		$dataPerson	= array('hn' =>$hn);
		$update 	= $this->db->update("person", $dataPerson, "idcard = $idcard");

		if ($update == true) {

			$respond['success'] = true;
			$respond['message'] = "แก้ไขข้อมูล HN เรียบร้อยแล้ว!";

		}else{

			$respond['success'] = false;
			$respond['message'] = "ERROR :: ไม่สามารถแก้ไขข้อมูล HN ได้ กรุณาติดต่อผู้ดูแลระบบ!";

		}
		echo json_encode($respond);

	}

}