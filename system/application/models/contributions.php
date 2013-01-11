<?php
class Contributions extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Member_Number', 'int', 10);
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Telephone', 'varchar', 15);
        $this -> hasColumn('Address', 'varchar', 25);
        $this -> hasColumn('Email', 'varchar', 25);
        $this -> hasColumn('Cause', 'int', 2);
        $this -> hasColumn('Contribution_Made', 'int', 15);
        $this -> hasColumn('Pledge', 'int', 15);
        $this -> hasColumn('Date_of_Contribution', 'date');
    }

    public function setUp() {
        $this -> setTableName('contributions');
        $this -> hasOne('Causes', array('local' => 'Cause', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("contributions");
        $contributionData = $query -> execute();
        return $contributionData;
    }//end getall

    public function getAllContributions($member_number) {
        $query = Doctrine_Query::create() -> select("*") -> from("contributions") -> where("Member_Number = '$member_number'");
        $contributionData = $query -> execute();
        return $contributionData;
    }//end getall

    public function getContribution($id) {
        $query = Doctrine_Query::create() -> select("SUM(Contribution_Made) AS Contribution_Made, Name, Pledge") -> from("contributions") -> where("Cause = '$id' GROUP BY Member_Number");
        $contributionData = $query -> execute();
        return $contributionData;
    }

    public function getContributionPerMember($cause_id,$member_number) {
        $query = Doctrine_Query::create() -> select("SUM(Contribution_Made) AS Total_Contribution_Made") -> from("contributions") -> where("Cause = '$cause_id' AND Member_Number = '$member_number' ");
        $contributionData = $query -> execute();
        return $contributionData;
    }

    public function getContribootions($id) {
        $query = Doctrine_Query::create() -> select("Name,contribution AS Ple") -> from("contributions") -> where("Cause = '$id'");
        $contributionData = $query -> execute();
        return $contributionData;
    }

    public function getTotalContribootions($id) {
        $query = Doctrine_Query::create() -> select("SUM(Contribution_Made) AS Total") -> from("contributions") -> where("Cause = '$id'");
        $contributionData = $query -> execute();
        return $contributionData;
    }

}
?>