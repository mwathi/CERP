<?php
class Suppliers extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Company_Name', 'varchar', 40);
        $this -> hasColumn('Email', 'varchar', 20);
        $this -> hasColumn('Phone', 'varchar', 15);
        $this -> hasColumn('Address', 'varchar', 20);
        $this -> hasColumn('City', 'varchar', 40);
        $this -> hasColumn('Zip', 'varchar', 15);
        $this -> hasColumn('Contact_Name', 'varchar', 40);
        $this -> hasColumn('Contact_Phone', 'varchar', 15);
    }

    public function setUp() {
        $this -> setTableName('suppliers');
        $this -> hasOne('Balances', array('local' => 'id', 'foreign' => 'Supplier'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("suppliers");
        $supplierData = $query -> execute();
        return $supplierData;
    }//end getall

    public function getSupplier($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("suppliers") -> where("id = '$id'");
        $supplierData = $query -> execute();
        return $supplierData;
    }

}
?>