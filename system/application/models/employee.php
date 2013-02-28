<?php
class Employee extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Employee_Number', 'int', 15);
        $this -> hasColumn('Employment_Status', 'varchar', 15);
        $this -> hasColumn('Marital_Status', 'varchar', 9);
        $this -> hasColumn('NSSF_Number', 'varchar', 25);
        $this -> hasColumn('KRA_PIN', 'varchar', 25);
        $this -> hasColumn('Mailing_Address', 'varchar', 2);
        $this -> hasColumn('Religion', 'varchar', 25);

        $this -> hasColumn('Technical_Qualifications', 'varchar', 250);
        $this -> hasColumn('Number_of_Children', 'int', 2);
        $this -> hasColumn('Spouse', 'varchar', 40);
        $this -> hasColumn('Bank_Name', 'varchar', 40);
        $this -> hasColumn('Account_Number', 'varchar', 25);
        $this -> hasColumn('Schools_Attended', 'varchar', 250);
        $this -> hasColumn('Contact_Telephone', 'varchar', 20);
        $this -> hasColumn('Contact_Person', 'varchar', 40);
        $this -> hasColumn('Post', 'varchar', 2);
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Phone', 'varchar', 20);
        $this -> hasColumn('Gender', 'varchar', 6);
        $this -> hasColumn('Date_of_Birth', 'varchar', 15);
        $this -> hasColumn('Address', 'varchar', 25);

        $this -> hasColumn('NHIF_Number', 'varchar', 25);
        $this -> hasColumn('Job_Group', 'varchar', 15);
        $this -> hasColumn('Pension_Fund_Number', 'varchar', 25);
        $this -> hasColumn('Academic_Qualifications', 'varchar', 200);
        $this -> hasColumn('Bank_Branch', 'varchar', 40);

        $this -> hasColumn('Date_Created', 'timestamp');

    }

    public function setUp() {
        $this -> setTableName('employee');
        $this -> hasOne('Posts', array('local' => 'Post', 'foreign' => 'id'));
        $this -> hasOne('Job_Groups', array('local' => 'Job_Group', 'foreign' => 'Job_Group'));
        $this -> hasOne('Qualifications', array('local' => 'Technical_Qualifications', 'foreign' => 'id'));
        $this -> hasOne('Payroll', array('local' => 'Employee_Number', 'foreign' => 'Employee_Number'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("employee") -> where("Name != '' ");
        $employeeData = $query -> execute();
        return $employeeData;
    }//end getall

    public function getEmployee($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("employee") -> where("id = '$id'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

    public function getNumberOfEmployees() {
        $query = Doctrine_Query::create() -> select("COUNT(DISTINCT(Employee_Number)) AS Employees") -> from("employee") -> where("Employee_Number != '10000'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

    public function getEmployeeInformation($name) {
        $query = Doctrine_Query::create() -> select("*") -> from("employee") -> where("Name LIKE '%$name%'");
        $employeeData = $query -> execute();
        return $employeeData;
    }

}
?>