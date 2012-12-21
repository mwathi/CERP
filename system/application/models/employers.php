<?php

class Employers extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Employer_Name', 'varchar', 40);
        $this -> hasColumn('Company', 'varchar', 100);
    }

    public function setUp() {
        $this -> setTableName('employers');
        $this -> hasOne('employer', array('local' => 'id', 'foreign' => 'Employer'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("employers");
        $employerData = $query -> execute();
        return $employerData;
    }//end getall

    public function getEmployer($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("employers") -> where("id = '$id'");
        $employerData = $query -> execute();
        return $employerData;
    }

    public function getCompanyName($term) {
        $query = Doctrine_Query::create() -> select("Company") -> from("employers") -> where("Company LIKE '%$term%' ");
        $employerData = $query -> execute();
        return $employerData;
    }

}
?>