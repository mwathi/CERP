<?php
class Reliefs extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Rate', 'varchar', 15);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('reliefs');        
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("reliefs");
        $ReliefData = $query -> execute();
        return $ReliefData;
    }//end getall

    public function getRelief($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("reliefs") -> where("id = '$id'");
        $ReliefData = $query -> execute();
        return $ReliefData;
    }

    public function getReliefId() {
        $query = Doctrine_Query::create() -> select("id") -> from("reliefs");
        $ReliefData = $query -> execute();
        return $ReliefData;
    }

}
?>