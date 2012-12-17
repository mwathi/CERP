<?php
class Employee_Details extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Days_Paid', 'varchar', 15);
        $this -> hasColumn('Sick_Leave', 'varchar', 15);
        $this -> hasColumn('Month', 'varchar', 15);
        $this -> hasColumn('Year', 'varchar', 15);
    }

    public function setUp() {
        $this -> setTableName('paygrade');
        $this -> hasMany('Employee', array('local' => 'id', 'foreign' => 'Salary'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("paygrade");
        $employeeData = $query -> execute();
        return $employeeData;
    }//end getall

    public function getEmployee($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("paygrade") -> where("id = '$id'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

}
?>