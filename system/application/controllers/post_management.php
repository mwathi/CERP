<?php
class Post_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['posts'] = Posts::getAll();
		$data['title'] = "Post Management::All Posts";
		$data['content_view'] = "posts_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$data['title'] = "Posts Management::Add New Post";
			$data['quick_link'] = "new_post";
			$data['content_view'] = "add_post_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$post_id = $this -> input -> post("post_id");
			$post_name = $this -> input -> post("post_name");
			$pay = $this -> input -> post("pay");
			$description = $this -> input -> post("description");

			if (strlen($post_id) > 0) {
				$post = Posts::getPost($post_id);
				$post = $post[0];

			} else {
				$post = new Posts();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> listing();
			} else {
				$post -> Name = $post_name;
				$post -> Pay = $pay;
				$post -> Description = $description;

				$post -> save();
				redirect("post_management/listing");
			}//end else
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	private function _validate_submission() {
		$this -> form_validation -> set_rules('post_name', 'Post Name', 'trim|required|min_length[1]');
		return $this -> form_validation -> run();
	}//end validate_submission

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from posts where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("post_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function edit_post($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$post = Posts::getPost($id);
			$data['post'] = $post[0];
			$data['title'] = "Post Management";
			$data['content_view'] = "add_post_v";
			$data['quick_link'] = "new_post";
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
