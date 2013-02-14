<?php
class Accounts extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Type', 'varchar', 25);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('accounts');     
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("accounts") -> orderBy("Type ASC");
        $accountData = $query -> execute();
        return $accountData;
    }//end getall

    public function getAccount($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("accounts") -> where("id = '$id'");
        $accountData = $query -> execute();
        return $accountData;
    }
}
?>