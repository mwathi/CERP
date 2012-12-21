<?php
class Member_Groups extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Member_Number', 'int', 20);
        $this -> hasColumn('Groups', 'int', 2);        
    }

    public function setUp() {
        $this -> setTableName('member_groups');
        $this -> hasOne('Flock', array('local' => 'Member_Number', 'foreign' => 'Member_Number'));
        $this -> hasOne('Groups', array('local' => 'Groups', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("member_groups");
        $benefitData = $query -> execute();
        return $benefitData;
    }//end getall


}

?>