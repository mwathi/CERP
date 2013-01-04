<?php
class Banks extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
    }

    public function setUp() {
        $this -> setTableName('banks');
        //$this -> hasOne('Employee_Benefits', array('local' => 'id', 'foreign' => 'Benefits'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("banks");
        $banksData = $query -> execute();
        return $banksData;
    }//end getall
}
?>