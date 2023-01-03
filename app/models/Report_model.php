<?php 

class Report_model{

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	// public function getMonthlyPrevBalanceByStockIdAndDate($stockId, $date)
	// {	

	// 	$prevMonth1 = strtotime($date.' -2 month');
	// 	$prevMonth2 = strtotime($date.' -1 month');
	// 	$preDate1 	= date('Y-m', $prevMonth1).'-26';
	// 	$preDate2 	= date('Y-m', $prevMonth2).'-25';

	// 	$prevMonth 		= strtotime($date.' -1 month');
	// 	$startDate 		= date('Y-m', $prevMonth).'-26';
	// 	$endDate 		= $date.'-25';
	// 	$query = 'SELECT 
	// 				(SELECT  SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN :preDate1 AND :preDate2)	AS PREV_BALANCE,
	// 				(SELECT  SUM(totalPrice) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND t.transactionTypeId IN (1) 
	// 				AND approveDate BETWEEN :preDate1 AND :preDate2) AS PREV_TOTAL_PURCHASE,
	// 				(SELECT SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 
	// 				WHERE t.transactionTypeId IN (2,3) 
	// 				AND t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN  :preDate1 AND :preDate2) AS PREV_TOTAL_DISPENSE,
	// 				(SELECT  SUM(totalPrice) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND t.transactionTypeId IN (1) 
	// 				AND approveDate BETWEEN :startDate AND :endDate) AS TOTAL_PURCHASE,
	// 				(SELECT SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 
	// 				WHERE t.transactionTypeId IN (2,3) 
	// 				AND t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN  :startDate AND :endDate) AS TOTAL_DISPENSE
	// 			FROM tbl_stock s 
	// 			WHERE stockId = :stockId';
	// 	$this->db->query($query);
	// 	$this->db->bind('stockId', $stockId);
	// 	$this->db->bind('preDate1', $preDate1);
	// 	$this->db->bind('preDate2', $preDate2);
	// 	$this->db->bind('startDate', $startDate);
	// 	$this->db->bind('endDate', $endDate);

	// 	$row = $this->db->fetch_row();
	// 	$info['prev_balance'] 	= $row['PREV_BALANCE'];
	// 	$info['prev_total_purchase'] 	= $row['PREV_TOTAL_PURCHASE'];
	// 	$info['prev_total_dispense'] 	= $row['PREV_TOTAL_DISPENSE'];
	// 	$info['prev_balance'] 	= $row['PREV_TOTAL_DISPENSE'];
	// 	$info['total_purchase'] = $row['TOTAL_PURCHASE'];
	// 	$info['total_dispense'] = $row['TOTAL_DISPENSE'];
	// 	$info['remain_balance'] = ($info['prev_balance'] + $info['prev_total_purchase']) - $info['prev_total_dispense'];
	// 	return $info;
	// }

	// public function getMonthlyCurBalanceByStockIdAndDate($stockId, $date)
	// {	

	// 	$prevMonth1 = strtotime($date.' -2 month');
	// 	$prevMonth2 = strtotime($date.' -1 month');
	// 	$preDate1 	= date('Y-m', $prevMonth1).'-26';
	// 	$preDate2 	= date('Y-m', $prevMonth2).'-25';

	// 	$prevMonth 		= strtotime($date.' -1 month');
	// 	$startDate 		= date('Y-m', $prevMonth).'-26';
	// 	$endDate 		= $date.'-25';
	// 	$query = 'SELECT 
	// 				(SELECT  SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN :preDate1 AND :preDate2)	AS PREV_BALANCE,
	// 				(SELECT  SUM(totalPrice) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND t.transactionTypeId IN (1) 
	// 				AND approveDate BETWEEN :preDate1 AND :preDate2) AS PREV_TOTAL_PURCHASE,
	// 				(SELECT SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 
	// 				WHERE t.transactionTypeId IN (2,3) 
	// 				AND t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN  :preDate1 AND :preDate2) AS PREV_TOTAL_DISPENSE,
	// 				(SELECT  SUM(totalPrice) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
	// 				WHERE t.stockId = s.stockId 
	// 				AND t.transactionTypeId IN (1) 
	// 				AND approveDate BETWEEN :startDate AND :endDate) AS TOTAL_PURCHASE,
	// 				(SELECT SUBSTRING(SUM(totalPrice),2) 
	// 				FROM tbl_transaction t 
	// 				LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 
	// 				WHERE t.transactionTypeId IN (2,3) 
	// 				AND t.stockId = s.stockId 
	// 				AND deliveryDateTime BETWEEN  :startDate AND :endDate) AS TOTAL_DISPENSE
	// 			FROM tbl_stock s 
	// 			WHERE stockId = :stockId';
	// 	$this->db->query($query);
	// 	$this->db->bind('stockId', $stockId);
	// 	$this->db->bind('preDate1', $preDate1);
	// 	$this->db->bind('preDate2', $preDate2);
	// 	$this->db->bind('startDate', $startDate);
	// 	$this->db->bind('endDate', $endDate);

