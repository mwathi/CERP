<?php
class Benefit_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['benefits'] = Benefits::getAll();
        $data['title'] = "Benefits Management::All Benefits";
        $data['content_view'] = "benefits_v";
        $this -> base_params($data);
    }//end listing

    public function relief_listing() {
        $data['reliefs'] = Reliefs::getAll();
        $data['title'] = "Relief Management::All Reliefs";
        $data['content_view'] = "reliefs_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['title'] = "Benefits Management::Add New Benefit";
        $data['quick_link'] = "new_benefit";
        $data['content_view'] = "add_benefit_v";
        $this -> base_params($data);
    }
    
    public function addRelief() {
        $data['title'] = "Relief Management::Add New Relief";
        $data['content_view'] = "add_relief_v";
        $this -> base_params($data);
    }
    

    public function save() {
        $benefit_name = $this -> input -> post("benefit_name");
        $description = $this -> input -> post("description");
        $benefit_id = $this -> input -> post("benefit_id");
        $rate = $this -> input -> post("rate");

        if (strlen($benefit_id) > 0) {
            $benefit = Benefits::getBenefit($benefit_id);
            $benefit = $benefit[0];

        } else {
            $benefit = new Benefits();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $benefit -> Name = $benefit_name;
            $benefit -> Description = $description;
            $benefit -> Rate = $rate;

            $benefit -> save();
            redirect("benefit_management/listing");
        }//end else
    }//end save

    public function saveRelief() {
        $relief_name = $this -> input -> post("relief_name");
        $description = $this -> input -> post("description");
        $relief_id = $this -> input -> post("relief_id");
        $rate = $this -> input -> post("rate");

        if (strlen($relief_id) > 0) {
            $relief = Reliefs::getRelief($relief_id);
            $relief = $relief[0];

        } else {
            $relief = new Reliefs();
        }

        $valid = $this -> _validate__relief_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $relief -> Name = $relief_name;
            $relief -> Description = $description;
            $relief -> Rate = $rate;

            $relief -> save();
            redirect("benefit_management/relief_listing");
        }//end else
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('benefit_name', 'Benefit Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    private function _validate__relief_submission() {
        $this -> form_validation -> set_rules('relief_name', 'Relief Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from benefits  where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("benefit_management/listing", "refresh");
    }//end save

    public function deleteRelief($id) {
        $this -> load -> database();
        $sql = 'delete from reliefs  where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("benefit_management/relief_listing", "refresh");
    }//end save

    public function edit_benefit($id) {
        $benefit = Benefits::getBenefit($id);
        $data['benefit'] = $benefit[0];
        $data['title'] = "Benefit Management";
        $data['content_view'] = "add_benefit_v";
        $data['quick_link'] = "new_benefit";
        $this -> base_params($data);
    }

    public function edit_relief($id) {
        $relief = Reliefs::getRelief($id);
        $data['relief'] = $relief[0];
        $data['title'] = "Relief Management";
        $data['content_view'] = "add_relief_v";
        $data['quick_link'] = "new_relief";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
