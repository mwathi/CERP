<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home_Controller extends Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> home();
	}

	public function home() {
		$data['title'] = "The Official Church ERP";
		$data['content_view'] = "home_v";
		$data['link'] = "home";
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view("template", $data);
	}

	public function log_out() {
		$this -> session -> sess_destroy();
		redirect('login');
	}

}
