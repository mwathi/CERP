<?php
class Supplier_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['suppliers'] = Suppliers::getAll();
		$data['title'] = "Supplier Management::All Suppliers";
		$data['content_view'] = "suppliers_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$data['title'] = "Suppliers Management::Add New Supplier";
			$data['quick_link'] = "new_supplier";
			$data['content_view'] = "add_supplier_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$supplier_id = $this -> input -> post("supplier_id");
			$company_name = $this -> input -> post("company_name");
			$email = $this -> input -> post("email");
			$phone = $this -> input -> post("phone");
			$address = $this -> input -> post("address");
			$city = $this -> input -> post("city");
			$zip = $this -> input -> post("zip");
			$contact_name = $this -> input -> post("contact_name");
			$contact_phone = $this -> input -> post("contact_phone");

			if (strlen($supplier_id) > 0) {
				$supplier = Suppliers::getSupplier($supplier_id);
				$supplier = $supplier[0];

			} else {
				$supplier = new Suppliers();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> listing();
			} else {
				$supplier -> Company_Name = $company_name;
				$supplier -> Email = $email;
				$supplier -> Phone = $phone;
				$supplier -> Address = $address;
				$supplier -> City = $city;
				$supplier -> Zip = $zip;
				$supplier -> Contact_Name = $contact_name;
				$supplier -> Contact_Phone = $contact_phone;
				$supplier -> save();
				redirect("supplier_management/listing");
			}//end else
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from suppliers where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("supplier_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function edit_supplier($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$supplier = Suppliers::getSupplier($id);
			$data['supplier'] = $supplier[0];
			$data['title'] = "Supplier Management";
			$data['content_view'] = "add_supplier_v";
			$data['quick_link'] = "new_supplier";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	private function _validate_submission() {
		$this -> form_validation -> set_rules('company_name', 'Company Name', 'trim|required|min_length[1]');
		return $this -> form_validation -> run();
	}//end validate_submission

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
