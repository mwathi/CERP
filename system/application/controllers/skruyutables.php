<?php
class Skruyutables extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$data['title'] = "Truncate all tables of import";
			$data['content_view'] = "skruyu_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}
	
	public function delete(){
			$this -> load -> database();
			
			$sqlassets = 'delete from assets';
			$assetsquery = $this -> db -> query($sqlassets);
			
			$sqlbalances = 'delete from balances';
			$balancessquery = $this -> db -> query($sqlbalances);
			
			$sqlcheques = 'delete from cheques';
			$chequesquery = $this -> db -> query($sqlcheques);
			
			$sqlchequecontributions = 'delete from cheque_contributions';
			$chequecontributionsquery = $this -> db -> query($sqlchequecontributions);
			
			$sqlchurch_particulars = 'delete from church_particulars';
			$church_particularsquery = $this -> db -> query($sqlchurch_particulars);
			
			$sqlcontributions = 'delete from contributions';
			$contributionsquery = $this -> db -> query($sqlcontributions);
			
			$sqlpartakings= 'delete from partakings';
			$partakingsquery = $this -> db -> query($sqlpartakings);
			
			$sqlpayroll = 'delete from payroll';
			$payrollquery = $this -> db -> query($sqlpayroll);
			
			$sqlpledges = 'delete from pledges';
			$pledgesquery = $this -> db -> query($sqlpledges);
			
			$sqlsunday = 'delete from sunday';
			$sundayquery = $this -> db -> query($sqlsunday);
			
			$sqltransactions= 'delete from transactions';
			$transactionsquery = $this -> db -> query($sqltransactions);
			
			$data['content_view'] = "tablesdeleted";
			$data['title'] = "Tables truncated sir!";
			$this -> base_params($data);
	}
	
	public function base_params($data){
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}

}//end class
