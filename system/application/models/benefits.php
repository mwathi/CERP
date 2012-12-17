<?php
class Benefits extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Rate', 'varchar', 15);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('benefits');
        $this -> hasOne('Employee_Benefits', array('local' => 'id', 'foreign' => 'Benefits'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("benefits");
        $benefitData = $query -> execute();
        return $benefitData;
    }//end getall

    public function getBenefit($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("benefits") -> where("id = '$id'");
        $benefitData = $query -> execute();
        return $benefitData;
    }

    public function getBenefitId() {
        $query = Doctrine_Query::create() -> select("id") -> from("benefits");
        $benefitData = $query -> execute();
        return $benefitData;
    }

}
?>