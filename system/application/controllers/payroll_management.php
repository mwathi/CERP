<?php
error_reporting();
class Payroll_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['allpayrolldata'] = Payroll::payrollOneVReport();
        $allemployees = Employee::getNumberOfEmployees();
        $data['allemployees'] = $allemployees[0];
        $data['title'] = "Payroll Management";
        $data['content_view'] = "payroll_one_v";
        $this -> base_params($data);
    }//end listing

    public function save() {
        $employee_number = $this -> input -> post("employee_number");
        $pay_period = $this -> input -> post("pay_period");
        $account_number = $this -> input -> post("account_number");
        $bank_name = $this -> input -> post("bank_details");
        $earnings = $this -> input -> post("earnings");
        $earnings_amount = $this -> input -> post("earnings_amount");
        $deductions = $this -> input -> post("deductions");
        $deductions_amount = $this -> input -> post("deductions_amount");
        $taxation = $this -> input -> post("taxation");
        $gross_earnings = $this -> input -> post("gross_earnings");
        $net_salary = $this -> input -> post("net_salary");
        $date_created = date("Y-m-d");
        $i = 0;

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {

            $this -> load -> database();
            $sql = "SELECT Employee_Number FROM Payroll WHERE Employee_Number = '" . $employee_number . "' AND Pay_Period = '" . $pay_period . "'  ";
            $query = $this -> db -> query($sql);
            $num = $query -> num_rows();
            if ($num > 0) {
                echo "You cannot process the same payments in the same month for the same person. Click here to go back <a href=" . base_url() . "payroll_management >Back</a> ";
            } else {
                if ($deductions_amount != "") {
                    foreach ($deductions_amount as $deds) {

                        $payroll = new Payroll();

                        $payroll -> Employee_Number = $employee_number;
                        $payroll -> Pay_Period = $pay_period;
                        $payroll -> Account_Number = $account_number;
                        $payroll -> Bank_Name = $bank_name;
                        $payroll -> Earnings = $earnings;
                        $payroll -> Earnings_Amount = $earnings_amount;
                        $payroll -> Deductions = $deductions[$i];

                        $payroll -> Deductions_Amount = $deds;
                        $payroll -> Taxation = $taxation;
                        $payroll -> Gross_Earnings = $gross_earnings;
                        $payroll -> Net_Salary = $net_salary;
                        $payroll -> Date_Created = $date_created;

                        $payroll -> save();
                        $i++;
                    }
                } else {
                    $payroll = new Payroll();

                    $payroll -> Employee_Number = $employee_number;
                    $payroll -> Pay_Period = $pay_period;
                    $payroll -> Account_Number = $account_number;
                    $payroll -> Bank_Name = $bank_name;
                    $payroll -> Earnings = $earnings;
                    $payroll -> Earnings_Amount = $earnings_amount;
                    $payroll -> Taxation = $taxation;
                    $payroll -> Gross_Earnings = $gross_earnings;
                    $payroll -> Net_Salary = $net_salary;
                    $payroll -> Date_Created = $date_created;

                    $payroll -> save();

                }
                $transaction = new Transactions();

                $transaction -> Date = date("Y-m-d");
                $transaction -> Account_Affected_1 = "Wages";
                $transaction -> Transaction = "Employee: Employee Number " . $employee_number . " Wage Reimbursement";
                $transaction -> Account_Affected_1_Amount = $net_salary;
                $transaction -> Account_Affected_1_Operation = "Debit";
                $transaction -> Account_Affected_2 = "Cash";
                $transaction -> Account_Affected_2_Amount = $net_salary;
                $transaction -> Account_Affected_2_Operation = "Credit";
                $transaction -> save();
                redirect("payroll_management/listing");
            }
        }

    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('taxation', 'Tax', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function payroll_two($pay_period) {
        $data['payperioddata'] = Payroll::getPayPeriodData($pay_period);
        $data['title'] = "Payroll Management";
        $data['content_view'] = "payroll_two_v";
        $this -> base_params($data);
    }

    public function payroll_three($employee_number, $pay_period) {
        $payperioddata = Payroll::getAllPayrollDataPerEmployeePerPayPeriod($employee_number, $pay_period);
        $data['employee'] = $payperioddata[0];
        $data['othertaxdata'] = Payroll::getAllPayrollDataPerEmployeePerPayPeriod($employee_number, $pay_period);
        $data['title'] = "Payroll Management";
        $data['content_view'] = "payroll_three_v";
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

    public function payroll($id) {
        error_reporting(0);
        $employee = Employee::getEmployee($id);
        $data['benefits'] = Benefits::getAll();
        $data['posts'] = Posts::getAll();
        $data['employee'] = $employee[0];
        $data['title'] = "Employee Management::Monthly Payment";
        $data['quick_link'] = "";
        $data['content_view'] = "pay_employees_v";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
