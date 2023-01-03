<?php 

class Reports extends Controller {
	
	 public function index($stockId)
	 {
	 	$session = new Session();
	 	$session->checkLogin();
	 	$session->isAuthorizedToView();
	 	$data['session'] 	= ['username'=>$_SESSION['username'], 'fullname'=>$_SESSION['fullname'],'bhip'=>$_SESSION['bhip']];

	 	$date = date('Y-m');
	 	$data['pageTitle'] = 'รายงานตัวชีวัด';
	
	 	$this->view('templates/header', $data);
	 	$this->view('templates/sidebar');
	 	$this->view('templates/navbar');
	 	$this->view('report/index', $data);
	 	$this->view('templates/footer');
	 }

	 public function month($stockId, $reportId = null, $date = null)
	 {
	 	$session = new Session();
	 	$session->checkLogin();
	 	// $session->isAuthorizedToView();

	 	$thFormat = new thaiDate();
	 	$thaiTime = $thFormat->thaiTimeZone();

	 	if ($date == "") {

	 		$strReportId 	  = "01";
	 		$date 			  = date('Y-m');
	 		$strYear 		  = substr($date, 0, 4);
	 		$strMonth 		  = substr($date, -2, 4);
	 		$preMonth 		  = date('m') - 1;
	 		$preMonthFormat   = str_pad($preMonth, 2, '0', STR_PAD_LEFT);
	 		$preYearMonth 	  = substr($date, 0, 5) .$preMonthFormat;
	 		$currentYearMonth = substr($date, 0, 7); // Yes
	 		$selectedYearMonth= $date;

	 	}
	 	else{

	 		$strReportId 	  = $reportId;
	 		$strYear 		  = substr($date, 0, 4);
	 		$strMonth 		  = substr($date, -2, 4);
	 		$preMonth 		  = (int)$strMonth - 1;
	 		$preMonthFormat   = str_pad($preMonth, 2, '0', STR_PAD_LEFT);
	 		$preYearMonth 	  = substr($date, 0, 5) .$preMonthFormat;
	 		$currentYearMonth = substr($date, 0, 7); // eg 2020-03
	 		$selectedYearMonth= $currentYearMonth;
	 	}

	 	$data['reportId']		= $strReportId;
	 	$data['year']			= $strYear;
	 	$data['month']			= $strMonth;	 	
	 	$data['thMonth'] 		= $thFormat->thaiMonthYear($currentYearMonth);
	 	$data['currentYearMonth'] = $selectedYearMonth; // Yes

	 	$data['pageTitle'] 	 	= 'รายงานการคีย์ข้อมูลผลงานตัวชี้วัด ประจำเดือน';
	 	$data['stockInfo'] 	 	= $this->model('Stock_model')->getStocksInfoByStockId($stockId);
	 	$data['sumInfo'] 		= $this->model('Report_model')->processingMonthlyReportSummary($stockId, $selectedYearMonth);
	 	$data['purchaseInfo']  	= $this->model('Report_model')->getMonthlyPurchaseItemsByStockIdAndDate($stockId, $selectedYearMonth);
	 	$data['clinicDispenseInfo'] = $this->model('Report_model')->getMonthlyClinicSUMDispenseByStockIdAndDate($stockId, $selectedYearMonth);

	 	$this->view('templates/header', $data);
	 	$this->view('templates/sidebar', $data);
	 	$this->view('templates/navbar', $data);

	 	if (!empty($reportId)) {

	 		if ($reportId == "01") {
	 			$data['reportInfo'] = NULL;
	 			$this->view('report/month', $data);
	 		}
	 		elseif ($reportId == "02") {
	 		
	 			$data['transactionItemsInfo']  	= $this->model('Report_model')->getMonthlyTransactionItemsInfoByStockIdAndDate($stockId, $selectedYearMonth);
	 			$this->view('report/month02', $data);
	 		}
	 		elseif ($reportId == "03") {
	 		
	 			$data['reportInfo']  	= $this->model('Report_model')->getMonthlyDispenseByStockIdAndDate($stockId, $selectedYearMonth);
	 			$this->view('report/month03', $data);
	 		}

	 	}
	 	
	 	else{
	 		$this->view('report/month', $data);
	 	}
	 	
	 	$this->view('templates/footer');
	 }

	 public function year($kpiYear)
	 {
	 	$session = new Session();
	 	$session->checkLogin();
	 	// $session->isAuthorizedToView();
	 	$year = $kpiYear + 543;
	 	
	 	$staffInfo = $this->model('Staff_model')->getAllStaffsInfoByStaffCid($_SESSION['username']);
	 	$data['session'] 		= ['username'=>$_SESSION['username'], 'fullname'=>$_SESSION['fullname'],'bhip'=>$_SESSION['bhip']];
	 	$data['pageTitle'] 		= 'รายงานการคีย์ข้อมูลผลงานตัวชี้วัด ประจำปีงบประมาณ '. $year;
	 	// $data['reportAnnaul']	= $this->model('Report_model')->getAnnaulKpiDeptReportInfoByYear($kpiYear, $staffInfo['kpiDeptId']);
	 	$data['reportAnnaul']	= NULL;
	
	 	$this->view('templates/header', $data);
	 	$this->view('templates/sidebar');
	 	$this->view('templates/navbar');
	 	$this->view('report/year', $data);
	 	$this->view('templates/footer');
	 }

}