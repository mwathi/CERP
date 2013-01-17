<?php
class Sunday extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Youth_Service', 'varchar', 40);
        $this -> hasColumn('Teens', 'varchar', 40);
        $this -> hasColumn('Sunday_School', 'varchar', 40);
        $this -> hasColumn('English_Service', 'varchar', 40);
        $this -> hasColumn('Swahili_Service', 'varchar', 40);
        $this -> hasColumn('Monthly_Pledge', 'varchar', 40);
        $this -> hasColumn('Thanksgiving', 'varchar', 40);
        $this -> hasColumn('Tithe', 'varchar', 40);
        $this -> hasColumn('Date', 'date');        
    }

    public function setUp() {
        $this -> setTableName('sunday');        
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("sunday");
        $sundayData = $query -> execute();
        return $sundayData;
    }//end getall

    public function getSunday($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("sunday") -> where("id = '$id'");
        $sundayData = $query -> execute();
        return $sundayData;
    }

    public function getSundayId() {
        $query = Doctrine_Query::create() -> select("id") -> from("sunday");
        $sundayData = $query -> execute();
        return $sundayData;
    }

}
?>