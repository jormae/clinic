<?php 

class Visit_model{ 

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getPersonInfoByVisitNo($visitno)
	{
		$query = "	SELECT *, TIMESTAMPDIFF(YEAR, birth, visitdate) AS AGE, CONCAT(c.prename,fname,' ',lname) AS fullname, CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS
					FROM visit v
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi
					WHERE visitno = :visitno";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_row();
	}

	public function getAllVisitsInfoByDate($date)
	{
		$query = '	SELECT *, TIMESTAMPDIFF(YEAR, birth, :date) AS AGE, (SELECT diagcode FROM visitdiag d WHERE d.visitno = v.visitno AND dxtype = "01" LIMIT 1) AS diagcode
					FROM visit v
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					WHERE visitdate = :date
					ORDER BY v.timestart';
		$this->db->query($query);
		$this->db->bind('date', $date);
		return $this->db->fetch_rows();
	}

	public function getAllLabOrdersInfoByDate($date)
	{
		$query = "	SELECT *,  DATE_FORMAT(DATE_ADD(visitdate, INTERVAL 543 YEAR),'%d-%m-%Y') AS visitdate, 
					TIMESTAMPDIFF(YEAR, birth, :date) AS AGE, CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS, (SELECT diagcode FROM visitdiag d WHERE d.visitno = v.visitno AND dxtype = '01' LIMIT 1) AS diagcode, (SELECT lineLogId FROM tbl_line_log ll WHERE ll.visitdate = :date AND ll.idcard = p.idcard) AS LINE_STATUS,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH07' AND l.visitno = v.visitno)  AS Cholesterol,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH09' AND l.visitno = v.visitno)  AS Creatinine,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH11X0' AND l.visitno = v.visitno)  AS DTX,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH14' AND l.visitno = v.visitno)  AS HDL,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH17' AND l.visitno = v.visitno)  AS LDL,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH25' AND l.visitno = v.visitno)  AS Triglyceride,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH27' AND l.visitno = v.visitno)  AS Uric,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH99' AND l.visitno = v.visitno)  AS HbA1c,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CHeGFR' AND l.visitno = v.visitno)  AS eGFR,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'HE01000000' AND l.visitno = v.visitno)  AS CBC,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH11' AND l.visitno = v.visitno)  AS FBS,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'CH04' AND l.visitno = v.visitno)  AS BUN,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'MS01020201' AND l.visitno = v.visitno)  AS 'Urine Microalbumin',
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'MS01020200' AND l.visitno = v.visitno)  AS Albumin,
					(SELECT labresultdigit FROM visitlabchcyhembmsse l WHERE l.labcode = 'MS01020300' AND l.visitno = v.visitno)  AS Glucose
					FROM visitlabchcyhembmsse l
					LEFT JOIN visit v ON l.visitno = v.visitno
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi
					WHERE visitdate = :date
					GROUP BY l.visitno DESC";
		$this->db->query($query);
		$this->db->bind('date', $date);
		return $this->db->fetch_rows();
	}

	public function getAllNewLabOrdersInfoByDate($date) //Unsent Line notify
	{
		$query = "	SELECT *, TIMESTAMPDIFF(YEAR, birth, :date) AS AGE, CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS
					FROM visitlabchcyhembmsse l
					LEFT JOIN visit v ON l.visitno = v.visitno
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi 
					WHERE visitdate = :date
					AND p.idcard NOT IN (SELECT idcard FROM tbl_line_log WHERE visitdate = :date)
					GROUP BY l.visitno";
		$this->db->query($query);
		$this->db->bind('date', $date);
		return $this->db->fetch_rows();
	}

	public function getAllLabOrderItemsInfoByVisitNo($visitno)
	{
		$query = '	SELECT *
					FROM visitlabchcyhembmsse l
					LEFT JOIN clabchcyhembmsse c ON l.labcode = c.labcode
					WHERE visitno = :visitno';
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_rows();
	}

	public function getVisitDetailsInfoByVisitNo($visitno)
	{
		$query = "	SELECT *, TIMESTAMPDIFF(YEAR, birth, visitdate) AS AGE_Y, 
					TIMESTAMPDIFF(MONTH, birth, visitdate) % 12 as AGE_M,
					FLOOR( TIMESTAMPDIFF(DAY, birth, visitdate) % 30.4375 ) as AGE_D,
					CONCAT(c.prename,fname,' ',lname) AS fullname, 
					CONCAT(hnomoi, ' ม.', mumoi, ' ต.',subdistname, ' อ.', distname, ' จ.', provname,' ', postcodemoi) AS ADDRESS
					FROM visit v
					LEFT JOIN person p ON p.pid = v.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode					
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					LEFT JOIN creligion l ON l.religioncode = p.religion
					LEFT JOIN cnation cn ON cn.nationcode = p.nation
					LEFT JOIN ceducation ce ON ce.educationcode = p.educate
					LEFT JOIN coccupa co ON co.occupacode = p.occupa
					LEFT JOIN cprovince cp ON cp.provcode = p.provcodemoi
					LEFT JOIN cdistrict cd ON cd.provcode = cp.provcode AND cd.distcode = p.distcodemoi
					LEFT JOIN csubdistrict cs ON cd.provcode = cs.provcode AND cd.distcode = cs.distcode AND  cs.subdistcode = p.subdistcodemoi 
					WHERE visitno = :visitno";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_row();
	}

	public function getAllAppointmentsInfoByPid($pid)
	{
		$query = "	SELECT *, DATE_FORMAT(DATE_ADD(appodate, INTERVAL 543 YEAR),'%d-%m-%Y') AS appodate
					FROM visitdiagappoint va
					LEFT JOIN visit v ON v.visitno = va.visitno
					LEFT JOIN appointype a ON a.appointypeid = va.appotype
					LEFT JOIN user u ON u.username = v.username
					LEFT JOIN _tmpprename_code p ON p.prenamecode = u.prename
					WHERE pid = :pid
					ORDER BY visitdate DESC";
		$this->db->query($query);
		$this->db->bind('pid', $pid);
		return $this->db->fetch_rows();
	}

	public function getAppointmentInfoByVisitNo($visitno)
	{
		$query = "	SELECT *
					FROM visitdiagappoint va
					LEFT JOIN visit v ON v.visitno = va.visitno
					LEFT JOIN appointype a ON a.appointypeid = va.appotype
					LEFT JOIN user u ON u.username = v.username
					LEFT JOIN _tmpprename_code p ON p.prenamecode = u.prename
					WHERE v.visitno = :visitno";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_row();
	}

	public function getAllDiagnosesInfoByVisitNo($visitno)
	{
		$query = "	SELECT *
					FROM visitdiag vd
					LEFT JOIN cdisease cd ON cd.diseasecode = vd.diagcode
					LEFT JOIN cdxtype dt ON vd.dxtype = dt.dxtypecode
					WHERE visitno = :visitno
					ORDER BY dxtype ASC";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_rows();
	}

	public function getAllDrugsInfoByVisitNo($visitno)
	{
		$query = "	SELECT vd.*, drugname
					FROM visitdrug vd
					LEFT JOIN cdrug cd ON cd.drugcode = vd.drugcode
					WHERE visitno = :visitno ";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_rows();
	}

	public function getPIDInfoByVisitNo($visitno)
	{
		$query = "	SELECT pid
					FROM visit
					WHERE visitno = :visitno ";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		$result = $this->db->fetch_row();
		$pid 	= $result['pid'];
		return $pid;
	}

	

	// public function insertDepartmentInfo()
	// {		
	// 	$post = new Department_model();
	// 	$dataVisit = $post->departmentPostInfo();	
	// 	$kpiVisitName 	= $dataVisit['kpiVisitName'];

	// 	//Validate Data Existed
	// 	$validate 	= new Validation();		
	// 	$deptValidate= $validate->isDataExisted('kpiVisitName', "tbl_kpidept", "kpiVisitName = '$kpiVisitName'");

	// 	if ($deptValidate == true) {

	// 		$res['success'] = false;
	// 		$res['message'] = "ชื่อหน่วยงานซ้ำ กรุณาลองใหม่อีกครั้ง!";

	// 	}else{

	// 		$res['success'] = true;
	// 		$res['message'] = "เพิ่มข้อมูลหน่วยงานใหม่สำเร็จ!";
	// 		$this->db->insert("tbl_kpidept", $dataVisit);
	// 	}

	// 	echo json_encode($res);
	// 	// End of validation

	// }

	// public function updateDepartmentInfo($kpiVisitId)
	// {
	// 	$post = new Department_model();
	// 	$dataVisit = $post->departmentPostInfo();
	// 	$this->db->update("tbl_kpidept", $dataVisit, "kpiVisitId=$kpiVisitId");

	// 	$res['success'] = true;
	// 	$res['message'] = "แก้ไขข้อมูลหน่วยงานสำเร็จ!";
	// 	echo json_encode($res);
	// }
}