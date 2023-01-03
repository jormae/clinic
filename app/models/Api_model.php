<?php 

class Api_model{ //tbl_kpidept

	private $db;
	// private $dataDept;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllLabOrdersInfoByDate($date)
	{
		$query = '	SELECT *, TIMESTAMPDIFF(YEAR, birth, :date) AS AGE
					FROM visitlabchcyhembmsse l
					LEFT JOIN visit v ON l.visitno = v.visitno
					LEFT JOIN person p ON v.pid = p.pid
					LEFT JOIN _tmpprename_code c ON p.prename = c.prenamecode
					LEFT JOIN cright r ON v.rightcode = r.rightcode
					WHERE visitdate = :date
					GROUP BY l.visitno';
		$this->db->query($query);
		$this->db->bind('date', $date);
		$result = $this->db->fetch_rows();
		echo json_encode($result);
	}

	public function getAllDiagnosesInfoByVisitNo($visitno)
	{
		$query = "	SELECT '' AS id, diagcode, diseasename, dxtype, dxtypedesc, doctordiag
					FROM visitdiag vd
					LEFT JOIN cdisease cd ON cd.diseasecode = vd.diagcode
					LEFT JOIN cdxtype dt ON vd.dxtype = dt.dxtypecode
					WHERE visitno = :visitno
					ORDER BY dxtype ASC";
		$this->db->query($query);
		$this->db->bind('visitno', $visitno);
		return $this->db->fetch_rows();
		// $result = $this->db->fetch_rows();
		// echo json_encode($result);
	}
}