<?php
class Group_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['groups'] = Groups::getAll();
		$data['title'] = "Group Management::All Groups";
		$data['content_view'] = "groups_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$data['title'] = "Group Management::Add New Group";
			$data['quick_link'] = "new_group";
			$data['content_view'] = "add_group_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$group_name = $this -> input -> post("group_name");
			$description = $this -> input -> post("description");
			$group_id = $this -> input -> post("group_id");

			if (strlen($group_id) > 0) {
				$group = Groups::getGroup($group_id);
				$group = $group[0];

			} else {
				$group = new Groups();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> listing();
			} else {
				$group -> Group_Name = $group_name;
				$group -> Description = $description;

				$group -> save();
				redirect("group_management/listing");
			}//end else
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	private function _validate_submission() {
		$this -> form_validation -> set_rules('group_name', 'Group Name', 'trim|required|min_length[1]');
		return $this -> form_validation -> run();
	}//end validate_submission

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from groups where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("group_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function edit_group($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$group = Groups::getGroup($id);
			$data['group'] = $group[0];
			$data['title'] = "Group Management";
			$data['content_view'] = "add_group_v";
			$data['quick_link'] = "new_group";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
