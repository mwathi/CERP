<?php
class Benefits extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Rate', 'varchar', 15);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('benefits');        
        $this -> hasOne('Job_Groups', array('local' => 'id', 'foreign' => 'Benefit'));
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