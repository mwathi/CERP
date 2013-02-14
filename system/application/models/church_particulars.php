<?php
class Church_Particulars extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Church_Name', 'varchar', 100);
        $this -> hasColumn('Bank', 'int', 10);
        $this -> hasColumn('Account_Number', 'int', 25);
        $this -> hasColumn('Opening_Balance', 'varchar', 40);
        $this -> hasColumn('Opening_Balance_Date', 'date');
        
    }

    public function setUp() {
        $this -> setTableName('church_particulars');
        $this -> hasOne('Banks', array('local' => 'Bank', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("church_particulars");
        $churchParticularsData = $query -> execute();
        return $churchParticularsData;
    }//end getall

    public function getChurch($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("church_particulars") -> where("id = '$id'");
        $churchParticularsData = $query -> execute();
        return $churchParticularsData;
    }

}
?>