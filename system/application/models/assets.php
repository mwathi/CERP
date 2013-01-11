<?php
class Assets extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Asset_Class', 'int', 10);
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Model', 'varchar', 40);
        $this -> hasColumn('Serial_Number', 'varchar', 40);
        $this -> hasColumn('Location', 'varchar', 40);
        $this -> hasColumn('Asset_Cost', 'int', 40);
        $this -> hasColumn('Date_Purchased', 'date');
        $this -> hasColumn('User', 'varchar',40);
        $this -> hasColumn('Supplier_Name', 'varchar', 40);
        $this -> hasColumn('Supplier_Phone', 'varchar', 15);
        $this -> hasColumn('Asset_Number', 'int', 15);
        $this -> hasColumn('Useful_Life', 'int', 15);
        $this -> hasColumn('Salvage_Value', 'int', 15);
        $this -> hasColumn('Description', 'varchar', 200);
    }

    public function setUp() {
        $this -> setTableName('assets');
        $this -> hasMany('Asset_Types', array('local' => 'Asset_Class', 'foreign' => 'id'));
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