<?php
class Assets extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Type', 'int', 10);
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Model', 'varchar', 40);
        $this -> hasColumn('Number_of_Assets', 'int', 15);
        $this -> hasColumn('Serial_Number', 'varchar', 40);
        $this -> hasColumn('Location', 'varchar', 40);
        $this -> hasColumn('Value', 'int', 40);
        $this -> hasColumn('Date_Purchased', 'date');
        $this -> hasColumn('Description', 'varchar', 200);
    }

    public function setUp() {
        $this -> setTableName('assets');
        $this -> hasMany('Asset_Types', array('local' => 'Type', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("assets");
        $assetsData = $query -> execute();
        return $assetsData;
    }//end getall

    public function getAsset($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("assets") -> where("id = '$id'");
        $assetsData = $query -> execute();
        return $assetsData;
    }

}
?>