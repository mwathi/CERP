<?php
class Service_Background extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Employee_Number', 'int', 15);
        $this -> hasColumn('Date_From', 'date');
        $this -> hasColumn('Date_To', 'date');
        $this -> hasColumn('Office', 'varchar', 40);
        $this -> hasColumn('Designation', 'varchar', 40);
        $this -> hasColumn('City', 'varchar', 40);
        
    }

    public function setUp() {
        $this -> setTableName('service_background');
        $this -> hasOne('Employee', array('local' => 'Employee_Number', 'foreign' => 'Employee_Number'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("service_background");
        $employeeData = $query -> execute();
        return $employeeData;
    }//end getall

    public function getEmployeeBackground($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("service_background") -> where("id = '$id'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

}
?>