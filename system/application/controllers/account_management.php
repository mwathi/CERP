<?php
class Account_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['accounts'] = Accounts::getAll();
        $data['title'] = "Accounts Management::All Accounts";
        $data['content_view'] = "accounts_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['title'] = "Accounts Management::Add New Account";
        $data['quick_link'] = "new_account";
        $data['content_view'] = "account_creation";
        $this -> base_params($data);
		}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function save() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $account_id = $this -> input -> post("account_id");
        $account_name = $this -> input -> post("account_name");
        $account_type = $this -> input -> post("account_type");
        $description = $this -> input -> post("description");
        

        if (strlen($account_id) > 0) {
            $account = Accounts::getAccount($account_id);
            $account = $account[0];

        } else {
            $account = new Accounts();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $account -> Name = $account_name;
            $account -> Type = $account_type;
            $account -> Description = $description;
            $account -> save();
            redirect("account_management/listing");
        }//end else
        }else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function delete($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'delete from accounts where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("account_management/listing", "refresh");
        }else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function edit_account($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){        
        $account = Accounts::getAccount($id);
        $data['account'] = $account[0];
        $data['title'] = "Account Management";
        $data['content_view'] = "account_creation";
        $data['quick_link'] = "new_account";
        $this -> base_params($data);
		 }else{
			$this -> load -> view('restricted_v');
		}
    }

    private function _validate_submission() {
        $this -> form_validation -> set_rules('account_name', 'Account Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
