<?php
class Asset_Types extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Type', 'varchar', 40);
        $this -> hasColumn('Description', 'varchar', 200);  
    }

    public function setUp() {
        $this -> setTableName('asset_types');
        $this -> hasOne('Asset', array('local' => 'id', 'foreign' => 'Asset_Class'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("asset_types");
        $assetsData = $query -> execute();
        return $assetsData;
    }//end getall
}
?>