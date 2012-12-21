<?php
if (isset($employee)) {
    $employee_id = $employee -> id;
    $employee_name = $employee -> Name;
    $date_of_birth = $employee -> Date_of_Birth;
    $phone_number = $employee -> Phone;
    $address = $employee -> Address;
} else {
    $employee_id = "";
    $employee_name = "";
    $address = "";
    $phone_number = "";
    $date_of_birth = "";
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
			changeYear : true
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
            <td>Status </td>
            <td><select name="gender" id="gender" class="othertext">
                <option value="" selected>Select Status</option>
                <option value="Permanent">Permanent</option>
                <option value="Daily Wages">Daily Wages</option>
                <option value="Other">Other</option>
            </select></td>
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
                <select>
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
            <td><input type="text" /></td>
        </tr>
        
        <tr>
            <td>Kenya Revenue Authority PIN Number</td>
            <td><input type="text" /></td>
        </tr>
        
        <tr>
            <td>Mailing Address</td>
            <td><input type="text" /></td>
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
            <td><input type="text" /></td>
        </tr>
        
        <tr>
            <td>Qualification(General)</td>
            <td><input type="text" /></td>
        </tr>
     
       <tr>
            <td>Qualification(Technical)</td>
            <td><input type="text" /></td>
        </tr>
     
       <tr>
            <td>Post Grade</td>
            <td><input type="text" /></td>
        </tr>
     
     
       <tr>
            <td>Present Pay Scale</td>
            <td><input type="text" /></td>
            <td>* If Post Grade & Present Pay Scale are Not Same:</td>
        </tr>
     
     
       <tr>
            <td>Number of Children</td>
            <td><input type="text" /></td>
        </tr>
        
          <tr>
            <td>Name of Spouse</td>
            <td><input type="text" /></td>
        </tr>
        
          <tr>
            <td>Bank's Name &amp; Branch</td>
            <td><input type="text" /></td>
        </tr>
     
     
       <tr>
            <td>Account Number</td>
            <td><input type="text" /></td>
        </tr>
        
          <tr>
            <td>Accommodation</td>
            <td>
                <select>
                    <option>Rented</option>
                    <option>Self-Owned</option>
                    <option>House/Rent Allowance</option>
                </select>
            </td>
        </tr>
        
        
       <tr>
            <td>Medical Facility</td>
            <td>Cash Medical Allowance</td>
            <td><input type="text" /></td>
            
            <td>Medical Facility</td>
            <td><input type="text" /></td>
        </tr>
     
     <tr style="height: 20px"></tr>
     <tr>
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
                 <td><input type="text" id="promotiondate" /></td>                 
             </tr>
         </table>
     </tr>
     <div id="space" style="height: 30px"></div>
     <tr>
         
         <table class="othertext">
             <th colspan="4" style="background-color: #999999">Detail of Departmental Training</th>
            <th colspan="4" style="background-color: #999999">Detail of Departmental Exams</th>
             <tr>
                 <th style="background-color: #CCCCCC">Name of Training</th>
                 <th style="background-color: #CCCCCC">Date From</th>
                 <th style="background-color: #CCCCCC">Date To.</th>
                 <th style="background-color: #CCCCCC">Training Station</th>
                 <th style="background-color: #CCCCCC">Name of Exams</th>
                 <th style="background-color: #CCCCCC">Date of Exam</th>
                 <th style="background-color: #CCCCCC">Exam Station</th>
                 <th style="background-color: #CCCCCC">Exam Status</th>
             </tr>
             <tr style="height: 20px"></tr>
             <tr>
                 <td><input type="text" id="datefrom" /></td>
                 <td><input type="text" id="dateto" /></td>
                 <td><input type="text" id="designation" /></td>
                 <td><input type="text" id="office" /></td>
                 <td><input type="text" id="city" /></td>
                 <td><input type="text" id="promotiondate" /></td>
                 <td><input type="text" id="promotiondate" /></td>
                 <td><input type="text" id="promotiondate" /></td>                 
             </tr>             
         </table>
     </tr>
        

     <div id="space" style="height: 20px"></div>
      
        <tr>
            <td><input name="submit" type="submit" value="Save Employee" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>