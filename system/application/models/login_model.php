<?php

class Login_model extends Model{
    function __construct(){
        parent::__construct();
        parent::Model();
        $this -> load -> database();
    }
     
    public function validate(){
        // grab user input
        $username = $this->input->post('username');
        $password = $this->input->post('password');
         
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
         
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'userid' => $row->id,
                    'names' => $row->name,
                    
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>