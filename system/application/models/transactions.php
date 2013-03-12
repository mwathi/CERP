<?php
class Transactions extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Date', 'date');
        $this -> hasColumn('Transaction', 'varchar', 400);

        $this -> hasColumn('Account_Affected_1', 'varchar', 40);
        $this -> hasColumn('Account_Affected_1_Amount', 'int', 15);
        $this -> hasColumn('Account_Affected_1_Operation', 'varchar', 15);

        $this -> hasColumn('Account_Affected_2', 'varchar', 40);
        $this -> hasColumn('Account_Affected_2_Amount', 'int', 15);
        $this -> hasColumn('Account_Affected_2_Operation', 'varchar', 15);
        
        $this -> hasColumn('Ending_Balance', 'int', 15);
    }

    public function setUp() {
        $this -> setTableName('transactions');
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("transactions");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall

    public function getAllTransactionsByMonthDate() {
        $query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("Date != '' GROUP BY MONTH(Date)");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall

    public function getAllTransactionsByMonth($monthNumber) {
        $query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("MONTH(Date) = '$monthNumber' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall
    
}
?>