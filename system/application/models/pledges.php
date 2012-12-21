<?php
class Pledges extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Telephone', 'varchar', 15);
        $this -> hasColumn('Address', 'varchar', 25);
        $this -> hasColumn('Email', 'varchar', 25);
        $this -> hasColumn('Cause', 'int', 2);
        $this -> hasColumn('Small_Pledge', 'varchar', 25);
        $this -> hasColumn('Medium_Pledge', 'varchar', 25);
        $this -> hasColumn('Great_Pledge', 'varchar', 25);
        $this -> hasColumn('Major_Pledge', 'varchar', 25);
        $this -> hasColumn('Pledge_Plan', 'varchar', 25);
    }

    public function setUp() {
        $this -> setTableName('pledges');
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("pledges");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }//end getall

    public function getPledge($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("pledges") -> where("id = '$id'");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }

    public function getContribootions($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("pledges") -> where("Cause = '$id'");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }
    
    public function getTotalContribootions($id) {
        $query = Doctrine_Query::create() -> select("SUM(Small_Pledge + Medium_Pledge + Great_Pledge + Major_Pledge) AS Total") -> from("pledges") -> where("Cause = '$id'");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }

}
?>