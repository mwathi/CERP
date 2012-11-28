<?php

class User_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data = array();
        $data['module_view'] = "users_v";
        $data['user_details'] = Users::getAll();
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['membership_data'] = Membership::getAll();
        $data['title'] = "User Management::Add New User";
        $data['quick_link'] = "new_user";
        $data['module_view'] = "add_users_view";
        $this -> base_params($data);
    }

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from users where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("user_management/listing", "refresh");
    }//end save

    public function register() {
        $data['title'] = "Registration";
        $this -> load -> view('registration_view', $data);
    }//end save

    public function edit_user($id) {
        $user = Users::getUsers($id);
//        $data['membership_data'] = Membership::getAll();
        $data['users'] = $user[0];
        $data['title'] = "User Management";
        $data['module_view'] = "add_users_view";
        $data['quick_link'] = "new_user";
        $this -> base_params($data);
    }

    public function save() {
        $user_id = $this -> input -> post("user_id");
        //$membership = $this -> input -> post("membership");
        $username = $this -> input -> post("username");
        $password = '123456';
        $name = $this -> input -> post("name");
        $email = $this -> input -> post("email");

        if (strlen($user_id) > 0) {
            $user = Users::getUsers($user_id);
            $user = $user[0];
        } else {
            $user = new Users();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> add();
        } else {
            $user -> Name = $name;
            //$user -> Membership = $membership;
            $user -> Username = $username;
            $user -> Email = $email;
            $user -> Password = md5($password);

            $user -> save();

            /*$this -> load -> database();
            $sql = 'update businesses set business_member = '.$membership.' where owner =' . $user_id . ' ';
            $query = $this -> db -> query($sql);*/
            
            redirect("user_management/listing");
        }//end else

    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('name', 'Full Name', 'trim|required|min_length[2]|max_length[25]');
        $this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[25]');
        $this -> form_validation -> set_rules('email', 'User Email Address', 'trim|valid_email|required');
        return $this -> form_validation -> run();
    }//end validate_submissionis

    public function saveSelf() {
        $valid = $this -> _validate_self_submission();
        if ($valid == false) {
            $this -> load -> view('registration_view');
        } else {
            $username = $this -> input -> post("username");
            $password = $this -> input -> post("password");
            $name = $this -> input -> post("name");
            $email = $this -> input -> post("email");
            $email_confirm = $this -> input -> post("email_confirm");

            $user = new Users();
            $user -> Name = $name;
            $user -> Username = $username;
            $user -> Email = $email;
            $user -> Password = $password;

            $user -> save();
            redirect("login");
        }//end else
    }//end save

    private function _validate_self_submission() {
        $this -> form_validation -> set_rules('name', 'Full Name', 'trim|required|min_length[2]|max_length[25]');
        $this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[25]|is_unique[users.username]');
        $this -> form_validation -> set_rules('email', 'User Email Address', 'trim|valid_email|required|is_unique[users.email]');
        $this -> form_validation -> set_rules('email_confirm', 'Email Address Confirmation', 'trim|valid_email|required|matches[email_confirm]');
        return $this -> form_validation -> run();
    }//end validate_submissionis

    public function base_params($data) {
        $data['userstuff'] = $this -> session -> userdata('username');
        $data['title'] = "User Management";
        $data['styles'] = array("jquery-ui.css");
        $data['scripts'] = array("jquery-ui.js");
        $data['quick_link'] = "users";
        $data['content_view'] = "admin_view";        
        if ($data['userstuff'] != "matthawi") {
            $this -> load -> view('restricted_v');
        } else {
            $this -> load -> view('admin_template', $data);
        }
    }//end base_params

}//end class
