<?php
class Employer_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['employers'] = Employers::getAll();
        $data['title'] = "Employer Management::All Employers";
        $data['content_view'] = "employers_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['title'] = "Employer Management::Add New Employer";
        $data['quick_link'] = "new_employer";
        $data['content_view'] = "add_employers_v";
        $this -> base_params($data);
		}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function save() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $employer_name = $this -> input -> post("employer_name");
        $company = $this -> input -> post("company");
        $employer_id = $this -> input -> post("employer_id");        

        if (strlen($employer_id) > 0) {
            $employer = Employers::getEmployer($employer_id);
            $employer = $employer[0];

        } else {
            $employer = new Employers();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $employer -> Employer_Name = $employer_name;       
            $employer -> Company = $company; 

            $employer -> save();
            redirect("employer_management/listing");
        }//end else
        }else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('employer_name', 'Employer Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function delete($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'delete from employers where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("employer_management/listing", "refresh");
		}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function edit_employer($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $employer = Employers::getEmployer($id);
        $data['employer'] = $employer[0];
        $data['title'] = "Employer Management";
        $data['content_view'] = "add_employers_v";
        $data['quick_link'] = "new_employer";
        $this -> base_params($data);
		}else{
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
