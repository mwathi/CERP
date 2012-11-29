<?php
class Employee_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['employees'] = Employee::getAll();
        $data['title'] = "Employee Management::All Employees";
        $data['content_view'] = "employee_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['benefits'] = Benefits::getAll();
        $data['posts'] = Posts::getAll();
        $data['title'] = "Employee Management::Add New Employee";
        $data['quick_link'] = "new_employee";
        $data['content_view'] = "add_employee_v";
        $this -> base_params($data);
    }

    public function save() {
        $employee_name = $this -> input -> post("employee_name");
        $phone_number = $this -> input -> post("phone_number");
        $gender = $this -> input -> post("gender");
        $employee_id = $this -> input -> post("employee_id");
        $date_of_birth = $this -> input -> post("date_of_birth");
        $address = $this -> input -> post("address");

        if (strlen($employee_id) > 0) {
            $employee = Employee::getEmployee($employee_id);
            $employee= $employee[0];

        } else {
            $employee= new Employee();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $employee -> Name = $employee_name;       
            $employee -> Phone = $phone_number;
            $employee -> Gender = $gender;
            $employee -> Date_of_Birth = $date_of_birth;      
            $employee -> Address = $address;    

            $employee -> save();
            redirect("employee_management/listing");
        }//end else
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('employee_name', 'Employee Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from employee  where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("employee_management/listing", "refresh");
    }//end save

    public function edit_employee($id) {
        $employee = Employee::getEmployee($id);
        $data['benefits'] = Benefits::getAll();
        $data['posts'] = Posts::getAll();
        $data['employee'] = $employee[0];
        $data['title'] = "Employee Management";
        $data['content_view'] = "add_employee_v";
        $data['quick_link'] = "new_employee";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
