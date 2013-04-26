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
        $this -> hasColumn('Identifier', 'int', 5);
        $this -> hasColumn('Transaction_Id', 'varchar', 15);
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

    //ledger
    public function getAllTransactionsByYear($year) {
        $query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("YEAR(Date) = '$year' AND Account_Affected_1 = 'Cash' OR Account_Affected_2 = 'Cash' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall

    public function getAllTransactionsByYearDate() {
        $query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("Date != '' GROUP BY YEAR(Date)");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall
    
    public function getAllLedgerTransactionsTotalDebitByYearDate($year) {
        $query = Doctrine_Query::create() -> select(" SUM(Account_Affected_1_Amount) AS Account_Affected_1_Amount ") -> from("transactions") -> where("Account_Affected_1_Operation = 'Debit' AND Account_Affected_1 = 'Cash' AND YEAR(Date) = '$year' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall
    
    public function getAllLedgerTransactionsTotalCreditByYearDate($year) {
        $query = Doctrine_Query::create() -> select(" SUM(Account_Affected_2_Amount) AS Account_Affected_2_Amount ") -> from("transactions") -> where("Account_Affected_1_Operation = 'Debit' AND Account_Affected_2 = 'Cash' AND YEAR(Date) = '$year' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall
    
    public function getAllLedgerTransactionsEndingBalance($year) {
        $query = Doctrine_Query::create() -> select(" SUM(Ending_Balance) AS Ending_Balance ") -> from("transactions") -> where("YEAR(Date) = '$year' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }//end getall
    
    public function getUnpaidBills($monthNumber){
        $query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("Identifier = 0 AND Transaction = 'Balance Accrual' AND MONTH(Date) = '$monthNumber' ");
        $transactionData = $query -> execute();
        return $transactionData;
    }
	
	public function cashbook($bankid){
		$query = Doctrine_Query::create() -> select("*") -> from("transactions") -> where("Account_Affected_1 = '$bankid' OR Account_Affected_2 = '$bankid' ");
        $transactionData = $query -> execute();
        return $transactionData;
	}

}
?>