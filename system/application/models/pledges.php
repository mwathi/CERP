<?php
class Pledges extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Member_Number', 'int', 10);    
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Telephone', 'varchar', 15);
        $this -> hasColumn('Address', 'varchar', 25);
        $this -> hasColumn('Email', 'varchar', 25);
        $this -> hasColumn('Cause', 'int', 2);
        $this -> hasColumn('Pledge', 'varchar', 25);
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
        $query = Doctrine_Query::create() -> select("Name,Pledge AS Ple") -> from("pledges") -> where("Cause = '$id'");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }
    
    public function getTotalContribootions($id) {
        $query = Doctrine_Query::create() -> select("SUM(Pledge) AS Total") -> from("pledges") -> where("Cause = '$id'");
        $pledgeData = $query -> execute();
        return $pledgeData;
    }

}
?>