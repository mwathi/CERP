<?php
class Qualifications extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);       
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('qualifications');
        //$this -> hasOne('Employee_Benefits', array('local' => 'id', 'foreign' => 'Benefits'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("qualifications");
        $benefitData = $query -> execute();
        return $benefitData;
    }//end getall

    public function getBenefit($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("qualifications") -> where("id = '$id'");
        $benefitData = $query -> execute();
        return $benefitData;
    }

}
?>