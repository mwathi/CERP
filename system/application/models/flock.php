<?php
class Flock extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Member_Number', 'int', 20);
        $this -> hasColumn('First_Name', 'varchar', 20);
        $this -> hasColumn('Surname', 'varchar', 20);
        $this -> hasColumn('Last_Name', 'varchar', 20);
        $this -> hasColumn('Member_Group', 'varchar', 40);
        $this -> hasColumn('Phone', 'varchar', 20);
        $this -> hasColumn('Gender', 'varchar', 6);
        $this -> hasColumn('Date_of_Birth', 'date', 15);

        $this -> hasColumn('House', 'varchar', 40);

        $this -> hasColumn('Profession', 'varchar', 40);
        $this -> hasColumn('Marital_Status', 'varchar', 20);
        $this -> hasColumn('Disability_Status', 'varchar', 20);
        $this -> hasColumn('Level_of_education', 'varchar', 25);
        $this -> hasColumn('Place_of_work', 'varchar', 40);
        $this -> hasColumn('Darasa', 'varchar', 15);
        $this -> hasColumn('School', 'varchar', 40);
        $this -> hasColumn('National_id', 'varchar', 15);
        $this -> hasColumn('Passport', 'varchar', 40);
        $this -> hasColumn('Country', 'varchar', 40);
        $this -> hasColumn('Parent', 'int', 2);
        $this -> hasColumn('Spouse', 'varchar', 40);
        $this -> hasColumn('Parent_name', 'varchar', 40);
        $this -> hasColumn('Children', 'varchar', 2);

        $this -> hasColumn('Residence', 'varchar', 25);
        $this -> hasColumn('Physical_Address', 'varchar', 25);

        $this -> hasColumn('Email', 'varchar', 40);
        $this -> hasColumn('Date_Created', 'timestamp');
    }

    public function setUp() {
        $this -> setTableName('flock');
        $this -> hasOne('Groups', array('local' => 'Member_Group', 'foreign' => 'id'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("flock");
        $flockData = $query -> execute();
        return $flockData;
    }//end getall

    public function getMember($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("id = '$id'");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getParents() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '1'");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getFemaleParents() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '1' OR (YEAR(CURDATE())-YEAR(Date_of_Birth)) > 24 AND Gender = 'Female'");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getMaleParents() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '1' OR (YEAR(CURDATE())-YEAR(Date_of_Birth)) > 24 AND Gender = 'Male' ");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getMaleYouths() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '0' AND Gender = 'Male' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) BETWEEN 15 AND 24");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getFemaleYouths() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '0' AND Gender = 'Female' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) BETWEEN 15 AND 24");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getMaleChildren() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '0' AND Gender = 'Male' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) < 15");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getFemaleChildren() {
        $query = Doctrine_Query::create() -> select("First_Name,Last_Name,Surname") -> from("flock") -> where("Parent = '0' AND Gender = 'Female' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) < 15");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getLatestParents() {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("(YEAR(CURDATE())-YEAR(Date_of_Birth)) > 24") -> limit('10');
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getPagedAdults($offset, $items) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("(YEAR(CURDATE())-YEAR(Date_of_Birth)) > 24") -> orderBy("Date_Created") -> offset($offset) -> limit($items);
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getTotalMembers() {
        $query = Doctrine_Query::create() -> select("COUNT(*) as Total_Members") -> from("flock");
        $flockData = $query -> execute();
        return $flockData;
    }

    //Begin Report Data
    public function getProfessions($profession) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Profession LIKE '%$profession%' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getGenders($gender) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Gender = '$gender' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getStatus($status) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Marital_Status LIKE '%$status%' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getGroup($group) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Member_Group LIKE '%$group%' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getAllProfessions() {
        $query = Doctrine_Query::create() -> select("DISTINCT Profession") -> from("flock") -> where("Profession != '' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getAllGenders() {
        $query = Doctrine_Query::create() -> select("DISTINCT(Gender) AS Gender") -> from("flock") -> where("Gender != '' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getAllStatuses() {
        $query = Doctrine_Query::create() -> select("DISTINCT (Marital_Status) as Marital_Status") -> from("flock") -> where("Marital_Status != '' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getAllGroups() {
        $query = Doctrine_Query::create() -> select("DISTINCT Member_Group") -> from("flock") -> where("Member_Group != '' ") -> orderBy("First_Name");
        $flockData = $query -> execute();
        return $flockData;
    }

    //End Report Data

    public static function getTotalNumberAdults() {
        $query = Doctrine_Query::create() -> select("COUNT(*) as Total_Parents") -> from("flock") -> where("(YEAR(CURDATE())-YEAR(Date_of_Birth)) > 24");
        $count = $query -> execute();
        return $count[0] -> Total_Parents;
    }

    public function getLatestYouth() {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) BETWEEN 15 AND 24") -> limit('10');
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getLatestChildren() {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) < 15") -> limit('10');
        $flockData = $query -> execute();
        return $flockData;
    }

    public function getPagedYouth($offset, $items) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) BETWEEN 15 AND 24") -> orderBy("Date_Created") -> offset($offset) -> limit($items);
        $flockData = $query -> execute();
        return $flockData;
    }

    public static function getTotalNumberYouth() {
        $query = Doctrine_Query::create() -> select("COUNT(*) as Total_Youth") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) BETWEEN 15 AND 24");
        $count = $query -> execute();
        return $count[0] -> Total_Youth;
    }

    public function getPagedChildren($offset, $items) {
        $query = Doctrine_Query::create() -> select("*") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) < 15") -> orderBy("Date_Created") -> offset($offset) -> limit($items);
        $flockData = $query -> execute();
        return $flockData;
    }

    public static function getTotalNumberChildren() {
        $query = Doctrine_Query::create() -> select("COUNT(*) as Total_Children") -> from("flock") -> where("Parent = '0' AND (YEAR(CURDATE())-YEAR(Date_of_Birth)) < 15");
        $count = $query -> execute();
        return $count[0] -> Total_Children;
    }

    function get_name($q) {
        $this -> db -> select('First_Name');
        $this -> db -> like('First_Name', $q);
        $query = $this -> db -> get('Flock');
        if ($query -> num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['First_Name']));
                //build an array
            }
            echo json_encode($row_set);
            //format the array into json data
        }
    }

}
?>