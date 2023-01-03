<?php 

class Dashboard extends Controller {
	
	 public function index()
	 {
	 	// echo "HELLO";
	 	$session 	= new Session();
	 	$session->checkLogin();
	 	// print_r($_SESSION);
	 	$username 	= $_SESSION['username'];

 		// $api 				= new Api();
 	 // 	$data['userInfo'] 	= $api->getAllProfileInfoByCid($username);
 	 // 	$deptId 			= $data['userInfo']['deptId'];

	 	// $auth 				= new Validation();
	 	// $isUserAuthorized 	= $auth->isAuthorized($username, $stockId);

	 	// if (!$isUserAuthorized) {
	 	// 	header("Location: ".BASEURL."/auth/err/".$stockId);
	 	// 	exit();

	 	// }

	 	// $thDate = new ThaiDate();
	 	// $today  = $thDate->thaiFullDate(date('Y-m-d'));

	 	$data['pageTitle'] = 'Dashboard :: หน้าหลัก';

	 	// $data['stockInfo'] 			= $this->model('Stock_model')->getStocksInfoByStockId($stockId);
	 	// $data['stockRecordsInfo'] 	= $this->model('Stock_model')->getAllStockRecordsInfoByStockId($stockId); 
	
	 	$this->view('templates/header');
	 	// $this->view('templates/navbar', $data);
		$this->view('dashboard/index', $data);
	 	// $this->view('templates/footer');
	 }

	 public function modal($transactionId)
	 {

	 	$data['transactionItemsInfo'] 	= $this->model('Dashboard_model')->getAllTransactionItemsInfoByTransactionId($transactionId);
	 	$data['transactionInfo'] 		= $this->model('Dashboard_model')->getTransactionInfoByTransactionId($transactionId);
	 	echo json_encode($data);

	 }

}