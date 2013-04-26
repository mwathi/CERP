<?php
class Asset_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['assets'] = Assets::getAll();
		$data['title'] = "Asset Management::All Assets";
		$data['content_view'] = "assets_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			//asset categories or types
			$data['assetes'] = Asset_Types::getAll();
			//TO BE DELETED/
			///
			////
			///
			$partakings = Partakings::getAll();
			$data['partakings'] = $partakings[0];

			//load up values for the drop down for banks from registered data, and facilitate ajax request
			$this -> load -> database();
			$registeredBanks = "SELECT bank,account_name FROM church_particulars";
			$query = $this -> db -> query($registeredBanks);
			$transaction = $query -> result();
			$data['registeredbanks'] = $transaction;

			$data['title'] = "Asset Management::Add New Asset";
			$data['quick_link'] = "new_asset";
			$data['content_view'] = "asset_registration";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$asset_id = $this -> input -> post("asset_id");
			$asset_name = $this -> input -> post("asset_name");

			$asset_class = $this -> input -> post("asset_class");

			$model = $this -> input -> post("model");

			$serial_number = $this -> input -> post("serial_number");
			$location = $this -> input -> post("location");

			$asset_cost = $this -> input -> post("asset_cost");

			$date_purchased = $this -> input -> post("date_purchased");

			$userorassingedto = $this -> input -> post("userorassingedto");
			$supplier_name = $this -> input -> post("supplier_name");
			$supplier_phone = $this -> input -> post("supplier_phone");
			$asset_number = $this -> input -> post("asset_number");
			$useful_life = $this -> input -> post("useful_life");
			$salvage = $this -> input -> post("salvage");

			$description = $this -> input -> post("description");
			$opening_balance = $this -> input -> post("opening_balance");

			//values posted from ajax and bank details
			$bank_related_account_credited = $this -> input -> post("bank_related_account_credited");
			$account_balance = $this -> input -> post("account_balance");

			if (strlen($asset_id) > 0) {
				$asset = Assets::getAsset($asset_id);
				$asset = $asset[0];

			} else {
				$asset = new Assets();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> listing();
			} else {
				$asset -> Name = $asset_name;
				$asset -> Asset_Class = $asset_class;
				$asset -> Asset_Cost = $asset_cost;
				$asset -> Model = $model;

				$asset -> Serial_Number = $serial_number;
				$asset -> Location = $location;
				$asset -> Asset_Cost = $asset_cost;
				$asset -> Date_Purchased = $date_purchased;

				$asset -> User = $userorassingedto;
				$asset -> Supplier_Name = $supplier_name;
				$asset -> Supplier_Phone = $supplier_phone;
				$asset -> Asset_Number = $asset_number;
				$asset -> Useful_Life = $useful_life;
				$asset -> Salvage_Value = $salvage;

				$asset -> Description = $description;

				$asset -> save();

				$remaining_balance = $account_balance - $asset_cost;
				//create general asset account
				$transaction = new Transactions();

				$transaction -> Date = date("Y-m-d");
				$transaction -> Account_Affected_1 = "Fixed Asset";
				$transaction -> Transaction = "Asset Registration: Serial " . $serial_number;
				$transaction -> Account_Affected_1_Amount = $asset_cost;
				$transaction -> Account_Affected_1_Operation = "Debit";
				$transaction -> Account_Affected_2 = $bank_related_account_credited;
				$transaction -> Account_Affected_2_Amount = $asset_cost;
				$transaction -> Account_Affected_2_Operation = "Credit";
				$transaction -> Ending_Balance = $remaining_balance;
				$transaction -> save();

				$this -> load -> database();
				$sqlupdatepartakings = "UPDATE partakings SET bank_account = '".$bank_related_account_credited."', 
										transaction_value = '".$remaining_balance."', date ='". date('Y-m-d') ."' WHERE bank_account =".$bank_related_account_credited;
				$query = $this -> db -> query($sqlupdatepartakings);
				redirect("asset_management/listing");
			}//end else
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

	public function edit_asset($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$partakings = Partakings::getAll();
			$data['partakings'] = $partakings[0];
			$data['assetes'] = Asset_Types::getAll();
			$asset = Assets::getAsset($id);
			$data['asset'] = $asset[0];
			$data['title'] = "Asset Management";
			$data['content_view'] = "asset_registration";
			$data['quick_link'] = "new_asset";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function manage_asset($id) {
		$data['assetes'] = Asset_Types::getAll();
		$asset = Assets::getAsset($id);
		$data['asset'] = $asset[0];
		$data['title'] = "Asset Management";
		$data['content_view'] = "asset_management_v";
		$data['quick_link'] = "manage_asset";
		$this -> base_params($data);
	}

	private function _validate_submission() {
		$this -> form_validation -> set_rules('asset_name', 'Asset Name', 'trim|required|min_length[1]');
		return $this -> form_validation -> run();
	}//end validate_submission

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