	// 	$row = $this->db->fetch_row();
	// 	$info['total_purchase'] = $row['TOTAL_PURCHASE'];
	// 	$info['total_dispense'] = $row['TOTAL_DISPENSE'];
	// 	return $info;
	// }

	// public function getMonthlyTransactionRecordByStockIdAndDateBK($stockId, $date)
	// {

	// 	$query = 'SELECT ti.transactionId, i.itemCode, itemSerialNo, itemName,priceIncVat, 
	// 				(SELECT SUM(stockQuantity) FROM tbl_transactionitem s WHERE s.transactionId = ti.transactionId AND s.itemSerialNo = ti.itemSerialNo AND s.stockId = :stockId AND ti.transactionTypeId = 1 AND ts.transactionDateTime LIKE :date) AS DEPOSIT_QUANTITY,
	// 				(SELECT SUM(totalPrice) FROM tbl_transactionitem s WHERE s.transactionId = ti.transactionId AND s.itemSerialNo = ti.itemSerialNo AND s.stockId = :stockId AND ti.transactionTypeId = 1 AND ts.transactionDateTime LIKE :date) AS DEPOSIT_TOTALPRICE,
	// 				(SELECT SUBSTRING(SUM(stockQuantity),2) FROM tbl_transactionitem s WHERE s.transactionId = ti.transactionId AND s.itemSerialNo = ti.itemSerialNo AND s.stockId = :stockId AND ti.transactionTypeId IN (2,3) AND ts.transactionDateTime LIKE :date) AS WITHDRAW_QUANTITY,
	// 				(SELECT SUBSTRING(SUM(totalPrice),2) FROM tbl_transactionitem s WHERE s.transactionId = ti.transactionId AND s.itemSerialNo = ti.itemSerialNo AND s.stockId = :stockId AND ti.transactionTypeId IN (2,3) AND ts.transactionDateTime LIKE :date) AS WITHDRAW_TOTALPRICE
	// 				FROM tbl_transactionitem ti
	// 				LEFT JOIN tbl_transaction ts ON ti.transactionId = ts.transactionId
	// 				LEFT JOIN tbl_item i ON ti.itemCode = i.itemCode
	// 				WHERE ti.transactionId IN (
	// 						SELECT transactionId FROM tbl_transaction WHERE stockId = 3 AND (approveDate LIKE :date OR approveDateTime LIKE :date )
	// 				)
	// 				GROUP BY itemSerialNo
	// 				ORDER BY itemName, itemSerialNo';
	// 	$this->db->query($query);
	// 	$this->db->bind('stockId', $stockId);
	// 	$this->db->bind('date', "$date%");
	// 	return $this->db->fetch_rows();
	// }

	// public function getMonthlyItemCodesByStockIdAndDate($stockId, $date)
	// {

	// 	$query = '	SELECT ti.itemCode
	// 				FROM tbl_transactionitem ti
	// 				LEFT JOIN tbl_transaction ts ON ti.transactionId = ts.transactionId
	// 				WHERE ti.transactionId IN (
	// 					SELECT transactionId FROM tbl_transaction WHERE stockId = :stockId AND (approveDate LIKE :date OR approveDateTime LIKE :date )
	// 				)
	// 				GROUP BY itemCode
	// 				ORDER BY itemSerialNo';
	// 	$this->db->query($query);
	// 	$this->db->bind('stockId', $stockId);
	// 	$this->db->bind('date', "$date%");
	// 	return $this->db->fetch_rows();
	// }


	public function getMonthlyTotalReplaceItemByStockIdAndDate($stockId, $date)
	{	
		$query = 'SELECT SUM(totalPrice) AS TOTAL_REPLACE_ITEM
					FROM tbl_inventoryrecord
					WHERE transactionTypeId = 1 
					AND stockId = :stockId
					AND datetime LIKE :date';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('date', "$date%");
		$row = $this->db->fetch_row();
		return $row['TOTAL_REPLACE_ITEM'];
	}

