<?php
class Employee_Benefits extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Employee', 'int', 15);
        $this -> hasColumn('Benefit', 'int', 15);        
    }

    public function setUp() {
        $this -> setTableName('employee_benefits');
        $this -> hasOne('Employee', array('local' => 'Employee', 'foreign' => 'id'));
        $this -> hasOne('Benefits', array('local' => 'Benefit', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("employee_benefits");
        $benefitData = $query -> execute();
        return $benefitData;
    }//end getall

    public function getEmployeeBenefit($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("employee_benefits") -> where("Employee = '$id'");
        $benefitData = $query -> execute();
        return $benefitData;
    }

}

?>