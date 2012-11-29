<?php
class Flock_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['members'] = Flock::getAll();
        $data['title'] = "Flock Management::All Flock";
        $data['content_view'] = "flock_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['member_groups'] = Groups::getAll();
        $data['title'] = "Flock Management::Add New Flock";
        $data['quick_link'] = "new_category";
        $data['content_view'] = "add_flock_v";
        $this -> base_params($data);
    }

    public function save() {
        $member_name = $this -> input -> post("member_name");
        $member_group = $this -> input -> post("member_group");
        $member_phone_number = $this -> input -> post("member_phone_number");
        $member_gender = $this -> input -> post("gender");
        $member_id = $this -> input -> post("member_id");
        $date_of_birth = $this -> input -> post("date_of_birth");
        $spouse = $this -> input -> post("spouse");
        $number_of_children = $this -> input -> post("number_of_children");
        $address = $this -> input -> post("address");
        $email = $this -> input -> post("email");

        if (strlen($member_id) > 0) {
            $member = Flock::getMember($member_id);
            $member = $member[0];

        } else {
            $member = new Flock();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $member -> Name = $member_name;
            $member -> Member_Group = $member_group;
            $member -> Phone = $member_phone_number;
            $member -> Gender = $member_gender;
            $member -> Date_of_Birth = $date_of_birth;
            $member -> Spouse = $spouse;
            $member -> Children = $number_of_children;
            $member -> Address = $address;
            $member -> Email = $email;

            $member -> save();
            redirect("flock_management/listing");
        }//end else
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('member_name', 'Member Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from flock where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("flock_management/listing", "refresh");
    }//end save

    public function edit_member($id) {
        $member = Flock::getMember($id);
        $data['member_groups'] = Groups::getAll();
        $data['member'] = $member[0];
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
