<?php
class Posts extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Name', 'varchar', 40);
        $this -> hasColumn('Pay', 'varchar', 7);
        $this -> hasColumn('Description', 'varchar', 250);
    }

    public function setUp() {
        $this -> setTableName('posts');
        //$this -> hasOne('Groups', array('local' => 'Member_Group', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("posts");
        $postData = $query -> execute();
        return $postData;
    }//end getall

    public function getPost($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("posts") -> where("id = '$id'");
        $postData = $query -> execute();
        return $postData;
    }

}
?>