	public function getMonthlyClinicSUMDispenseByStockIdAndDate($stockId, $date) //รพสต.
	{
		$prevMonth 		= strtotime($date.' -1 month');
		$startDate 		= date('Y-m', $prevMonth).'-26';
		$endDate 		= $date.'-25';
		$query = 'SELECT t.transactionId, transactionDateTime, 
					(SELECT deptName FROM bachohos_portal.tbl_department d WHERE d.deptId = t.deptId) AS DEPT_NAME, SUBSTR(SUM(totalPrice),2) AS TOTAL_PRICE
					FROM tbl_transaction t
					LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId
					WHERE t.stockId = :stockId
					AND t.deptId BETWEEN 48 AND 54
					AND deliveryDateTime BETWEEN :startDate AND :endDate
					GROUP BY t.deptId';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('startDate', $startDate);
		$this->db->bind('endDate', $endDate);
		return $this->db->fetch_rows();
	}

	public function getMonthlyDispenseByStockIdAndDate($stockId, $date) //หน่วยงานทั้งหมด.
	{
		$prevMonth 		= strtotime($date.' -1 month');
		$startDate 		= date('Y-m', $prevMonth).'-26';
		$endDate 		= $date.'-25';
		$query = 'SELECT t.transactionId, transactionDateTime, approveDateTime,
					(SELECT deptName FROM bachohos_portal.tbl_department d WHERE d.deptId = t.deptId) AS DEPT_NAME, SUBSTR(SUM(totalPrice),2) AS TOTAL_PRICE
					FROM tbl_transaction t
					LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId
					WHERE t.stockId = :stockId
					-- AND t.deptId BETWEEN 48 AND 54
					AND deliveryDateTime BETWEEN :startDate AND :endDate
					GROUP BY t.transactionId
					ORDER By DEPT_NAME';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('startDate', $startDate);
		$this->db->bind('endDate', $endDate);
		return $this->db->fetch_rows();
	}

	public function getMonthlyPurchaseItemsByStockIdAndDate($stockId, $date)
	{
		$prevMonth 		= strtotime($date.' -1 month');
		$startDate 		= date('Y-m', $prevMonth).'-26';
		$endDate 		= $date.'-25';
		$query = '	SELECT companyName, SUM(totalPrice) AS totalPrice, billNo, approveRef, approveDate, dispenseRef, dispenseDate
					FROM tbl_transaction t
					LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId
					LEFT JOIN tbl_company c ON i.companyId = c.companyId
					WHERE t.transactionTypeId = 1
					AND i.stockId = :stockId
					AND approveDate BETWEEN :startDate AND :endDate
					GROUP BY billNo';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('startDate', $startDate);
		$this->db->bind('endDate', $endDate);
		return $this->db->fetch_rows();
	}

	public function getMonthlyTransactionItemsInfoByStockIdAndDate($stockId, $date)
	{
		$prevMonth 		= strtotime($date.' -1 month');
		$startDate 		= date('Y-m', $prevMonth).'-26'; //2019-09-26
		$endDate 		= $date.'-25'; //2019-10-25
		$query = 'SELECT i.itemCode, itemName, itemSerialNo, SUM(stockQuantity) AS STOCK_QUANTITY_DISPENSE, "" AS STOCK_QUANTITY_PURCHASE, priceIncVat, SUM(totalPrice) AS TOTAL_PRICE_DISPENSE, "" AS TOTAL_PRICE_PURCHASE
					FROM tbl_transactionitem ti
					LEFT JOIN tbl_transaction t ON t.transactionId = ti.transactionId
					LEFT JOIN tbl_item i ON ti.itemCode = i.itemCode
					WHERE i.itemCode IN (
						SELECT itemCode
						FROM tbl_transactionitem ti
						LEFT JOIN tbl_transaction ts ON ti.transactionId = ts.transactionId
						WHERE ts.stockId = :stockId
						AND (approveDateTime BETWEEN :startDate AND :endDate)
						GROUP BY itemCode)
					AND (approveDateTime BETWEEN :startDate AND :endDate)
					GROUP BY priceIncVat

				UNION ALL
					SELECT i.itemCode, itemName, itemSerialNo, "" AS STOCK_QUANTITY_DISPENSE, SUM(stockQuantity) AS STOCK_QUANTITY_PURCHASE, priceIncVat, "" AS TOTAL_PRICE_DISPENSE, SUM(totalPrice) AS TOTAL_PRICE_PURCHASE
					FROM tbl_transactionitem ti
					LEFT JOIN tbl_transaction t ON t.transactionId = ti.transactionId
					LEFT JOIN tbl_item i ON ti.itemCode = i.itemCode
					WHERE i.itemCode IN (
						SELECT itemCode
						FROM tbl_transactionitem ti
						LEFT JOIN tbl_transaction ts ON ti.transactionId = ts.transactionId
						WHERE ts.stockId = :stockId 
						AND (stockDateTime BETWEEN :startDate AND :endDate)
						GROUP BY itemCode)
					AND (stockDateTime BETWEEN :startDate AND :endDate)
					GROUP BY priceIncVat
					ORDER BY itemName, itemSerialNo';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('startDate', $startDate);
		$this->db->bind('endDate', $endDate);
		return $this->db->fetch_rows();
	}

