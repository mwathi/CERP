<?php

class Groups extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Group_Name', 'varchar', 40);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('groups');
        $this -> hasMany('Flock', array('local' => 'id', 'foreign' => 'Member_Group'));
        $this -> hasOne('Member_Groups', array('local' => 'id', 'foreign' => 'Groupings'));
        $this -> hasMany('Job_Groups', array('local' => 'id', 'foreign' => 'Benefit'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("groups");
        $groupData = $query -> execute();
        return $groupData;
    }//end getall

    public function getGroup($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("groups") -> where("id = '$id'");
        $groupData = $query -> execute();
        return $groupData;
    }

}
?>