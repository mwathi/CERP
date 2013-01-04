<?php
class Job_Groups extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Job_Group', 'varchar', 15);
        $this -> hasColumn('Description', 'varchar', 200);
        $this -> hasColumn('Salary', 'int', 15);
        $this -> hasColumn('Benefit', 'int', 10);
    }

    public function setUp() {
        $this -> setTableName('job_groups');
        $this -> hasOne('Groups', array('local' => 'Benefit', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("Job_Group,Description") -> from("job_groups") -> where("Job_Group != 'X' GROUP BY job_group ");
        $Job_GroupsData = $query -> execute();
        return $Job_GroupsData;
    }//end getall

    public function getGroup($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("job_groups") -> where("id = '$id'");
        $groupData = $query -> execute();
        return $groupData;
    }
    
    public function manageGroup($job_group) {
        $query = Doctrine_Query::create() -> select("*") -> from("job_groups") -> where("Job_Group = '$job_group'");
        $groupData = $query -> execute();
        return $groupData;
    }

    public function getBenefits($job_group) {
        $query = Doctrine_Query::create() -> select("*") -> from("job_groups") -> where("Job_Group = '$job_group'");
        $benefitData = $query -> execute();
        return $benefitData;
    }

}
?>