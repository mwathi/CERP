<?php
class Partakings extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Transaction_Value', 'int', 15);
        $this -> hasColumn('Date', 'int', 15);
    }

    public function setUp() {
        $this -> setTableName('partakings');
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("partakings") -> orderBy("id DESC") -> limit('1');
        $partakingsData = $query -> execute();
        return $partakingsData;
    }//end getall

}
?>