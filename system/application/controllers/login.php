<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller{
     
    function __construct(){
        parent::__construct();
    }
     
     public function index($msg = NULL){
        $data['msg'] = $msg;
        $data['title'] = "Rwanda Business Directory Login Page";
        $data['content_view'] = 'login_view'; 
        $this->load->view('template', $data);
    }
     public function process(){
        $this->load->model('login_model');        
        $result = $this->login_model->validate();
        if(!$result){
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            if($this -> session -> userdata('username') == "matthawi"){
            redirect('business_management');
            }
            else{
                redirect('personal_controller/page');
            }
        }       
    }
}
?>