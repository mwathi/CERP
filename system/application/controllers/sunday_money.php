<?php
class Sunday_Money extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['sunday'] = Sunday::getAll();
		$data['title'] = "Tithes and Offerings";
		$data['content_view'] = "sundays_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$partakings = Partakings::getAll();
			$data['partakings'] = $partakings[0];
			$data['title'] = "Tithes and Offerings";
			$data['quick_link'] = "new_tithe";
			$data['content_view'] = "add_titheoffering_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function add_cheque_tithe() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			//load up values for the drop down for banks from registered data, and facilitate ajax request
			$this -> load -> database();
			$registeredBanks = "SELECT bank,account_name FROM church_particulars";
			$query = $this -> db -> query($registeredBanks);
			$transaction = $query -> result();
			$data['registeredbanks'] = $transaction;

			$data['banks'] = Banks::getAll();
			$data['title'] = "Tithes and Offerings";
			$data['content_view'] = "add_tithe_cheque";

			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		error_reporting(E_ALL ^ E_NOTICE);
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$thousandyouth = $this -> input -> post("1000youth");
			$fivehundredyouth = $this -> input -> post("500youth");
			$twohundredyouth = $this -> input -> post("200youth");
			$hundredyouth = $this -> input -> post("100youth");
			$fiftyyouth = $this -> input -> post("50youth");
			$twentyyouth = $this -> input -> post("20youth");
			$tenyouth = $this -> input -> post("10youth");
			$fiveyouth = $this -> input -> post("5youth");
			$oneyouth = $this -> input -> post("1youth");

			$thousandteens = $this -> input -> post("1000teens");
			$fivehundredteens = $this -> input -> post("500teens");
			$twohundredteens = $this -> input -> post("200teens");
			$hundredteens = $this -> input -> post("100teens");
			$fiftyteens = $this -> input -> post("50teens");
			$twentyteens = $this -> input -> post("20teens");
			$tenteens = $this -> input -> post("10teens");
			$fiveteens = $this -> input -> post("5teens");
			$oneteens = $this -> input -> post("1teens");

			$thousandsundayschool = $this -> input -> post("1000sundayschool");
			$fivehundredsundayschool = $this -> input -> post("500sundayschool");
			$twohundredsundayschool = $this -> input -> post("200sundayschool");
			$hundredsundayschool = $this -> input -> post("100sundayschool");
			$fiftysundayschool = $this -> input -> post("50sundayschool");
			$twentysundayschool = $this -> input -> post("20sundayschool");
			$tensundayschool = $this -> input -> post("10sundayschool");
			$fivesundayschool = $this -> input -> post("5sundayschool");
			$onesundayschool = $this -> input -> post("1sundayschool");

			$thousandenglishservice = $this -> input -> post("1000englishservice");
			$fivehundredenglishservice = $this -> input -> post("500englishservice");
			$twohundredenglishservice = $this -> input -> post("200englishservice");
			$hundredenglishservice = $this -> input -> post("100englishservice");
			$fiftyenglishservice = $this -> input -> post("50englishservice");
			$twentyenglishservice = $this -> input -> post("20englishservice");
			$tenenglishservice = $this -> input -> post("10englishservice");
			$fiveenglishservice = $this -> input -> post("5englishservice");
			$oneenglishservice = $this -> input -> post("1englishservice");

			$thousandswahiliservice = $this -> input -> post("1000swahiliservice");
			$fivehundredswahiliservice = $this -> input -> post("500swahiliservice");
			$twohundredswahiliservice = $this -> input -> post("200swahiliservice");
			$hundredswahiliservice = $this -> input -> post("100swahiliservice");
			$fiftyswahiliservice = $this -> input -> post("50swahiliservice");
			$twentyswahiliservice = $this -> input -> post("20swahiliservice");
			$tenswahiliservice = $this -> input -> post("10swahiliservice");
			$fiveswahiliservice = $this -> input -> post("5swahiliservice");
			$oneswahiliservice = $this -> input -> post("1swahiliservice");

			$thousandmonthlypledge = $this -> input -> post("1000monthlypledge");
			$fivehundredmonthlypledge = $this -> input -> post("500monthlypledge");
			$twohundredmonthlypledge = $this -> input -> post("200monthlypledge");
			$hundredmonthlypledge = $this -> input -> post("100monthlypledge");
			$fiftymonthlypledge = $this -> input -> post("50monthlypledge");
			$twentymonthlypledge = $this -> input -> post("20monthlypledge");
			$tenmonthlypledge = $this -> input -> post("10monthlypledge");
			$fivemonthlypledge = $this -> input -> post("5monthlypledge");
			$onemonthlypledge = $this -> input -> post("1monthlypledge");

			$thousandthanksgiving = $this -> input -> post("1000thanksgiving");
			$fivehundredthanksgiving = $this -> input -> post("500thanksgiving");
			$twohundredthanksgiving = $this -> input -> post("200thanksgiving");
			$hundredthanksgiving = $this -> input -> post("100thanksgiving");
			$fiftythanksgiving = $this -> input -> post("50thanksgiving");
			$twentythanksgiving = $this -> input -> post("20thanksgiving");
			$tenthanksgiving = $this -> input -> post("10thanksgiving");
			$fivethanksgiving = $this -> input -> post("5thanksgiving");
			$onethanksgiving = $this -> input -> post("1thanksgiving");

			$thousandtithe = $this -> input -> post("1000tithe");
			$fivehundredtithe = $this -> input -> post("500tithe");
			$twohundredtithe = $this -> input -> post("200tithe");
			$hundredtithe = $this -> input -> post("100tithe");
			$fiftytithe = $this -> input -> post("50tithe");
			$twentytithe = $this -> input -> post("20tithe");
			$tentithe = $this -> input -> post("10tithe");
			$fivetithe = $this -> input -> post("5tithe");
			$onetithe = $this -> input -> post("1tithe");
			$opening_balance = $this -> input -> post("opening_balance");

			$cashorcheque = $this -> input -> post("cashorcheque");
			$bank = $this -> input -> post("bank");
			$amount = $this -> input -> post("amount");
			$cheque_number = $this -> input -> post("cheque_number");
			$drawer = $this -> input -> post("drawer");

			//values posted from ajax and bank details
			$bank_related_account_credited = $this -> input -> post("bank_related_account_credited");
			$account_balance = $this -> input -> post("account_balance");

			$date = date('Y-m-d');

			$sunday = new Sunday();

			$sunday -> Thousand_Youth = $thousandyouth;
			$sunday -> Five_Hundred_Youth = $fivehundredyouth;
			$sunday -> Two_Hundred_Youth = $twohundredyouth;
			$sunday -> Hundred_Youth = $hundredyouth;
			$sunday -> Fifty_Youth = $fiftyyouth;
			$sunday -> Twenty_Youth = $twentyyouth;
			$sunday -> Ten_Youth = $tenyouth;
			$sunday -> Five_Youth = $fiveyouth;
			$sunday -> One_Youth = $oneyouth;

			$sunday -> Thousand_Teens = $thousandteens;
			$sunday -> Five_Hundred_Teens = $fivehundredteens;
			$sunday -> Two_Hundred_Teens = $twohundredteens;
			$sunday -> Hundred_Teens = $hundredteens;
			$sunday -> Fifty_Teens = $fiftyteens;
			$sunday -> Twenty_Teens = $twentyteens;
			$sunday -> Ten_Teens = $tenteens;
			$sunday -> Five_Teens = $fiveteens;
			$sunday -> One_Teens = $oneteens;

			$sunday -> Thousand_Sunday_School = $thousandsundayschool;
			$sunday -> Five_Hundred_Sunday_School = $fivehundredsundayschool;
			$sunday -> Two_Hundred_Sunday_School = $twohundredsundayschool;
			$sunday -> Hundred_Sunday_School = $hundredsundayschool;
			$sunday -> Fifty_Sunday_School = $fiftysundayschool;
			$sunday -> Twenty_Sunday_School = $twentysundayschool;
			$sunday -> Ten_Sunday_School = $tensundayschool;
			$sunday -> Five_Sunday_School = $fivesundayschool;
			$sunday -> One_Sunday_School = $onesundayschool;

			$sunday -> Thousand_English_Service = $thousandenglishservice;
			$sunday -> Five_Hundred_English_Service = $fivehundredenglishservice;
			$sunday -> Two_Hundred_English_Service = $twohundredenglishservice;
			$sunday -> Hundred_English_Service = $hundredenglishservice;
			$sunday -> Fifty_English_Service = $fiftyenglishservice;
			$sunday -> Twenty_English_Service = $twentyenglishservice;
			$sunday -> Ten_English_Service = $tenenglishservice;
			$sunday -> Five_English_Service = $fiveenglishservice;
			$sunday -> One_English_Service = $oneenglishservice;

			$sunday -> Thousand_Swahili_Service = $thousandswahiliservice;
			$sunday -> Five_Hundred_Swahili_Service = $fivehundredswahiliservice;
			$sunday -> Two_Hundred_Swahili_Service = $twohundredswahiliservice;
			$sunday -> Hundred_Swahili_Service = $hundredswahiliservice;
			$sunday -> Fifty_Swahili_Service = $fiftyswahiliservice;
			$sunday -> Twenty_Swahili_Service = $twentyswahiliservice;
			$sunday -> Ten_Swahili_Service = $tenswahiliservice;
			$sunday -> Five_Swahili_Service = $fiveswahiliservice;
			$sunday -> One_Swahili_Service = $oneswahiliservice;

			$sunday -> Thousand_Monthly_Pledge = $thousandmonthlypledge;
			$sunday -> Five_Hundred_Monthly_Pledge = $fivehundredmonthlypledge;
			$sunday -> Two_Hundred_Monthly_Pledge = $twohundredmonthlypledge;
			$sunday -> Hundred_Monthly_Pledge = $hundredmonthlypledge;
			$sunday -> Fifty_Monthly_Pledge = $fiftymonthlypledge;
			$sunday -> Twenty_Monthly_Pledge = $twentymonthlypledge;
			$sunday -> Ten_Monthly_Pledge = $tenmonthlypledge;
			$sunday -> Five_Monthly_Pledge = $fivemonthlypledge;
			$sunday -> One_Monthly_Pledge = $onemonthlypledge;

			$sunday -> Thousand_Thanksgiving = $thousandthanksgiving;
			$sunday -> Five_Hundred_Thanksgiving = $fivehundredthanksgiving;
			$sunday -> Two_Hundred_Thanksgiving = $twohundredthanksgiving;
			$sunday -> Hundred_Thanksgiving = $hundredthanksgiving;
			$sunday -> Fifty_Thanksgiving = $fiftythanksgiving;
			$sunday -> Twenty_Thanksgiving = $twentythanksgiving;
			$sunday -> Ten_Thanksgiving = $tenthanksgiving;
			$sunday -> Five_Thanksgiving = $fivethanksgiving;
			$sunday -> One_Thanksgiving = $onethanksgiving;

			$sunday -> Thousand_Tithe = $thousandtithe;
			$sunday -> Five_Hundred_Tithe = $fivehundredtithe;
			$sunday -> Two_Hundred_Tithe = $twohundredtithe;
			$sunday -> Hundred_Tithe = $hundredtithe;
			$sunday -> Fifty_Tithe = $fiftytithe;
			$sunday -> Twenty_Tithe = $twentytithe;
			$sunday -> Ten_Tithe = $tentithe;
			$sunday -> Five_Tithe = $fivetithe;
			$sunday -> One_Tithe = $onetithe;

			$sunday -> Cashorcheque = $cashorcheque;
			$sunday -> Bank = $bank;
			$sunday -> Cheque_Amount = $amount;
			$sunday -> Cheque_Number = $cheque_number;
			$sunday -> Drawer = $drawer;

			$sunday -> Date = $date;

			$sunday -> save();

			if ($cashorcheque == 0) {
				$transaction = new Transactions();
				$cash = $thousandyouth + $fivehundredyouth + $twohundredyouth + $hundredyouth + $fiftyyouth + $twentyyouth + $tenyouth + $fiveyouth + $oneyouth + $thousandteens + $fivehundredteens + $twohundredteens + $hundredteens + $fiftyteens + $twentyteens + $tenteens + $fiveteens + $oneteens + $thousandsundayschool + $fivehundredsundayschool + $twohundredsundayschool + $hundredsundayschool + $fiftysundayschool + $twentysundayschool + $tensundayschool + $fivesundayschool + $onesundayschool + $thousandenglishservice + $fivehundredenglishservice + $twohundredenglishservice + $hundredenglishservice + $fiftyenglishservice + $twentyenglishservice + $tenenglishservice + $fiveenglishservice + $oneenglishservice + $thousandswahiliservice + $fivehundredswahiliservice + $twohundredswahiliservice + $hundredswahiliservice + $fiftyswahiliservice + $twentyswahiliservice + $tenswahiliservice + $fiveswahiliservice + $oneswahiliservice + $thousandmonthlypledge + $fivehundredmonthlypledge + $twohundredmonthlypledge + $hundredmonthlypledge + $fiftymonthlypledge + $twentymonthlypledge + $tenmonthlypledge + $fivemonthlypledge + $onemonthlypledge + $thousandthanksgiving + $fivehundredthanksgiving + $twohundredthanksgiving + $hundredthanksgiving + $fiftythanksgiving + $twentythanksgiving + $tenthanksgiving + $fivethanksgiving + $onethanksgiving + $thousandtithe + $fivehundredtithe + $twohundredtithe + $hundredtithe + $fiftytithe + $twentytithe + $tentithe + $fivetithe + $onetithe;
				$transaction -> Date = date("Y-m-d");
				$transaction -> Account_Affected_1 = "Cash";
				$transaction -> Transaction = "Church contributions dated " . $date;
				$transaction -> Account_Affected_1_Amount = $cash;

				$transaction -> Account_Affected_1_Operation = "Debit";
				$transaction -> Account_Affected_2 = "Offerings";
				$transaction -> Account_Affected_2_Amount = $cash;
				$transaction -> Account_Affected_2_Operation = "Credit";
				$transaction -> Ending_Balance = $opening_balance;
				$transaction -> Identifier = 1;
				$transaction -> save();
			} else if ($cashorcheque == 1) {
				$transaction = new Transactions();
				$transaction -> Date = date("Y-m-d");
				$transaction -> Account_Affected_1 = $bank_related_account_credited;
				$transaction -> Transaction = "Church cheque contributions dated " . $date;
				$transaction -> Account_Affected_1_Amount = $amount;

				$transaction -> Account_Affected_1_Operation = "Debit";
				$transaction -> Account_Affected_2 = "Cash";
				$transaction -> Account_Affected_2_Amount = $amount;
				$transaction -> Account_Affected_2_Operation = "Credit";
				$transaction -> Ending_Balance = $amount + $account_balance;
				$transaction -> Identifier = 1;
				$transaction -> save();

				$this -> load -> database();
				$sqlupdatepartakings = "UPDATE partakings SET bank_account = '" . $bank_related_account_credited . "', 
										transaction_value = '" . ($amount + $account_balance) . "', date =" . date('Y-m-d') . " WHERE bank_account =" . $bank_related_account_credited;
				$query = $this -> db -> query($sqlupdatepartakings);

			}
			redirect("sunday_money/listing");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from assets where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("asset_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function view_sunday($id, $date) {
		$sunday = Sunday::getSunday($id);
		$totse = Sunday::getSundayTotal($date, $id);
		$data['sunday'] = $sunday[0];
		$data['totse'] = $totse[0];
		$data['title'] = "Tithes and Offerings";
		$data['content_view'] = "sunday_management_v";
		$data['quick_link'] = "";
		$this -> base_params($data);
	}

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css", "SpryAccordion.css");
		$data['scripts'] = array("jquery-ui.js", "SpryAccordion.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
