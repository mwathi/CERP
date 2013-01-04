<?php
class Employee extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Gender', 'varchar', 6);
        $this -> hasColumn('Marital_Status', 'varchar', 9);
        $this -> hasColumn('Employment_Status', 'varchar', 15);
        $this -> hasColumn('Post', 'varchar', 2);
        $this -> hasColumn('Date_of_Birth', 'varchar', 15);
        $this -> hasColumn('NSSF_Number', 'varchar', 25);
        $this -> hasColumn('KRA_PIN', 'varchar', 25);
        $this -> hasColumn('Mailing_Address', 'varchar', 2);
        $this -> hasColumn('Address', 'varchar', 25); 
        $this -> hasColumn('Phone', 'varchar', 20);
        $this -> hasColumn('Religion', 'varchar', 25);
        $this -> hasColumn('General_Qualifications', 'varchar', 250);
        $this -> hasColumn('Technical_Qualifications', 'varchar', 250);       
               
        //present pay scale
        //$this -> hasColumn('Pay_Scale', 'varchar', 25);
        
        $this -> hasColumn('Number_of_Children', 'int', 2);
        $this -> hasColumn('Spouse', 'varchar', 40);
        $this -> hasColumn('Bank_Name', 'varchar', 40);
        $this -> hasColumn('Account_Number', 'varchar', 25);
        
        $this -> hasColumn('Salary', 'varchar', 2);
        $this -> hasColumn('Schools_Attended', 'varchar', 250);
        $this -> hasColumn('Previous_Employer', 'varchar', 40);
        $this -> hasColumn('Contact_Person', 'varchar', 40);
        $this -> hasColumn('Contact_Telephone', 'varchar', 20);
        $this -> hasColumn('Date_Created', 'timestamp');
        
        //accomodation
        //$this -> hasColumn('Qualifications', 'varchar', 250);
        
        //cashmedicalallowance
        //$this -> hasColumn('Qualifications', 'varchar', 250);
        
        //medicalfacility
        //$this -> hasColumn('Qualifications', 'varchar', 250);
        
        //background date from
        //date to
        //designation
        //name of office
        //city
        //promotion date
        
        //training name
        //service date from        
        //station
        //name of exams
        //date of exam
        //exam station
        //exam status
        

    }

    public function setUp() {
        $this -> setTableName('employee');
        $this -> hasOne('Posts', array('local' => 'Post', 'foreign' => 'id'));
        $this -> hasOne('Paygrade', array('local' => 'Salary', 'foreign' => 'id'));
        
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