	public function getMonthlyItemSerialNoByStockIdAndDate($stockId, $date, $itemCode)
	{
		$prevMonth 		= strtotime($date.' -1 month');
		$startDate 		= date('Y-m', $prevMonth).'-26';
		$endDate 		= $date.'-25';
		$query = '	SELECT itemSerialNo, itemName, priceIncVat,
					(SELECT SUBSTRING( SUM( stockQuantity ), 2 )  FROM tbl_transactionitem s  LEFT JOIN tbl_transaction t ON s.transactionId = t.transactionId WHERE s.itemCode = ti.itemCode AND s.stockId = :stockId  AND t.transactionTypeId = 1  AND t.deliveryDateTime LIKE :date) AS DEPOSIT_QUANTITY,
										(SELECT SUBSTRING( SUM( totalPrice ), 2 )  FROM tbl_transactionitem s  LEFT JOIN tbl_transaction t ON s.transactionId = t.transactionId WHERE s.itemCode = ti.itemCode AND s.stockId = :stockId  AND t.transactionTypeId = 1  AND t.deliveryDateTime LIKE :date) AS DEPOSIT_TOTALPRICE,
										(SELECT SUBSTRING( SUM( stockQuantity ), 2 )  FROM tbl_transactionitem s  LEFT JOIN tbl_transaction t ON s.transactionId = t.transactionId WHERE s.itemCode = ti.itemCode AND s.stockId = :stockId  AND t.transactionTypeId IN ( 2, 3 )  AND t.deliveryDateTime LIKE :date) AS WITHDRAW_QUANTITY,
										(SELECT SUBSTRING( SUM( totalPrice ), 2 )  FROM tbl_transactionitem s  LEFT JOIN tbl_transaction t ON s.transactionId = t.transactionId WHERE s.itemCode = ti.itemCode AND s.stockId = :stockId  AND t.transactionTypeId IN ( 2, 3 )  AND t.deliveryDateTime LIKE :date) AS WITHDRAW_TOTALPRICE
					FROM tbl_transactionitem ti
					LEFT JOIN tbl_transaction ts ON ti.transactionId = ts.transactionId
					LEFT JOIN tbl_item i ON ti.itemCode = i.itemCode
					WHERE i.itemCode = :itemCode
					AND ts.stockId = :stockId AND (approveDate LIKE :date OR approveDateTime LIKE :date )
					GROUP BY priceIncVat';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('itemCode', $itemCode);
		$this->db->bind('date', "$date%");
		return $this->db->fetch_rows();
	}

