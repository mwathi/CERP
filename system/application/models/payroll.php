<?php
class Payroll extends Doctrine_Record {

    public function setTableDefinition() {
        $this -> hasColumn('Employee_Number', 'int', 15);
        $this -> hasColumn('Pay_Period', 'varchar', 25);
        $this -> hasColumn('Account_Number', 'int', 25);
        $this -> hasColumn('Bank_Name', 'varchar', 40);
        $this -> hasColumn('Earnings', 'varchar', 40);
        $this -> hasColumn('Earnings_Amount', 'int', 25);
        $this -> hasColumn('Deductions', 'varchar', 40);
        $this -> hasColumn('Deductions_Amount', 'int', 15);
        $this -> hasColumn('Taxation', 'int', 15);
        $this -> hasColumn('Gross_Earnings', 'int', 15);
        $this -> hasColumn('Net_Salary', 'int', 15);
        $this -> hasColumn('Date_Created', 'date');
    }

    public function setUp() {
        $this -> setTableName('payroll');
        $this -> hasOne('Employee', array('local' => 'Employee_Number', 'foreign' => 'Employee_Number'));
    }//end setUp

    public function getAll() {
        $query = Doctrine_Query::create() -> select("*") -> from("payroll");
        $payrollData = $query -> execute();
        return $payrollData;
    }//end getall

    public function payrollOneVReport() {
        $query = Doctrine_Query::create() -> select("Pay_Period, COUNT(DISTINCT(Employee_Number)) AS Paid_Guys") -> from("payroll") -> where("Employee_Number != '' GROUP BY Pay_Period");
        $payrollData = $query -> execute();
        return $payrollData;
    }//end getall

    public function getPayPeriodData($pay_period) {
        $query = Doctrine_Query::create() -> select("*") -> from("payroll") -> where("Pay_Period = '$pay_period' GROUP BY Employee_Number");
        $payrollData = $query -> execute();
        return $payrollData;
    }

    public function getAllPayrollDataPerEmployeePerPayPeriod($employee_number,$pay_period) {
        $query = Doctrine_Query::create() -> select("*") -> from("payroll") -> where("Employee_Number = '$employee_number' AND Pay_Period = '$pay_period' ");
        $payrollData = $query -> execute();
        return $payrollData;
    }//end getall
    
    public function preventDoublePayment($employee_number, $pay_period){
        $query = Doctrine_Query::create() -> select("Employee_Number, Pay_Period") -> from("payroll") -> where("Employee_Number = '$employee_number' AND Pay_Period = '$pay_period' ");
        $payrollData = $query -> execute();
        return $payrollData;
    }

}
?>