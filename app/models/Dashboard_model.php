<?php 

class Dashboard_model{

	private $db;
	// private $dataDept;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function getTransactionsInfoByStockId($stockId)
	{
		$this->db->query('	SELECT *
							FROM tbl_transaction t
							LEFT JOIN tbl_transactiontype tt ON t.transactionTypeId = tt.transactionTypeId
							LEFT JOIN bachohos_portal.tbl_department d ON t.deptId = d.deptId
							WHERE stockId = :stockId 
							AND t.transactionTypeId IN (2,3)
							AND transactionStatusId = 2
							ORDER BY transactionDateTime DESC
							LIMIT 10');
		$this->db->bind('stockId', $stockId);
		return $this->db->fetch_rows();
	}

	public function getTransactionInfoByTransactionId($transactionId)
	{
		$this->db->query('	SELECT *
							FROM tbl_transaction t
							LEFT JOIN bachohos_portal.tbl_department d ON t.deptId	= d.deptId
							WHERE transactionId = :transactionId');
		$this->db->bind('transactionId', $transactionId);
		return $this->db->fetch_row();
	}

	public function getAllTransactionItemsInfoByTransactionId($transactionId)
	{
		$this->db->query('	SELECT *
							FROM tbl_transactionitem t
							LEFT JOIN tbl_item i ON t.itemCode = i.itemCode
							WHERE transactionId = :transactionId');
		$this->db->bind('transactionId', $transactionId);
		return $this->db->fetch_rows();
	}

}
