<?php
class Pledge_Controller extends Controller {
    function __construct() {
        parent::__construct();
        $this -> load -> library("pagination");
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function causelisting() {
        $data['title'] = "Causes";
        $data['causedata'] = Causes::getAll();
        $data['content_view'] = "causes_v";
        $this -> base_params($data);
    }//end listing

    public function makepledge() {
        $data['title'] = "Make a Pledge";
        $data['causedata'] = Causes::getAll();
        $data['content_view'] = "make_pledge_v";
        $this -> base_params($data);
    }//end listing

    function suggestions() {
        $this -> load -> model('Flock');
        $q = strtolower($_GET['term']);
        $this -> Flock -> get_name($q);
    }

    public function add() {
        $data['title'] = "Causes::Add New Cause";
        $data['quick_link'] = "new_cause";
        $data['content_view'] = "add_causes_v";
        $this -> base_params($data);
    }

    public function savecause() {
        $cause_id = $this -> input -> post("cause_id");
        $cause_name = $this -> input -> post("cause_name");
        $description = $this -> input -> post("description");
        $deadline = $this -> input -> post("deadline");

        if (strlen($cause_id) > 0) {
            $cause = Causes::getCause($cause_id);
            $cause = $cause[0];
        } else {
            $cause = new Causes();
        }

        $cause -> Deadline = $deadline;
        $cause -> Date_Created = date('Y-m-d');
        $cause -> Description = $description;
        $cause -> Name = $cause_name;
        $cause -> save();
        redirect("pledge_controller/causelisting");
    }//end save

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from flock where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("flock_management/listing", "refresh");
    }//end save

    public function edit_cause($id) {
        $cause = Flock::getcause($id);
        $data['parents'] = Flock::getParents();
        $data['cause_groups'] = Groups::getAll();
        $data['cause'] = $cause[0];
        $data['title'] = "Flock Management";
        $data['content_view'] = "add_flock_v";
        $data['quick_link'] = "new_flock";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
