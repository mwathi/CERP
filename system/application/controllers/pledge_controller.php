<?php
class Pledge_Controller extends Controller {
    function __construct() {
        parent::__construct();
        $this -> load -> library("pagination");
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function searchPledge($name) {
        if ($this -> input -> post('search')) {
            redirect('/pledge_controller/searchPledge/' . $this -> input -> post('search'));
        }
        $pledgeinfo = Causes::getPledgeInformation($name);
        $data['content_view'] = "find_cause_v";
        $data['pledgeinfo'] = $pledgeinfo;
        $data['title'] = "Church ERP Search Results";
        $this -> load -> view('template', $data);
    }

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

    public function save() {
        //$cause_id = $this -> input -> post("cause_id");
        $smallpledgecause = $this -> input -> post("smallpledgecause");
        $mediumpledgecause = $this -> input -> post("mediumpledgecause");
        $greatpledgecause = $this -> input -> post("greatpledgecause");
        $majorpledgecause = $this -> input -> post("majorpledgecause");

        $smallpledge = $this -> input -> post("smallpledge");
        $mediumpledge = $this -> input -> post("mediumpledge");
        $greatpledge = $this -> input -> post("greatpledge");
        $majorpledge = $this -> input -> post("majorpledge");

        $smallpledgeplan = $this -> input -> post("smallpledgeplan");
        $mediumpledgeplan = $this -> input -> post("mediumpledgeplan");
        $greatpledgeplan = $this -> input -> post("greatpledgeplan");
        $majorpledgeplan = $this -> input -> post("majorpledgeplan");

        //memberdata
        $smallpledgename = $this -> input -> post("smallpledgename");
        $smallpledgetelephone = $this -> input -> post("smallpledgetelephone");
        $smallpledgeaddress = $this -> input -> post("smallpledgeaddress");
        $smallpledgeemail = $this -> input -> post("smallpledgeemail");

        $mediumpledgename = $this -> input -> post("mediumpledgename");
        $mediumpledgetelephone = $this -> input -> post("mediumpledgetelephone");
        $mediumpledgeaddress = $this -> input -> post("mediumpledgeaddress");
        $mediumpledgeemail = $this -> input -> post("mediumpledgeemail");

        $greatpledgename = $this -> input -> post("greatpledgename");
        $greatpledgetelephone = $this -> input -> post("greatpledgetelephone");
        $greatpledgeaddress = $this -> input -> post("greatpledgeaddress");
        $greatpledgeemail = $this -> input -> post("greatpledgeemail");

        $majorpledgename = $this -> input -> post("majorpledgename");
        $majorpledgetelephone = $this -> input -> post("majorpledgetelephone");
        $majorpledgeaddress = $this -> input -> post("majorpledgeaddress");
        $majorpledgeemail = $this -> input -> post("majorpledgeemail");

        if ($smallpledgecause != "" && $smallpledge != "" && $smallpledgeplan != "" && $smallpledgename != "" && $smallpledgetelephone != "" && $smallpledgeaddress != "" && $smallpledgeemail != "") {
            $pledge = new Pledges();

            $pledge -> Cause = $smallpledgecause;
            $pledge -> Small_Pledge = $smallpledge;
            $pledge -> Pledge_Plan = $smallpledgeplan;
            $pledge -> Name = $smallpledgename;
            $pledge -> Telephone = $smallpledgetelephone;
            $pledge -> Address = $smallpledgeaddress;
            $pledge -> Email = $smallpledgeemail;
            $pledge -> save();
            redirect("pledge_controller/causelisting");
        }

        if ($mediumpledgecause != "" && $mediumpledge != "" && $mediumpledgeplan != "" && $mediumpledgename != "" && $mediumpledgetelephone != "" && $mediumpledgeaddress != "" && $mediumpledgeemail != "") {
            $pledge = new Pledges();
            $pledge -> Cause = $mediumpledgecause;
            $pledge -> Medium_Pledge = $mediumpledge;
            $pledge -> Pledge_Plan = $mediumpledgeplan;
            $pledge -> Name = $mediumpledgename;
            $pledge -> Telephone = $mediumpledgetelephone;
            $pledge -> Address = $mediumpledgeaddress;
            $pledge -> Email = $mediumpledgeemail;
            $pledge -> save();
            redirect("pledge_controller/causelisting");
        }

        if ($greatpledgecause != "" && $greatpledge != "" && $greatpledgeplan != "" && $greatpledgename != "" && $greatpledgetelephone != "" && $greatpledgeaddress != "" && $greatpledgeemail) {
            $pledge = new Pledges();
            $pledge -> Cause = $greatpledgecause;
            $pledge -> Great_Pledge = $greatpledge;
            $pledge -> Pledge_Plan = $greatpledgeplan;
            $pledge -> Name = $greatpledgename;
            $pledge -> Telephone = $greatpledgetelephone;
            $pledge -> Address = $greatpledgeaddress;
            $pledge -> Email = $greatpledgeemail;
            $pledge -> save();
            redirect("pledge_controller/causelisting");
        }

        if ($majorpledgecause != "" && $majorpledge != "" && $majorpledgeplan != "" && $majorpledgename != "" && $majorpledgetelephone != "" && $majorpledgeaddress != "" && $majorpledgeemail) {
            $pledge = new Pledges();
            $pledge -> Cause = $majorpledgecause;
            $pledge -> Major_Pledge = $majorpledge;
            $pledge -> Pledge_Plan = $majorpledgeplan;
            $pledge -> Name = $majorpledgename;
            $pledge -> Telephone = $majorpledgetelephone;
            $pledge -> Address = $majorpledgeaddress;
            $pledge -> Email = $majorpledgeemail;
            $pledge -> save();
            redirect("pledge_controller/causelisting");
        }

    }//end save

    public function savecause() {
        $cause_id = $this -> input -> post("cause_id");
        $cause_name = $this -> input -> post("cause_name");
        $description = $this -> input -> post("description");
        $deadline = $this -> input -> post("deadline");
        $target = $this -> input -> post("target");

        if (strlen($cause_id) > 0) {
            $cause = Causes::getCause($cause_id);
            $cause = $cause[0];
        } else {
            $cause = new Causes();
        }

        $cause -> Deadline = $deadline;
        $cause -> Target = $target;
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
        $cause = Causes::getcause($id);
        $data['cause'] = $cause[0];
        $data['title'] = "Flock Management";
        $data['content_view'] = "add_causes_v";
        $data['quick_link'] = "new_cause";
        $this -> base_params($data);
    }

    public function cause_details($id) {
        $data['contribootions'] = Pledges::getContribootions($id);
        $data['causedata'] = Causes::getContribootionTarget($id);
        $data['totalcontribootions'] = Pledges::getTotalContribootions($id);
        $data['title'] = "Pledge Management";
        $data['content_view'] = "manage_causes";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
