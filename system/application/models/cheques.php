<?php
class Cheques extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Bank', 'int', 15);
        $this -> hasColumn('Cheque_Number', 'varchar', 45);
        $this -> hasColumn('Drawer', 'varchar', 80);
        $this -> hasColumn('Issued_To', 'varchar', 40);
        $this -> hasColumn('Amount', 'int', 15);
    }

    public function setUp() {
        $this -> setTableName('cheques');
        $this -> hasOne('Banks', array('local' => 'Bank', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("cheques");
        $banksData = $query -> execute();
        return $banksData;
    }//end getall
    
    public function getCheque($cheque_id) {
        $query = Doctrine_Query::create() -> select("*") -> from("cheques") -> where("id =  $cheque_id");
        $banksData = $query -> execute();
        return $banksData;
    }//end getall
}
?>