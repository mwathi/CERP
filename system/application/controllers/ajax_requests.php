<?php
Class Ajax_Requests extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> index();
	}//end index

	public function getAccountBalance() {
		$registered_banks = $this -> input -> post('registered_banks', TRUE);
		$accountsql = Church_Particulars::getOpeningBalance($registered_banks);
		$json_array = array();
		foreach ($accountsql as $row)
			array_push($json_array, $row -> Opening_Balance);

		echo json_encode($json_array);
	}//end gab

}
