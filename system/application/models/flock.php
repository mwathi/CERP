<?php

class Flock extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Member_Group', 'varchar', 40);
        $this -> hasColumn('Phone', 'varchar', 20);
        $this -> hasColumn('Gender', 'varchar', 6);
        $this -> hasColumn('Date_of_Birth', 'varchar', 15);
        $this -> hasColumn('Spouse', 'varchar', 40);
        $this -> hasColumn('Children', 'varchar', 2);
        $this -> hasColumn('Address', 'varchar', 25);
        $this -> hasColumn('Email', 'varchar', 40);
        $this -> hasColumn('Date_Created', 'timestamp');
    }

    public function setUp() {
        $this -> setTableName('flock');
        $this -> hasOne('Groups', array('local' => 'Member_Group', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("flock");
        $flockData = $query -> execute();
        return $flockData;
    }//end getall

    public function getMember($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("id = '$id'");
        $flockData = $query -> execute();
        return $flockData;
    }

}
?>