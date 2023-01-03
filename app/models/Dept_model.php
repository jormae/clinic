<?php 

class Dept_model{ //tbl_kpidept

	private $db;
	// private $dataDept;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getAllDepartmentsInfo()
	{
		$this->db->query('SELECT * FROM tbl_kpidept ORDER BY kpiDeptName');
		return $this->db->fetch_rows();
	}

	public function getDeptsInfoByDeptId($deptId)
	{
		$this->db->query('SELECT * FROM tbl_dept WHERE deptId = :deptId');
		$this->db->bind('deptId', $deptId);
		return $this->db->fetch_row();
	}

	public function getDeptIdInfoByTransactionId($transactionId)
	{
		$this->db->query('SELECT deptId FROM tbl_transaction WHERE transactionId = :transactionId');
		$this->db->bind('transactionId', $transactionId);
		$result = $this->db->fetch_row();
		return $result['deptId'];
	}

	public function deleteDepartmentInfo($kpiDeptId)
	{
		return $this->db->delete("tbl_kpidept", "kpiDeptId=$kpiDeptId");
	}

	public function departmentPostInfo()
	{
		$kpiDeptName = $_POST['kpiDeptName'];
		$dataPostDept = array('kpiDeptName'=>$kpiDeptName);		
		return $dataPostDept;
	}

	public function insertDepartmentInfo()
	{		
		$post = new Department_model();
		$dataDept = $post->departmentPostInfo();	
		$kpiDeptName 	= $dataDept['kpiDeptName'];

		//Validate Data Existed
		$validate 	= new Validation();		
		$deptValidate= $validate->isDataExisted('kpiDeptName', "tbl_kpidept", "kpiDeptName = '$kpiDeptName'");

		if ($deptValidate == true) {

			$res['success'] = false;
			$res['message'] = "ชื่อหน่วยงานซ้ำ กรุณาลองใหม่อีกครั้ง!";

		}else{

			$res['success'] = true;
			$res['message'] = "เพิ่มข้อมูลหน่วยงานใหม่สำเร็จ!";
			$this->db->insert("tbl_kpidept", $dataDept);
		}

		echo json_encode($res);
		// End of validation

	}

	public function updateDepartmentInfo($kpiDeptId)
	{
		$post = new Department_model();
		$dataDept = $post->departmentPostInfo();
		$this->db->update("tbl_kpidept", $dataDept, "kpiDeptId=$kpiDeptId");

		$res['success'] = true;
		$res['message'] = "แก้ไขข้อมูลหน่วยงานสำเร็จ!";
		echo json_encode($res);
	}
}