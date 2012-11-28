<?php
if (isset($member)) {
    $member_id = $member -> id;
    $member_name = $member -> Name;
    $member_phone_number = $member -> Phone;
    $date_of_birth = $member -> Date_of_Birth;
    $spouse = $member -> Spouse;
    $number_of_children = $member -> Children;
    $address = $member -> Address;
    $email = $member -> Email;

} else {
    $member_id = "";
    $member_name = "";
    $member_group = "";
    $member_phone_number = "";
    $date_of_birth = "";
    $spouse = "";
    $number_of_children = "";
    $address = "";
    $email = "";

}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('flock_management/save', $attributes);
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

<input type="hidden" name="member_id" value = "<?php echo $member_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Congregation Member Details</th>
        </tr>
        
        <tr>
            <td>Member Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'member_name', 'value' => $member_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Member Group</td>
             <td><select name="member_group" id="member_group" class="othertext">
                <option value="0" selected>Select Group</option>
                <?php
                foreach ($member_groups as $member_group) {
                    echo "<option selected value='$member_group->id'>$member_group->Name</option>";
                }
                ?>
            </select>
            </td>          
        </tr>
        
        <tr>
            <td>Member Phone Number</td>
             <td><?php

            $data_search = array('name' => 'member_phone_number', 'value' => $member_phone_number, 'class' => 'othertext');
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
            <td>Date of Birth</td>
            <td><?php

            $data_search = array('name' => 'date_of_birth', 'id' => 'date_of_birth', 'value' => $date_of_birth, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Spouse</td>
            <td><?php

            $data_search = array('name' => 'spouse', 'value' => $spouse, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Number of Children</td>
            <td><?php

            $data_search = array('name' => 'number_of_children', 'value' => $number_of_children, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><?php

            $data_search = array('name' => 'address', 'value' => $address, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        
<tr>
            <td>Email</td>
            <td><?php

            $data_search = array('name' => 'email', 'value' => $email, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>


        <tr>
            <td><input name="submit" type="submit" value="Save Member" class="button" style="width: 100px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>