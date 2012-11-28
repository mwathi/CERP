<?php

class Groups extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
    }

    public function setUp() {     
        $this -> setTableName('groups');    
        $this -> hasMany('Members', array('local' => 'id', 'foreign' => 'Member_Group'));    
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("groups");
        $groupData = $query -> execute();
        return $groupData;
    }//end getall

   

}
?>