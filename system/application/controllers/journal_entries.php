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
		$data['title'] = "Journal Management::All Transaction Dates";
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
		$data['title'] = "Journal Information::Journal for " . date('F', strtotime($monthNumber));
		$data['content_view'] = "journal_v";
		$this -> base_params($data);
	}//end listing

	public function incomeDates() {
		$data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
		$data['title'] = "Income Dates";
		$data['content_view'] = "income_dates";
		$this -> base_params($data);
	}//end listing

	//ledger stuff ##new
	public function ledgerDates() {
		$data['transactiondates'] = Transactions::getAllTransactionsByYearDate();
		$data['title'] = "Ledger Dates";
		$data['content_view'] = "ledger_dates";
		$this -> base_params($data);
	}//end listing

	public function balanceDates() {
		$bankaccounts = Partakings::getAccounts();
		$data['bankaccounts'] = $bankaccounts[0];
		$data['transactiondates'] = Transactions::getAllTransactionsByMonthDate();
		$data['title'] = "Balance Sheet Dates";
		$data['content_view'] = "balancesheetdates_v";
		$this -> base_params($data);
	}//end listing

	public function yearlyLedger($year) {
		$partakings = Partakings::getAll();
		$data['endingbalance'] = $partakings[0];
		$particulars = Church_Particulars::getAll();
		$data['particulars'] = $particulars[0];
		$data['transactiondates'] = Transactions::getAllTransactionsByYear($year);
		$transactiontotaldebit = Transactions::getAllLedgerTransactionsTotalDebitByYearDate($year);
		$data['transactiontotaldebit'] = $transactiontotaldebit[0];
		$transactiontotalcredit = Transactions::getAllLedgerTransactionsTotalCreditByYearDate($year);
		$data['transactiontotalcredit'] = $transactiontotalcredit[0];
		$data['title'] = "Ledger Information::Ledger for " . date('Y');
		$data['content_view'] = "ledger_v";
		$this -> base_params($data);
	}//end listing

	public function balancesheets($limit) {
		$x = Church_Particulars::getTotalNumberBanks();
		$this -> load -> database();

		$partakingsql = "SELECT distinct(name) as account,bank_account,transaction_value FROM partakings,banks where banks.id = partakings.bank_account order by partakings.id desc limit $x";
		$partakingquery = $this -> db -> query($partakingsql);
		$partakings = $partakingquery -> result();
		$data['partakings'] = $partakings;
		$data['limit'] = $limit;
		//accounts payable//
		$accountspayablesql = "SELECT SUM(balance_due) AS Accounts_Payable FROM balances";
		$accountspayablequery = $this -> db -> query($accountspayablesql);
		$accountspayable = $accountspayablequery -> result();
		$data['accountspayable'] = $accountspayable[0];

		//opeing balance equity//
		$obesql = "SELECT SUM(balance) AS Opening_Balance_Equity FROM church_particulars";
		$obequery = $this -> db -> query($obesql);
		$obe = $obequery -> result();
		$data['obe'] = $obe[0];

		//total opeing balance equity//
		$partsql = "SELECT SUM(transaction_value) AS Total_Opening_Balance FROM partakings";
		$partquery = $this -> db -> query($partsql);
		$partak = $partquery -> result();
		$data['partak'] = $partak[0];
		
		//expenses//
		$expensetotalsql = "SELECT SUM(account_affected_1_amount) AS Total FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Expense Account')";
		$expenseTotalQuery = $this -> db -> query($expensetotalsql);
		$expenseTotal = $expenseTotalQuery -> result();
		$data['expenseTotal'] = $expenseTotal[0];

		//incomes//
		$incometotalsql = "SELECT SUM(account_affected_2_amount) AS Total FROM transactions WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account') AND identifier = 1";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['incomeTotal'] = $incomeTotal[0];

		//fixed assets//
		$fixedassetsql = "SELECT SUM(account_affected_1_amount) AS Property, account_affected_1 AS Account  FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Fixed Asset Account' OR type = 'Furniture and Equipment') GROUP BY Account";
		$fixedassetquery = $this -> db -> query($fixedassetsql);

		$fixedassettotalsql = "SELECT SUM(account_affected_1_amount) AS Total FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Fixed Asset Account' OR type = 'Furniture and Equipment')";
		$fixedassetTotalQuery = $this -> db -> query($fixedassettotalsql);
		$fixedassetTotal = $fixedassetTotalQuery -> result();
		$data['fixedassetTotal'] = $fixedassetTotal[0];
		$data['fixedassets'] = $fixedassetquery -> result();

		//non-fixed assets//

		$assettotalsql = "SELECT SUM(account_affected_1_amount) AS Total FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Asset Account') AND account_affected_1 != 'Cash' ";
		$assetTotalQuery = $this -> db -> query($assettotalsql);
		$assetTotal = $assetTotalQuery -> result();
		$data['assetTotal'] = $assetTotal[0];

		//deposited funds
		$banktotalsql = "SELECT SUM(account_affected_1_amount) AS Total FROM transactions WHERE account_affected_1 NOT IN(SELECT name FROM accounts) AND transaction = 'Deposit of Undeposited Funds' OR transaction like '%Church cheque contributions%' OR transaction like '%Cheque Contributions dated%' ";
		$bankTotalQuery = $this -> db -> query($banktotalsql);
		$bankTotal = $bankTotalQuery -> result();
		$data['bankTotal'] = $bankTotal[0];

		$data['title'] = "BS Information";
		$data['content_view'] = "balance_sheet_v";
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
		$data['offerings'] = Sunday::getSundayIncomes($monthNumber);
		$contributions = Contributions::getTotalContribootionsPerMonth($monthNumber);
		$data['contributions'] = $contributions[0];
		$data['title'] = "Journal Information::Ledger for " . date('F', strtotime($monthNumber));
		$data['content_view'] = "incomes_v";
		$this -> base_params($data);
	}//end listing

	public function transactions($account) {
		$data['account'] = $account;
		$this -> load -> database();
		$transactionsql = "SELECT * FROM transactions WHERE account_affected_1 = '$account' or account_affected_2 = '$account'";
		$transactionquery = $this -> db -> query($transactionsql);
		$transaction = $transactionquery -> result();
		$data['transaction'] = $transaction;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "transaction_v";
		$this -> base_params($data);
	}

	public function asset_transactions() {
		$this -> load -> database();
		$transactionsql = "SELECT * FROM transactions WHERE account_affected_1 = 'Fixed Asset' AND account_affected_2_operation = 'Credit' ";
		$transactionquery = $this -> db -> query($transactionsql);
		$transaction = $transactionquery -> result();
		$data['transaction'] = $transaction;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "asset_transactions_v";
		$this -> base_params($data);
	}

	public function liability_transactions() {
		$this -> load -> database();
		$transactionsql = "SELECT t.transaction as Transaction, t.account_affected_1 AS Account_Affected_1, t.date as Date, t.account_affected_1_amount as Account_Affected_1_Amount, t.account_affected_2_amount
        as Account_Affected_2_Amount, t.ending_balance as Ending_Balance, b.Balance_Due AS Balance_Due FROM transactions t, balances b  WHERE  b.transaction_id = t.transaction_id";
		$transactionquery = $this -> db -> query($transactionsql);
		$transaction = $transactionquery -> result();
		$data['transaction'] = $transaction;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "liability_transactions_v";
		$this -> base_params($data);
	}

	public function netliabilities() {
		$this -> load -> database();
		$transactionsql = "SELECT t.transaction as Transaction, t.account_affected_1 AS Account_Affected_1, t.date as Date, t.account_affected_1_amount as Account_Affected_1_Amount, t.account_affected_2_amount
        as Account_Affected_2_Amount, t.ending_balance as Ending_Balance, b.Balance_Due AS Balance_Due FROM transactions t, balances b  WHERE  b.transaction_id = t.transaction_id";
		$transactionquery = $this -> db -> query($transactionsql);
		$transaction = $transactionquery -> result();
		$data['transaction'] = $transaction;

		//opeing balance
		$data['transaction2'] = Church_Particulars::getAll();

		//incomes//
		$incometotalsql = "SELECT * FROM transactions WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account')";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['incomeTotal'] = $incomeTotal;

		//expenses
		$expensetotalsql = "SELECT * FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Expense Account')";
		$expenseTotalQuery = $this -> db -> query($expensetotalsql);
		$expenseTotal = $expenseTotalQuery -> result();
		$data['expenseTotal'] = $expenseTotal;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "net_liabilities_v";
		$this -> base_params($data);
	}

	public function addassets() {
		$this -> load -> database();
		$transactionsql = "SELECT * FROM transactions WHERE account_affected_2 = 'Cash' OR account_affected_2 = 'Offerings' OR account_affected_2 = 'Pledges' AND account_affected_2_operation = 'Credit' ";
		$transactionquery = $this -> db -> query($transactionsql);
		$transaction = $transactionquery -> result();
		$data['transaction'] = $transaction;
		$transactionsql2 = "SELECT * FROM transactions WHERE account_affected_1 = 'Fixed Asset' AND account_affected_2_operation = 'Credit' ";
		$transactionquery2 = $this -> db -> query($transactionsql2);
		$transaction2 = $transactionquery2 -> result();
		$data['transaction2'] = $transaction2;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "total_assets_v";
		$this -> base_params($data);
	}

	public function openingbalance() {
		$data['transaction'] = Church_Particulars::getAll();
		$data['title'] = "Transaction Information";
		$data['content_view'] = "opening_balance_v";
		$this -> base_params($data);
	}

	public function netincome() {
		$this -> load -> database();
		//expenses//
		$expensetotalsql = "SELECT * FROM transactions WHERE account_affected_1 IN (SELECT name FROM accounts WHERE type = 'Expense Account')";
		$expenseTotalQuery = $this -> db -> query($expensetotalsql);
		$expenseTotal = $expenseTotalQuery -> result();
		$data['expenseTotal'] = $expenseTotal;

		//incomes//
		$incometotalsql = "SELECT * FROM transactions WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account') AND account_affected_1 != 'Bank'";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['incomeTotal'] = $incomeTotal;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "p&l_v";
		$this -> base_params($data);
	}

	public function undepositedfunds($limit) {
		$data['registeredbanks'] = Partakings::getAccountBalancePerAccount($limit);

		$this -> load -> database();
		$incometotalsql = "SELECT * FROM transactions WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account')";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['transaction'] = $incomeTotal;

		$data['title'] = "Transaction Information";
		$data['content_view'] = "undepositedfunds_v";
		$this -> base_params($data);
	}

	public function savefunds() {
		$totalundepositedfunds = $this -> input -> post("totalundepositedfunds");
		$depositvalue = $this -> input -> post("depositvalue");
		$accountbalance = $this -> input -> post("accountbalance");
		$bankaccount = $this -> input -> post("bankaccount");
		$limit = $this -> input -> post("limit");
		
		if ($totalundepositedfunds > $depositvalue) {

		} else if (($totalundepositedfunds < $depositvalue)) {
			$buffer = $totalundepositedfunds - $depositvalue;

			$transaction = new Transactions();
			$transaction -> Date = date("Y-m-d");
			$transaction -> Account_Affected_1 = $bankaccount;
			$transaction -> Transaction = "Deposit of Undeposited Funds";
			$transaction -> Account_Affected_1_Amount = $depositvalue;
			$transaction -> Account_Affected_1_Operation = "Debit";
			$transaction -> Account_Affected_2 = "Cash";
			$transaction -> Account_Affected_2_Amount = $depositvalue;
			$transaction -> Account_Affected_2_Operation = "Credit";
			$transaction -> Ending_Balance = ($depositvalue + $accountbalance);
			$transaction -> save();


			$this -> load -> database();
			$sqlinserttransaction = "insert into transactions (date,account_affected_1,transaction,account_affected_1_amount,account_affected_1_operation,account_affected_2,
			account_affected_2_amount,account_affected_2_operation,ending_balance) values ('".date('Y-m-d')."','General Income','Balance from undeposited funds',
			'".$buffer."','Debit','Cash','".$buffer."','Credit','".($depositvalue+$accountbalance)."') ";
			
			$query1 = $this -> db -> query($sqlinserttransaction);
			
			
			$this -> load -> database();
			$sqlupdatepartakings = "UPDATE partakings SET bank_account = '" . $bankaccount . "', 
										transaction_value = '" . ($depositvalue + $accountbalance) . "', date =" . date('Y-m-d') . " WHERE bank_account =" . $bankaccount;
			$query = $this -> db -> query($sqlupdatepartakings);

		} else {
			$transaction = new Transactions();
			$transaction -> Date = date("Y-m-d");
			$transaction -> Account_Affected_1 = $bankaccount;
			$transaction -> Transaction = "Deposit of Undeposited Funds";
			$transaction -> Account_Affected_1_Amount = $depositvalue;
			$transaction -> Account_Affected_1_Operation = "Debit";
			$transaction -> Account_Affected_2 = "Cash";
			$transaction -> Account_Affected_2_Amount = $depositvalue;
			$transaction -> Account_Affected_2_Operation = "Credit";
			$transaction -> Ending_Balance = ($depositvalue + $accountbalance);
			$transaction -> save();

			$this -> load -> database();
			$sqlupdatepartakings = "UPDATE partakings SET bank_account = '" . $bankaccount . "', 
										transaction_value = '" . ($depositvalue + $accountbalance) . "', date =" . date('Y-m-d') . " WHERE bank_account =" . $bankaccount;
			$query = $this -> db -> query($sqlupdatepartakings);

			$this -> load -> database();
			$updateIncomeSql = "UPDATE transactions SET identifier = 0 WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account')";
			$updateIncomeQuery = $this -> db -> query($updateIncomeSql);
		}

		redirect("journal_entries/balancesheets/".$limit);
	}

	public function getCashBook($bankid, $transactionvalue,$limit) {
		//incomes//
		$this -> load -> database();
		$incometotalsql = "SELECT SUM(account_affected_2_amount) AS Total FROM transactions WHERE account_affected_2 IN (SELECT name FROM accounts WHERE type = 'Income Account') AND identifier = 1";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['incomeTotal'] = $incomeTotal[0];

		$data['limit'] = $limit;
		$data['bankid'] = $bankid;
		$data['transactionvalue'] = $transactionvalue;

		$data['cashbookdata'] = Transactions::cashbook($bankid);
		$data['title'] = "Cashbook Information";
		$data['content_view'] = "cashbook_v";
		$this -> base_params($data);
	}

	public function journals($account) {
		$this -> load -> database();
		$incometotalsql = "SELECT * FROM transactions WHERE account_affected_1 LIKE '%$account%' OR account_affected_2 LIKE '%$account%'";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['transaction'] = $incomeTotal;
		$data['account'] = $account;
		$data['title'] = "Transaction Information";
		$data['content_view'] = "journals_v";
		$this -> base_params($data);

	}

	public function journals_($account) {
		$this -> load -> database();
		$incometotalsql = "SELECT * FROM transactions WHERE account_affected_1 LIKE '%$account%' OR account_affected_2 LIKE '%$account%'";
		$incomeTotalQuery = $this -> db -> query($incometotalsql);
		$incomeTotal = $incomeTotalQuery -> result();
		$data['transaction'] = $incomeTotal;
		$data['account'] = $account;
		$data['title'] = "Transaction Information";
		$data['content_view'] = "journals_v_";
		$this -> base_params($data);

	}


	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
