<?php

class Users extends Doctrine_Record {
    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Username', 'varchar', 25);
        $this -> hasColumn('Password', 'varchar', 25);
        $this -> hasColumn('Email', 'varchar', 35);       
     //   $this -> hasColumn('Membership', 'smallint', 2);        
    }

    public function setUp() {
        $this -> setTableName('users');
        $this -> hasMutator('Password');
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("users");
        $userData = $query -> execute();
        return $userData;
    }//end getall

    protected function _encrypt_password($value) {
        $this -> _set('Password', md5($value));
    }

    public function getAllHydrated() {
        $query = Doctrine_Query::create() -> select("Name,Username,Email") -> from("users");
        $userData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
        return $userData;
    }

    public function getUsers($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("Users") -> where("id = '$id'");
        $cityData = $query -> execute();
        return $cityData;
    }

}
?>