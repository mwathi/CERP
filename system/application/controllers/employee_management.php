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
        $data['qualifications'] = Qualifications::getAll();
        $data['posts'] = Posts::getAll();
        $data['banks'] = Banks::getAll();
        $data['title'] = "Employee Management::Add New Employee";
        $data['quick_link'] = "new_employee";
        $data['content_view'] = "add_employee_v";
        $this -> base_params($data);
    }

    public function save() {
        $employment_status = $this -> input -> post("employment_status");
        $gender = $this -> input -> post("gender");
        $marital_status = $this -> input -> post("marital_status");
        $employee_name = $this -> input -> post("employee_name");
        $employee_post = $this -> input -> post("posts");
        $date_of_birth = $this -> input -> post("date_of_birth");
        $nssf_number = $this -> input -> post("nssf_number");
        $kra_pin = $this -> input -> post("kra_pin");
        $mailing_address = $this -> input -> post("mailing_address");
        $address = $this -> input -> post("address");
        $phone_number = $this -> input -> post("phone_number");
        $schools_attended = $this -> input -> post("schools_attended");
        $religion = $this -> input -> post("religion");
        $general_qualifications = $this -> input -> post("general_qualifications");
        $technical_qualifications = $this -> input -> post("technical_qualifications");
        $number_of_children = $this -> input -> post("number_of_children");

        $spouse = $this -> input -> post("spouse");
        $bank_name = $this -> input -> post("bank_name");
        $account_number = $this -> input -> post("account_number");

        $contact_telephone = $this -> input -> post("contact_telephone");
        $contact_person = $this -> input -> post("contact_person");

        $employee_id = $this -> input -> post("employee_id");

        if (strlen($employee_id) > 0) {
            $employee = Employee::getEmployee($employee_id);
            $employee = $employee[0];

        } else {
            $employee = new Employee();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {

            $employee -> Employment_Status = $employment_status;
            $employee -> Marital_Status = $marital_status;
            $employee -> NSSF_Number = $nssf_number;
            $employee -> KRA_PIN = $kra_pin;
            $employee -> Mailing_Address = $mailing_address;
            $employee -> Religion = $religion;
            $employee -> General_Qualifications = $general_qualifications;
            $employee -> Technical_Qualifications = $technical_qualifications;
            $employee -> Number_of_Children = $number_of_children;
            $employee -> Spouse = $spouse;
            $employee -> Bank_Name = $bank_name;
            $employee -> Account_Number = $account_number;
            $employee -> Schools_Attended = $schools_attended;
            $employee -> Contact_Telephone = $contact_telephone;
            $employee -> Contact_Person = $contact_person;

            $employee -> Post = $employee_post;
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

    public function manage_employee($id) {
        $employee = Employee::getEmployee($id);
        $data['benefits'] = Benefits::getAll();
        $data['posts'] = Posts::getAll();
        $data['employee'] = $employee[0];
        $data['title'] = "Employee Management";
        $data['content_view'] = "manage_employee_v";
        $data['quick_link'] = "manage_employee";
        $this -> base_params($data);
    }

    public function employee_benefits($id) {
        $data['employeebenefits'] = Employee_Benefits::getEmployeeBenefit($id);
        $data['benefits'] = Benefits::getAll();
        $employee = Employee::getEmployee($id);
        $data['employee'] = $employee[0];
        $data['title'] = "Employee Benefit Management";
        $data['content_view'] = "employee_benefit_v";
        $data['quick_link'] = "employee_benefit";
        $this -> base_params($data);
    }

    public function savebenefits() {
        $employee_benefits = $this -> input -> post("benefit");
        $employee_id = $this -> input -> post("employee_id");
        $i = 0;
        $this -> load -> database();

        foreach ($employee_benefits as $r) {
            $sql = 'UPDATE employee_benefits SET benefit="'.$r.'", employee = "'.$employee_id.'" WHERE employee = "'.$employee_id.'" ';
            $query = $this -> db -> query($sql);
            $i++;
        }

        redirect("employee_management/listing");
    }//end save

    public function qualification_listing() {
        $data['qualifications'] = Qualifications::getAll();
        $data['title'] = "Employee Management::All Qualifications";
        $data['content_view'] = "qualifications_v";
        $this -> base_params($data);
    }

    public function savequalifications() {
        $qualification_name = $this -> input -> post("qualification_name");
        $description = $this -> input -> post("description");

        $qualification = new Qualifications();
        $qualification -> Name = $qualification_name;
        $qualification -> Description = $description;
        $qualification -> save();

        redirect("employee_management/qualification_listing");
    }//end save

    public function add_qualifications() {
        $data['title'] = "Employee Management::Add New Qualification";
        $data['quick_link'] = "new_qualification";
        $data['content_view'] = "add_qualifications_v";
        $this -> base_params($data);
    }//end save

    private function _submit_validate() {
        // validation rules
        $this -> form_validation -> set_rules('benefit[]', 'Username', 'required|min_length[5]|max_length[20]|is_unique[users.username]');
        return $this -> form_validation -> run();
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
