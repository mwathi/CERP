<?php
class Partakings extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Bank_Account', 'int', 15);
		$this -> hasColumn('Transaction_Value', 'int', 15);
		$this -> hasColumn('Date', 'date');
	}

	public function setUp() {
		$this -> setTableName('partakings');
		$this -> hasOne('Banks', array('local' => 'Bank_Account', 'foreign' => 'id'));
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("partakings") -> orderBy("id DESC") -> limit('1');
		$partakingsData = $query -> execute();
		return $partakingsData;
	}//end getall

	public function getAccountBalancePerAccount($limit) {
		$query = Doctrine_Query::create() -> select("*") -> from("partakings")-> orderBy("id DESC") -> limit(" '$limit' ");
		$partakingsData = $query -> execute();
		return $partakingsData;
	}//end getall
	
	public function getAccounts() {
		$query = Doctrine_Query::create() -> select("COUNT(DISTINCT(Bank_Account)) AS Bank_Accounts") -> from("partakings");
		$partakingsData = $query -> execute();
		return $partakingsData;
	}//end getall
	
	public function getAccounts_() {
		$query = Doctrine_Query::create() -> select("COUNT(DISTINCT(Bank_Account)) AS Bank_Accounts") -> from("partakings");
		$partakingsData = $query -> execute();
		return $partakingsData[0] -> Bank_Accounts;
	}//end getall
	

}
?>