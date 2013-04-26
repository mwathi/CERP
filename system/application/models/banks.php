<?php
class Banks extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 40);
	}

	public function setUp() {
		$this -> setTableName('banks');
		$this -> hasOne('Church_Particulars', array('local' => 'id', 'foreign' => 'Bank'));
		$this -> hasOne('Partakings', array('local' => 'id', 'foreign' => 'Bank_Account'));
		$this -> hasOne('Employee', array('local' => 'id', 'foreign' => 'Bank'));
		$this -> hasOne('Cheque_Contributions', array('local' => 'id', 'foreign' => 'Bank'));
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("banks");
		$banksData = $query -> execute();
		return $banksData;
	}//end getall

}
?>