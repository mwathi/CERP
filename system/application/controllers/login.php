<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller{
     
    function __construct(){
        parent::__construct();
    }
     
     public function index($msg = NULL){
        $data['msg'] = $msg;
        $data['title'] = "Church ERP Login Page";
        $data['content_view'] = 'login_view';
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js"); 
        $this->load->view('login_template', $data);
    }
     public function process(){
        $this->load->model('login_model');        
        $result = $this->login_model->validate();
        if(!$result){
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            if($this -> session -> userdata('username') == "dmwathi"){
            redirect('flock_management');
            }
            else{
                redirect('account_management');
            }
        }       
    }
}
?>