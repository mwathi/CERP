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
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table class="othertext">
        
        <tr class="yellow">
        <th class="" colspan="2">Employee Details</th>
        </tr>
        
        <tr>
            <td>Employee Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'employee_name', 'value' => $employee_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

         <tr>
            <td>Date of Birth</td>
            <td><?php

            $data_search = array('name' => 'date_of_birth', 'id' => 'date_of_birth', 'value' => $date_of_birth, 'class' => 'othertext');
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
            <td>Gender</td>
            <td><select name="gender" id="gender" class="othertext">
                <option value="0" selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select></td>
        </tr>
        
        <tr>
            <td>Address</td>
            <td><?php

            $data_search = array('name' => 'address', 'value' => $address, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Employee" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>