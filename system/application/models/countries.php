<?php
class Countries extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 25);
    }

    public function setUp() {
        $this -> setTableName('countries');
        $this -> hasOne('Flock', array('local' => 'id', 'foreign' => 'Nationality'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("countries");
        $countryData = $query -> execute();
        return $countryData;
    }//end getall


}
?>