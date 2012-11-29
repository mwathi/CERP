<?php
class Employee extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Date_of_Birth', 'varchar', 15);
        $this -> hasColumn('Phone', 'varchar', 20);
        $this -> hasColumn('Gender', 'varchar', 6);       
        $this -> hasColumn('Address', 'varchar', 25);
        $this -> hasColumn('Benefits', 'varchar', 2);
        $this -> hasColumn('Post', 'varchar', 2);
        $this -> hasColumn('Date_Created', 'timestamp');
    }

    public function setUp() {
        $this -> setTableName('employee');
        //$this -> hasOne('Groups', array('local' => 'Member_Group', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("employee");
        $employeeData = $query -> execute();
        return $employeeData;
    }//end getall

    public function getEmployee($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("employee") -> where("id = '$id'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

}
?>