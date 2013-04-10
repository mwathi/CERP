<?php
class Pledge_Controller extends Controller {
    function __construct() {
        parent::__construct();
        $this -> load -> library("pagination");
    }//end constructor

    public function index() {
        $this -> makepledge();
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

    public function receipts() {
        $data['title'] = "Contribution Receipts";
        $data['causedata'] = Contributions::getAll();
        $data['content_view'] = "receipts_v";
        $this -> base_params($data);
    }//end listing

    public function issuereceipt($member_number,$date,$cause) {
        $data['title'] = "Contribution Receipts";
        $causedata = Contributions::getSpecifiedContribution($member_number,$date,$cause);
        $data['causedata'] = $causedata[0];
        $data['content_view'] = "contribution_receipt_v";
        $this -> base_params($data);
    }//end listing

    public function pledgelisting() {
        $data['title'] = "Pledges";
        $data['causedata'] = Pledges::getAllPledgeData();
        $data['content_view'] = "pledge_v";
        $this -> base_params($data);
    }//end listing

    public function makepledge() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['title'] = "Make a Pledge";
        $data['causedata'] = Causes::getAll();
        $data['members'] = Flock::getAll();
        $data['content_view'] = "make_pledge_v";
        $this -> base_params($data);
        		}else{
			$this -> load -> view('restricted_v');
		}
    }//end listing

    public function makecontribution() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['title'] = "Make a Contribution";
        $data['causedata'] = Causes::getAll();
        $partakings = Partakings::getAll();
        $data['partakings'] = $partakings[0];
        $data['members'] = Flock::getAll();
        $data['content_view'] = "make_contribution";
        $this -> base_params($data);
				}else{
			$this -> load -> view('restricted_v');
		}
    }//end listing

    public function add() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['title'] = "Causes::Add New Cause";
        $data['quick_link'] = "new_cause";
        $data['content_view'] = "add_causes_v";
        $this -> base_params($data);
				}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function save() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        //$cause_id = $this -> input -> post("cause_id");
        $pledgecause = $this -> input -> post("pledgecause");
        $pledgemade = $this -> input -> post("pledge");
        $pledgeplan = $this -> input -> post("pledgeplan");
        $pledgename = $this -> input -> post("pledgename");
        $pledgetelephone = $this -> input -> post("pledgetelephone");
        $pledgeaddress = $this -> input -> post("pledgeaddress");
        $pledgeemail = $this -> input -> post("pledgeemail");
        $member_number = $this -> input -> post("member_number");

        $pledge = new Pledges();

        $pledge -> Cause = $pledgecause;
        $pledge -> Member_Number = $member_number;
        $pledge -> Pledge = $pledgemade;
        $pledge -> Pledge_Plan = $pledgeplan;
        $pledge -> Name = $pledgename;
        $pledge -> Telephone = $pledgetelephone;
        $pledge -> Address = $pledgeaddress;
        $pledge -> Email = $pledgeemail;
        $pledge -> save();

        $transaction = new Transactions();

        $transaction -> Date = date("Y-m-d");
        $transaction -> Account_Affected_1 = "Pledges";
        $transaction -> Transaction = "Pledge by " . $pledgename;
        $transaction -> Account_Affected0_1_Amount = $pledgemade;
        $transaction -> Account_Affected_1_Operation = "Debit";
        $transaction -> Account_Affected_2 = "Cash";
        $transaction -> Account_Affected_2_Amount = $pledgemade;
        $transaction -> Account_Affected_2_Operation = "Credit";
        $transaction -> save();

        redirect("pledge_controller/causelisting");
				}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function save_contribution() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $pledgecause = $this -> input -> post("pledgecause");
        $pledge = $this -> input -> post("pledgetobesaved");
        $contribution = $this -> input -> post("contribution");
        $pledgename = $this -> input -> post("pledgename");
        $pledgetelephone = $this -> input -> post("pledgetelephone");
        $pledgeaddress = $this -> input -> post("pledgeaddress");
        $pledgeemail = $this -> input -> post("pledgeemail");
        $member_number = $this -> input -> post("member_number");
        $dateofcontribution = $this -> input -> post("dateofcontribution");
        $opening_balance = $this -> input -> post("opening_balance");

        $contributions = new Contributions();

        $contributions -> Cause = $pledgecause;
        $contributions -> Date_of_Contribution = $dateofcontribution;
        $contributions -> Pledge = $pledge;
        $contributions -> Member_Number = $member_number;
        $contributions -> Contribution_Made = $contribution;
        $contributions -> Name = $pledgename;
        $contributions -> Telephone = $pledgetelephone;
        $contributions -> Address = $pledgeaddress;
        $contributions -> Email = $pledgeemail;
        $contributions -> save();

        $transaction = new Transactions();

        $transaction -> Date = date("Y-m-d");
        $transaction -> Account_Affected_1 = "Cash";
        $transaction -> Transaction = "Contributions dated " . $dateofcontribution . "by " . $pledgename;
        $transaction -> Account_Affected_1_Amount = $contribution;
        $transaction -> Account_Affected_1_Operation = "Debit";
        $transaction -> Account_Affected_2 = "Pledges";
        $transaction -> Account_Affected_2_Amount = $contribution;
        $transaction -> Account_Affected_2_Operation = "Credit";
        $transaction -> Ending_Balance = ($opening_balance + $contribution);
        $transaction -> save();

        $buffer = $opening_balance + $contribution;
        $partakings = new Partakings();
        $partakings -> Transaction_Value = $buffer;
        $partakings -> Date = date('Y-m-d');
        $partakings -> save();

        redirect("pledge_controller/causelisting");
				}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function savecause() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
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
				}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function delete($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'delete from flock where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("flock_management/listing", "refresh");
				}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function edit_cause($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $cause = Causes::getcause($id);
        $data['cause'] = $cause[0];
        $data['title'] = "Flock Management";
        $data['content_view'] = "add_causes_v";
        $data['quick_link'] = "new_cause";
        $this -> base_params($data);
				}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function cause_details($id) {
        $data['causename'] = Causes::getCauseName($id);
        $data['contributions'] = Contributions::getContribution($id);
        $data['causedata'] = Causes::getContribootionTarget($id);
        $data['totalcontribootions'] = Contributions::getTotalContribootions($id);
        $data['title'] = "Pledge Management";
        $data['content_view'] = "manage_causes";
        $this -> base_params($data);
    }

    public function pledge_details($id) {
        $data['pledges'] = Pledges::getPledges($id);
        $data['title'] = "Pledge Management";
        $data['content_view'] = "pledges_made";
        $this -> base_params($data);
    }

    public function member_contribution_details($member_number, $cause_id) {
        $data['contriboot'] = Contributions::getContributionPerMember($cause_id, $member_number);
        $data['causes'] = Causes::getAll();
        $data['contributiondata'] = Contributions::getAllContributions($member_number, $cause_id);
        $data['pledgedata'] = Pledges::getAllPledges($member_number);
        $data['title'] = "Pledge Management";
        $data['content_view'] = "member_contributions_v";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
		$data['username'] = $this -> session -> userdata('names');
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
