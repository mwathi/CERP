<?php
class Journal_Entries extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
        $data['title'] = "Ledger Management::All Transaction Dates";
        $data['content_view'] = "transaction_dates_v";
        $this -> base_params($data);
    }//end listing

    public function ledgerListing() {
        $data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
        $data['title'] = "Ledger Management::All Transaction Dates";
        $data['content_view'] = "ledger_dates_v";
        $this -> base_params($data);
    }//end listing

    public function monthlyJournal($monthNumber) {
        $data['transactiondates'] = Transactions::getAllTransactionsByMonth($monthNumber);
        $data['title'] = "Journal Information::Ledger for " . date('F', strtotime($monthNumber));
        $data['content_view'] = "journal_v";
        $this -> base_params($data);
    }//end listing

    public function incomeDates() {
        $data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
        $data['title'] = "Income Dates";
        $data['content_view'] = "income_dates";
        $this -> base_params($data);
    }//end listing

    ////accounts
    public function incomes($monthNumber) {
        $data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
        $this -> load -> database();
        $expensesql = "SELECT SUM(account_affected_1_amount) AS Expense, account_affected_1 AS Account  FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Expense Account') AND MONTH(Date) = '$monthNumber' GROUP BY Account";
        $expensequery = $this -> db -> query($expensesql, array($monthNumber));
        
        $expensetotalsql = "SELECT SUM(account_affected_1_amount) AS Total FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Expense Account') AND MONTH(Date) = '$monthNumber'";
        $expenseTotalQuery = $this -> db -> query($expensetotalsql, array($monthNumber));
        
        $data['expenseTotal'] = $expenseTotalQuery -> result();
        $data['expenses'] = $expensequery -> result();
        $data['offerings'] = Sunday::getSundayTotal($monthNumber);
        $data['title'] = "Journal Information::Ledger for " . date('F', strtotime($monthNumber));
        $data['content_view'] = "incomes_v";
        $this -> base_params($data);
    }//end listing

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
