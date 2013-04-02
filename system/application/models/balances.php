<?php
class Balances extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Supplier', 'int', 10);
        $this -> hasColumn('Balance_Due', 'varchar', 15);
        $this -> hasColumn('Date_Created', 'date');
        $this -> hasColumn('Date_Due', 'date');
        $this -> hasColumn('Transaction_Id', 'varchar', 15);

    }

    public function setUp() {
        $this -> setTableName('balances');
        $this -> hasOne('Suppliers', array('local' => 'Supplier', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("balances") -> where("Transaction_Id > 10000");
        $balancesData = $query -> execute();
        return $balancesData;
    }//end getall

    public function getBalance($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("balances") -> where("id = '$id'");
        $balancesData = $query -> execute();
        return $balancesData;
    }

    public function getBalances() {
        $query = Doctrine_Query::create() -> select("SUM(Balance_Due) AS Bal") -> from("balances") -> where("Balance_Due > 0");
        $balancesData = $query -> execute();
        return $balancesData;
    }

}
?>