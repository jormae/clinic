<?php 

class Patient_model{ 

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllHTPatientsInfo()
	{
		$query = "SELECT p.pid, idcard, hn, DATE_FORMAT(DATE_ADD(birth, INTERVAL 543 YEAR),'%d-%m-%Y') AS birth, '' AS incup, CONCAT(c.prename,fname,' ',lname) AS fullname, TIMESTAMPDIFF(YEAR, birth, NOW()) AS AGE, rightname,
					CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS 
					FROM tbl_clinic_member m
					LEFT JOIN person p ON p.pid = m.pid
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

	// public function getAllHTPatientsInfo()
	// {
	// 	$query = "SELECT p.pid, idcard, hn, DATE_FORMAT(DATE_ADD(birth, INTERVAL 543 YEAR),'%d-%m-%Y') AS birth, '' AS incup, CONCAT(c.prename,fname,' ',lname) AS fullname, TIMESTAMPDIFF(YEAR, birth, NOW()) AS AGE, rightname,
	// 				CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS 
	// 				FROM visit v 
	// 				LEFT JOIN visitdiag d ON v.visitno = d.visitno
	// 				LEFT JOIN person p ON p.pid = v.pid
	// 				LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
	// 				LEFT JOIN cright r ON p.rightcode = r.rightcode
	// 				LEFT JOIN creligion l ON l.religioncode = p.religion
	// 				LEFT JOIN cnation cn ON cn.nationcode = p.nation
	// 				LEFT JOIN ceducation ce ON ce.educationcode = p.educate
	// 				LEFT JOIN coccupa co ON co.occupacode = p.occupa
	// 				LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
	// 				LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
	// 				LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi  
	// 				WHERE diagcode = 'I10'
	// 				GROUP BY v.pid
	// 				ORDER BY v.pid";
	// 	$this->db->query($query);
	// 	return $this->db->fetch_rows();
	// }



}