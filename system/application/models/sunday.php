<?php
class Sunday extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Thousand_Youth', 'int', 15);
        $this -> hasColumn('Five_Hundred_Youth', 'int', 15);
        $this -> hasColumn('Two_Hundred_Youth', 'int', 15);
        $this -> hasColumn('Hundred_Youth', 'int', 15);
        $this -> hasColumn('Fifty_Youth', 'int', 15);
        $this -> hasColumn('Twenty_Youth', 'int', 15);
        $this -> hasColumn('Ten_Youth', 'int', 15);
        $this -> hasColumn('Five_Youth', 'int', 15);
        $this -> hasColumn('One_Youth', 'int', 15);

        $this -> hasColumn('Thousand_Teens', 'int', 15);
        $this -> hasColumn('Five_Hundred_Teens', 'int', 15);
        $this -> hasColumn('Two_Hundred_Teens', 'int', 15);
        $this -> hasColumn('Hundred_Teens', 'int', 15);
        $this -> hasColumn('Fifty_Teens', 'int', 15);
        $this -> hasColumn('Twenty_Teens', 'int', 15);
        $this -> hasColumn('Ten_Teens', 'int', 15);
        $this -> hasColumn('Five_Teens', 'int', 15);
        $this -> hasColumn('One_Teens', 'int', 15);

        $this -> hasColumn('Thousand_Sunday_School', 'int', 15);
        $this -> hasColumn('Five_Hundred_Sunday_School', 'int', 15);
        $this -> hasColumn('Two_Hundred_Sunday_School', 'int', 15);
        $this -> hasColumn('Hundred_Sunday_School', 'int', 15);
        $this -> hasColumn('Fifty_Sunday_School', 'int', 15);
        $this -> hasColumn('Twenty_Sunday_School', 'int', 15);
        $this -> hasColumn('Ten_Sunday_School', 'int', 15);
        $this -> hasColumn('Five_Sunday_School', 'int', 15);
        $this -> hasColumn('One_Sunday_School', 'int', 15);

        $this -> hasColumn('Thousand_English_Service', 'int', 15);
        $this -> hasColumn('Five_Hundred_English_Service', 'int', 15);
        $this -> hasColumn('Two_Hundred_English_Service', 'int', 15);
        $this -> hasColumn('Hundred_English_Service', 'int', 15);
        $this -> hasColumn('Fifty_English_Service', 'int', 15);
        $this -> hasColumn('Twenty_English_Service', 'int', 15);
        $this -> hasColumn('Ten_English_Service', 'int', 15);
        $this -> hasColumn('Five_English_Service', 'int', 15);
        $this -> hasColumn('One_English_Service', 'int', 15);

        $this -> hasColumn('Thousand_Swahili_Service', 'int', 15);
        $this -> hasColumn('Five_Hundred_Swahili_Service', 'int', 15);
        $this -> hasColumn('Two_Hundred_Swahili_Service', 'int', 15);
        $this -> hasColumn('Hundred_Swahili_Service', 'int', 15);
        $this -> hasColumn('Fifty_Swahili_Service', 'int', 15);
        $this -> hasColumn('Twenty_Swahili_Service', 'int', 15);
        $this -> hasColumn('Ten_Swahili_Service', 'int', 15);
        $this -> hasColumn('Five_Swahili_Service', 'int', 15);
        $this -> hasColumn('One_Swahili_Service', 'int', 15);

        $this -> hasColumn('Thousand_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Five_Hundred_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Two_Hundred_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Hundred_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Fifty_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Twenty_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Ten_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('Five_Monthly_Pledge', 'int', 15);
        $this -> hasColumn('One_Monthly_Pledge', 'int', 15);

        $this -> hasColumn('Thousand_Thanksgiving', 'int', 15);
        $this -> hasColumn('Five_Hundred_Thanksgiving', 'int', 15);
        $this -> hasColumn('Two_Hundred_Thanksgiving', 'int', 15);
        $this -> hasColumn('Hundred_Thanksgiving', 'int', 15);
        $this -> hasColumn('Fifty_Thanksgiving', 'int', 15);
        $this -> hasColumn('Twenty_Thanksgiving', 'int', 15);
        $this -> hasColumn('Ten_Thanksgiving', 'int', 15);
        $this -> hasColumn('Five_Thanksgiving', 'int', 15);
        $this -> hasColumn('One_Thanksgiving', 'int', 15);

        $this -> hasColumn('Thousand_Tithe', 'int', 15);
        $this -> hasColumn('Five_Hundred_Tithe', 'int', 15);
        $this -> hasColumn('Two_Hundred_Tithe', 'int', 15);
        $this -> hasColumn('Hundred_Tithe', 'int', 15);
        $this -> hasColumn('Fifty_Tithe', 'int', 15);
        $this -> hasColumn('Twenty_Tithe', 'int', 15);
        $this -> hasColumn('Ten_Tithe', 'int', 15);
        $this -> hasColumn('Five_Tithe', 'int', 15);
        $this -> hasColumn('One_Tithe', 'int', 15);
		
		$this -> hasColumn('Cashorcheque', 'int', 15);
		$this -> hasColumn('Bank', 'int', 15);
		$this -> hasColumn('Cheque_Amount', 'int', 15);
		$this -> hasColumn('Cheque_Number', 'varchar', 40);
		$this -> hasColumn('Drawer', 'varchar', 40);

        $this -> hasColumn('Date', 'date');
    }

    public function setUp() {
        $this -> setTableName('sunday');
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("sunday");
        $sundayData = $query -> execute();
        return $sundayData;
    }//end getall

    public function getSunday($id) {
        $query = Doctrine_Query::create() -> select("*") -> from("sunday") -> where("id = '$id'");
        $sundayData = $query -> execute();
        return $sundayData;
    }

    public function getSundayId() {
        $query = Doctrine_Query::create() -> select("id") -> from("sunday");
        $sundayData = $query -> execute();
        return $sundayData;
    }

    public function getSundayTotal($date,$id) {
        $query = Doctrine_Query::create() -> select("SUM(Thousand_Youth + Five_Hundred_Youth + Two_Hundred_Youth + Hundred_Youth + Fifty_Youth + Twenty_Youth + Ten_Youth + Five_Youth + One_Youth 
        + Thousand_Teens + Five_Hundred_Teens + Two_Hundred_Teens + Hundred_Teens + Fifty_Teens + Twenty_Teens + Ten_Teens + Five_Teens + One_Teens
         + Thousand_Sunday_School + Five_Hundred_Sunday_School + Two_Hundred_Sunday_School + Hundred_Sunday_School + Fifty_Sunday_School + Twenty_Sunday_School + Ten_Sunday_School + Five_Sunday_School + One_Sunday_School
          + Thousand_English_Service + Five_Hundred_English_Service + Two_Hundred_English_Service + Hundred_English_Service + Fifty_English_Service + Twenty_English_Service + Ten_English_Service + Five_English_Service + One_English_Service
           + Thousand_Swahili_Service + Five_Hundred_Swahili_Service + Two_Hundred_Swahili_Service + Hundred_Swahili_Service + Fifty_Swahili_Service + Twenty_Swahili_Service + Ten_Swahili_Service + Five_Swahili_Service + One_Swahili_Service
            + Thousand_Monthly_Pledge + Five_Hundred_Monthly_Pledge + Two_Hundred_Monthly_Pledge + Hundred_Monthly_Pledge + Fifty_Monthly_Pledge + Twenty_Monthly_Pledge + Ten_Monthly_Pledge + Five_Monthly_Pledge + One_Monthly_Pledge
             + Thousand_Thanksgiving + Five_Hundred_Thanksgiving + Two_Hundred_Thanksgiving + Hundred_Thanksgiving + Fifty_Thanksgiving + Twenty_Thanksgiving + Ten_Thanksgiving + Five_Thanksgiving + One_Thanksgiving
              + Thousand_Tithe + Five_Hundred_Tithe + Two_Hundred_Tithe + Hundred_Tithe + Fifty_Tithe + Twenty_Tithe + Ten_Tithe + Five_Tithe + One_Tithe ) AS Offertory") -> from("sunday") -> where("Date = '$date' AND id = '$id' ");
        $sundayData = $query -> execute();
        return $sundayData;
    }

    public function getSundayIncomes($month) {
        $query = Doctrine_Query::create() -> select("SUM(Thousand_Youth + Five_Hundred_Youth + Two_Hundred_Youth + Hundred_Youth + Fifty_Youth + Twenty_Youth + Ten_Youth + Five_Youth + One_Youth 
        + Thousand_Teens + Five_Hundred_Teens + Two_Hundred_Teens + Hundred_Teens + Fifty_Teens + Twenty_Teens + Ten_Teens + Five_Teens + One_Teens
         + Thousand_Sunday_School + Five_Hundred_Sunday_School + Two_Hundred_Sunday_School + Hundred_Sunday_School + Fifty_Sunday_School + Twenty_Sunday_School + Ten_Sunday_School + Five_Sunday_School + One_Sunday_School
          + Thousand_English_Service + Five_Hundred_English_Service + Two_Hundred_English_Service + Hundred_English_Service + Fifty_English_Service + Twenty_English_Service + Ten_English_Service + Five_English_Service + One_English_Service
           + Thousand_Swahili_Service + Five_Hundred_Swahili_Service + Two_Hundred_Swahili_Service + Hundred_Swahili_Service + Fifty_Swahili_Service + Twenty_Swahili_Service + Ten_Swahili_Service + Five_Swahili_Service + One_Swahili_Service
            + Thousand_Monthly_Pledge + Five_Hundred_Monthly_Pledge + Two_Hundred_Monthly_Pledge + Hundred_Monthly_Pledge + Fifty_Monthly_Pledge + Twenty_Monthly_Pledge + Ten_Monthly_Pledge + Five_Monthly_Pledge + One_Monthly_Pledge
             + Thousand_Thanksgiving + Five_Hundred_Thanksgiving + Two_Hundred_Thanksgiving + Hundred_Thanksgiving + Fifty_Thanksgiving + Twenty_Thanksgiving + Ten_Thanksgiving + Five_Thanksgiving + One_Thanksgiving
              + Thousand_Tithe + Five_Hundred_Tithe + Two_Hundred_Tithe + Hundred_Tithe + Fifty_Tithe + Twenty_Tithe + Ten_Tithe + Five_Tithe + One_Tithe ) AS Offertory") -> from("sunday") -> where("MONTH(Date) = '$month'");
        $sundayData = $query -> execute();
        return $sundayData;
    }

}
?>