	public function getMonthlySumInfoByStockIdAndDate($stockId, $date)
	{	

		$prevMonth 		= strtotime($date.' -1 month');
		$startMonth 	= date('Y-m', $prevMonth);
		$startDate 		= date('Y-m', $prevMonth).'-26';
		$endDate 		= $date.'-25';
		$query = 'SELECT  
					(SELECT isVerified FROM tbl_report_summary r					
					WHERE r.stockId = s.stockId 
					AND reportYearMonth = :startMonth) AS isVerified,
					(SELECT  totalBalance 
					FROM tbl_report_summary r					
					WHERE r.stockId = s.stockId 
					AND reportYearMonth = :startMonth) AS preTotalBalance,
					(SELECT  remainBalance 
					FROM tbl_report_summary r					
					WHERE r.stockId = s.stockId 
					AND reportYearMonth = :date) AS remainBalance,
					(SELECT  totalBalance 
					FROM tbl_report_summary r					
					WHERE r.stockId = s.stockId 
					AND reportYearMonth = :date) AS totalBalance,
					(SELECT  SUM(totalPrice) 
					FROM tbl_transaction t 
					LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 	
					WHERE t.stockId = s.stockId 
					AND t.transactionTypeId IN (1) 
					AND approveDate BETWEEN :startDate AND :endDate) AS TOTAL_PURCHASE,
					(SELECT SUBSTRING(SUM(totalPrice),2) 
					FROM tbl_transaction t 
					LEFT JOIN tbl_transactionitem i ON i.transactionId = t.transactionId 
					WHERE t.transactionTypeId IN (2,3) 
					AND t.stockId = s.stockId 
					AND deliveryDateTime BETWEEN :startDate AND :endDate) AS TOTAL_DISPENSE
				FROM tbl_stock s 
				WHERE stockId = :stockId';
		$this->db->query($query);
		$this->db->bind('stockId', $stockId);
		$this->db->bind('date', $date);
		$this->db->bind('startMonth', $startMonth);
		$this->db->bind('startDate', $startDate);
		$this->db->bind('endDate', $endDate);

		$row = $this->db->fetch_row();
		$info['startMonth'] 	= $startMonth;
		$info['date'] 			= $date;
		$info['preTotalBalance']= $row['preTotalBalance'];
		$info['remainBalance'] 	= $row['remainBalance'];
		$info['total_purchase'] = $row['TOTAL_PURCHASE'];
		$info['total_dispense'] = $row['TOTAL_DISPENSE'];
		$info['total_balance'] 	= $row['totalBalance'];
		$info['isVerified'] 	= $row['isVerified'];
		return $info;
	}
	public function processingMonthlyReportSummary($stockId, $date)
	{
		$report 		= new Report_model();
		$reportInfo 	= $report->getMonthlySumInfoByStockIdAndDate($stockId, $date);
		$preTotalBalance= $reportInfo['preTotalBalance'];
		$remainBalance 	= $reportInfo['remainBalance'];
		$totalPurchase 	= $reportInfo['total_purchase'];
		$totalDispense 	= $reportInfo['total_dispense'];
		$isVerified 	= $reportInfo['isVerified'];
		// $totalBalance 	= empty($reportInfo['totalBalance']) ? ($preTotalBalance + $totalPurchase) - $totalDispense : $reportInfo['totalBalance'];
		$actualTotalBalance = ($remainBalance + $totalPurchase) - $totalDispense;
		$dbTotalBalance 	=  $reportInfo['totalBalance'];

		$dataReportInfo = array('reportYearMonth'=>$date, 'remainBalance'=>$preTotalBalance, 'totalPurchase'=>$totalPurchase, 'totalDispense'=>$totalDispense, 'totalBalance'=>$actualTotalBalance, 'stockId'=>$stockId);
		if ($isVerified != 1) { // PROCESSING IF RECORDS ARE NOT MANUAL VERIFIED

			if(empty($remainBalance))
			{
				// echo "INSERTED";
				$insertReportInfo = $this->db->insert("tbl_report_summary", $dataReportInfo);
			}
			elseif ($actualTotalBalance != $dbTotalBalance) {
				// echo "UPDATES";
				$updateReportInfo = $this->db->update("tbl_report_summary", $dataReportInfo, "reportYearMonth='$date' AND stockId=$stockId");
			}

		}
		
		
		$sumInfo 	= $report->getMonthlySumInfoByStockIdAndDate($stockId, $date);
		// print_r($reportInfo);
		// print_r($sumInfo);
		return $sumInfo;

	}

	public function getAnnaulKpiDeptReportInfoByYear($kpiYear, $kpiDeptId)
	{

		$year 		= $kpiYear;
		$nextYear 	= $kpiYear + 1;
		$this->db->query("	SELECT kpiName, kpiSymbol, kpiGoal, kpiInput, kpiOutput, 
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2018-10') AS October,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2018-11') AS November,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2018-12') AS December,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-01') AS January,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-02') AS February,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-03') AS March,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-04') AS April,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-05') AS May,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-06') AS June,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-07') AS July,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-08') AS August,
							(SELECT kpiResult FROM tbl_kpiscore s WHERE s.kpiId = k.kpiId AND kpiYearMonth = '2019-09') AS September
							FROM tbl_kpi k
							WHERE  kpiDeptId = :kpiDeptId");
		$this->db->bind('kpiDeptId', $kpiDeptId);
		// $this->db->bind('year', $year);
		// $this->db->bind('nextYear', $nextYear);
		return $this->db->fetch_rows();
	}





}