<?php
class Causes extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Description', 'varchar', 250);
        $this -> hasColumn('Target', 'int', 15);
        $this -> hasColumn('Date_Created', 'date', 15);
        $this -> hasColumn('Deadline', 'date', 15);
    }

    public function setUp() {
        $this -> setTableName('causes');
        //$this -> hasOne('Employee_causes', array('local' => 'id', 'foreign' => 'causes'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("causes");
        $causeData = $query -> execute();
        return $causeData;
    }//end getall

    public function getCause($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("causes") -> where("id = '$id'");
        $causeData = $query -> execute();
        return $causeData;
    }

    public function getContribootionTarget($id) {
        $query = Doctrine_Query::create() -> select("Target") -> from("causes") -> where("id = '$id'");
        $causeData = $query -> execute();
        return $causeData;
    }

    public function getPledgeInformation($name) {
        $query = Doctrine_Query::create() -> select("*") -> from("causes") -> where("Name LIKE '%$name%' ");
        $flockData = $query -> execute();
        return $flockData;
    }

}
?>