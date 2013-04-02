<?php
if (isset($employee)) {    
    $employment_status = $employee -> Employment_Status;
    $marital_status = $employee -> Marital_Status;
    $nssf_number = $employee -> NSSF_Number;
    $kra_pin = $employee -> KRA_PIN;
    $mailing_address = $employee -> Mailing_Address;
    $religion = $employee -> Religion;
    $technical_qualifications = $employee -> Technical_Qualifications;
    $number_of_children = $employee -> Number_of_Children;
    $spouse = $employee -> Spouse;
    $bank_name = $employee -> Bank_Name;
    $account_number = $employee -> Account_Number;
    
    
    $nhif_number = $employee -> NHIF_Number;
    $pension_fund_number = $employee -> Pension_Fund_Number;
    $academic_qualifications = $employee -> Academic_Qualifications;
    $bank_branch = $employee -> Bank_Branch;
    
    $contact_telephone = $employee -> Contact_Telephone;
    $contact_person = $employee -> Contact_Person;
    
    $schools_attended = $employee -> Schools_Attended;            

    $employee_id = $employee -> id;
    $employee_name = $employee -> Name;
    $date_of_birth = $employee -> Date_of_Birth;
    $phone_number = $employee -> Phone;
    $address = $employee -> Address;
} else {
    $nhif_number = "";
    $pension_fund_number = "";
    $academic_qualifications = "";
    $bank_branch = "";
    
    
    $employee_id = "";
    $employee_name = "";
    $address = "";
    $phone_number = "";
    $date_of_birth = "";
    
    $contact_telephone = "";
    $contact_person = "";
    $schools_attended = "";
    $employment_status = "";
    $marital_status = "";
    $nssf_number = "";
    $kra_pin = "";
    $mailing_address = "";
    $religion = "";
    $technical_qualifications = "";
    $number_of_children = "";
    $spouse = "";
    $bank_name = "";
    $account_number = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('employee_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<script>
	$(function() {
		$("#date_of_birth").datepicker({
			changeMonth : true,
			changeYear : true,
			yearRange: "-100",
			maxDate: "-6570D"
		});
	});
</script>
<input type="hidden" name="employee_id" value = "<?php echo $employee_id; ?>"/>
<div class="holder" style="margin-top: 50px; margin-left: 11%; width: 80%">
    
    <table class="othertext" >
        
        <tr class="yellow">
        <th class="" colspan="2">Employee Details</th>
        </tr>
        <tr>
            <th>Employee Number</th>
            <td>
                <input type="text" name="employee_number" value="<?php foreach($maxno as $max){ echo $max -> Employee_Number + 1; } ?>" style="border: 0; background-color: #FFF" readonly/>
            </td>
        </tr>      
        <tr>
            <td>Work Status </td>
            <td><select name="employment_status" id="employment_status" class="othertext">
                <option value="" selected>Select Status</option>
                <option value="Permanent">Contract</option>
                <option value="Permanent">Permanent</option>
                <option value="Daily Wages">Daily Wages</option>
                <option value="Other">Other</option>
            </select></td>
        </tr>
        
         <tr>
            <td>Job Group</td>
             <td><select name="groups" id="groups" class="othertext">
                <option value="0" selected>Select Group</option>
                <?php
                foreach ($groups as $group) {
                    echo "<option selected value='$group->Job_Group'>$group->Job_Group</option>";
                }
                ?>
            </select>
            </td>          
        </tr>
        
        <tr>
            <td>Gender</td>
            <td><select name="gender" id="gender" class="othertext">
                <option value="0" selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select></td>
        </tr>
        
        <tr>
            <td>Married/Unmarried</td>
            <td>
                <select name="marital_status">
                    <option>Married</option>
                    <option>Unmarried</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Employee Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'employee_name', 'value' => $employee_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
           <tr>
            <td>Post</td>
             <td><select name="posts" id="posts" class="othertext">
                <option value="0" selected>Select Post</option>
                <?php
                foreach ($posts as $posting) {
                    echo "<option selected value='$posting->id'>$posting->Name</option>";
                }
                ?>
            </select>
            </td>          
        </tr>

         <tr>
            <td>Date of Birth</td>
            <td><?php

            $data_search = array('name' => 'date_of_birth', 'id' => 'date_of_birth', 'value' => $date_of_birth, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>NSSF Number</td>
            <td><?php

            $data_search = array('name' => 'nssf_number', 'value' => $nssf_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>KRA PIN Number</td>
            <td><?php

            $data_search = array('name' => 'kra_pin', 'value' => $kra_pin, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>NHIF Number</td>
            <td><?php

            $data_search = array('name' => 'nhif_number', 'value' => $nhif_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Pension Fund Number</td>
            <td><?php

            $data_search = array('name' => 'pension_fund_number', 'value' => $pension_fund_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Mailing Address</td>
            <td>
                <?php

            $data_search = array('name' => 'mailing_address', 'value' => $mailing_address, 'class' => 'othertext');
            echo form_input($data_search);
            ?>
            </td>
        </tr>
        
        
           
        <tr>
            <td>Permanent Address</td>
            <td><?php

            $data_search = array('name' => 'address', 'value' => $address, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        
        
        <tr>
            <td>Employee Phone Number</td>
             <td><?php

            $data_search = array('name' => 'phone_number', 'value' => $phone_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Religion</td>
            <td><?php

            $data_search = array('name' => 'religion', 'value' => $religion, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Academic Qualifications</td>
            <td><?php

            $data_search = array('name' => 'academic_qualifications', 'value' => $academic_qualifications, 'class' => 'othertext');
            echo form_textarea($data_search);
            ?></td>
        </tr>
     
       <tr>
            <td>Professional Qualifications</td>
            <td><select name="professional_qualifications" id="professional_qualifications" multiple="multiple">
                <option value="">Select Qualification</option>
                <?php
                foreach ($qualifications as $qualification) {
                    echo "<option value='$qualification->id'>$qualification->Name</option>";
                }
                ?>
            </select></td>
        </tr>
        
        <tr>
            <td>Schools Attended</td>
            <td>
              <?php

            $data_search = array('name' => 'schools_attended', 'value' => $schools_attended, 'class' => 'othertext');
            echo form_textarea($data_search);
            ?>  
            </td>
        </tr>
     
       
     
     
       <tr>
            <td>Number of Children</td>
            <td><input type="text" name="number_of_children"/></td>
        </tr>
        
          <tr>
            <td>Name of Spouse</td>
            <td><?php

            $data_search = array('name' => 'spouse', 'value' => $spouse, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Contact Person</td>
            <td><?php

            $data_search = array('name' => 'contact_person', 'value' => $contact_person, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Contact Telephone</td>
            <td><?php

            $data_search = array('name' => 'contact_telephone', 'value' => $contact_telephone, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        
          <tr>
            <td>Bank's Name</td>
            <td><select name="bank_name" id="bank_name" >
                <option value="">Select Bank</option>
                <?php
                foreach ($banks as $bank) {
                    echo "<option value='$bank->id'>$bank->Name</option>";
                }
                ?>
            </select></td>
        </tr>
        
        <tr>
            <td>Bank's Branch</td>
            <td><?php

            $data_search = array('name' => 'bank_branch', 'value' => $bank_branch, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
     
     
       <tr>
            <td>Account Number</td>
            <td><?php

            $data_search = array('name' => 'account_number', 'value' => $account_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        

       
     
     <tr style="height: 20px"></tr>
     <!--tr>
         <td>Service Background(Descending Order)</td>
         <table class="othertext">
             <tr>
                 <th style="background-color: #999999">DATE FROM</th>
                 <th style="background-color: #999999">DATE TO</th>
                 <th style="background-color: #999999">DESIGNATION</th>
                 <th style="background-color: #999999">NAME OF DEPT/OFFICE</th>
                 <th style="background-color: #999999">CITY</th>
                 <th style="background-color: #999999">PROMOTION DATE</th>
             </tr>
             <tr style="height: 20px"></tr>
             <tr>
                 <td><input type="text" id="datefrom" /></td>
                 <td><input type="text" id="dateto" /></td>
                 <td><input type="text" id="designation" /></td>
                 <td><input type="text" id="office" /></td>
                 <td><input type="text" id="city" /></td>
                 <td><input type="text" id="city" /></td>             
             </tr>
         </table>
     </tr-->
     <div id="space" style="height: 30px"></div>

        <tr>
            <td><input name="submit" type="submit" value="Save Employee" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>