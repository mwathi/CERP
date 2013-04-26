<?php
class Church_Particulars extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Account_Name', 'varchar', 100);
		$this -> hasColumn('Bank', 'int', 10);
		$this -> hasColumn('Account_Number', 'varchar', 40);
		$this -> hasColumn('Balance', 'int', 40);
		$this -> hasColumn('Opening_Balance_Date', 'date');

	}

	public function setUp() {
		$this -> setTableName('church_particulars');
		$this -> hasOne('Banks', array('local' => 'Bank', 'foreign' => 'id'));
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("church_particulars");
		$churchParticularsData = $query -> execute();
		return $churchParticularsData;
	}//end getall

	public function getChurch($id) {
		$query = Doctrine_Query::create() -> select("*") -> from("church_particulars") -> where("id = '$id'");
		$churchParticularsData = $query -> execute();
		return $churchParticularsData;
	}

	public function getEquity() {
		$query = Doctrine_Query::create() -> select("SUM(Balance) AS Opening_Balance") -> from("church_particulars");
		$churchParticularsData = $query -> execute();
		return $churchParticularsData;
	}

	public function getOpeningBalance($registered_banks) {
		$query = Doctrine_Query::create() -> select("Balance") -> from("church_particulars") -> where("Account_Name LIKE '%$registered_banks%' ");
		$churchParticularsData = $query -> execute();
		return $churchParticularsData;
	}

	public static function getTotalNumberBanks() {
		$query = Doctrine_Query::create() -> select("COUNT(*) as Total_Banks") -> from("church_particulars");
		$count = $query -> execute();
		return $count[0] -> Total_Banks;
	}

}
?>