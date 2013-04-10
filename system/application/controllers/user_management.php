<?php

class User_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data = array();
		$data['content_view'] = "users_v";
		$data['user_details'] = Users::getAll();
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$data['title'] = "User Management::Add New User";
			$data['quick_link'] = "new_user";
			$data['content_view'] = "add_users_view";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from users where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("user_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function edit_user($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$user = Users::getUsers($id);
			//        $data['membership_data'] = Membership::getAll();
			$data['users'] = $user[0];
			$data['title'] = "User Management";
			$data['content_view'] = "add_users_view";
			$data['quick_link'] = "new_user";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$user_id = $this -> input -> post("user_id");
			$username = $this -> input -> post("username");
			$password = md5('123456');
			$name = $this -> input -> post("name");
			$email = $this -> input -> post("email");

			if (strlen($user_id) > 0) {
				$user = Users::getUsers($user_id);
				$user = $user[0];
			} else {
				$user = new Users();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> add();
			} else {
				$user -> Name = $name;
				$user -> Username = $username;
				$user -> Email = $email;
				$user -> Password = md5($password);

				$user -> save();
				redirect("user_management/listing");
			}//end else
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	private function _validate_submission() {
		$this -> form_validation -> set_rules('name', 'Full Name', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('email', 'User Email Address', 'trim|valid_email|required');
		return $this -> form_validation -> run();
	}//end validate_submissionis

	public function base_params($data) {
		$data['userstuff'] = $this -> session -> userdata('username');
		$data['title'] = "User Management";
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "users";
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
		/*if ($data['userstuff'] != "matthawi") {
		 $this -> load -> view('restricted_v');
		 } else {
		 $this -> load -> view('admin_template', $data);
		 }*/
	}//end base_params

}//end class
