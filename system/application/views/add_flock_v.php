<style>
.holder input, select{
    font-family: calibri;
    font-size: 16px;
}    
</style>
<script>
    $(function() {
        $("#date_of_birth").datepicker({
            changeMonth : true,
            changeYear : true,
            maxDate: "0D"
        });
    });
</script>

<?php
if (isset($member)) {
    $member_id = $member -> id;
    
    $first_name = $member -> First_Name;
    $surname = $member -> Surname;
    $last_name = $member -> Last_Name;
    $house = $member -> House;
    
    $profession = $member -> Profession;
    //$marital_status = $member -> Marital_Status;
    $disability_status = $member -> Disability_Status;
    $level_of_education = $member -> Level_of_education;
    $place_of_work = $member -> Place_of_work;
    $darasa = $member -> Darasa;
    $school = $member -> School;
    $national_id = $member -> National_id;
    $passport = $member -> Passport;
    $country = $member -> Country;
    $residence = $member -> Residence;
    $physical_address = $member -> Physical_Address;
    
    $member_phone_number = $member -> Phone;
    $date_of_birth = $member -> Date_of_Birth;
    $spouse = $member -> Spouse;
    $number_of_children = $member -> Children;
    $email = $member -> Email;

} else {
    $member_id = "";
    
    $first_name = "";
    $surname = "";
    $last_name = "";
    
    $house = "";
    $profession = "";
    //$marital_status = "";
    $disability_status = "";
    $level_of_education = "";
    $place_of_work = "";
    $darasa = "";
    $school = "";
    $national_id = "";
    $passport = "";
    $country = "";
    $residence = "";
    $physical_address = "";
    
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



<input type="hidden" name="member_id" value = "<?php echo $member_id; ?>"/>
<div class="holder" style="width: 70%; margin-left: 13%" align="center">
    <table class="othertext">        
        <tr>
            <th class="" colspan="2">Congregation Member Details</th>
        </tr>
        <tr>
            <th>Member Number</th>
            <td>
                <input type="text" name="member_number" value="<?php foreach($maxno as $max){ echo $max -> Member_Number + 1; } ?>" style="border: 0; background-color: #FFF" disabled/>
            </td>
        </tr>        
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        <tr style="height: 10px"></tr>
        <tr>
            <td>First Name<sup>*</sup> </td>
            <td>
            <?php
            $data_search = array('name' => 'first_name', 'value' => $first_name, 'required' => 'required');
            echo form_input($data_search);
            ?>
            </td>
            
            <td>Surname<sup>*</sup></td>
            <td>
            <?php
            $data_search = array('name' => 'surname', 'value' => $surname, 'required' => 'required');
            echo form_input($data_search);
            ?>
            </td>
            
            <td>Middle Name</td>
            <td>
            <?php
            $data_search = array('name' => 'last_name', 'value' => $last_name);
            echo form_input($data_search);
            ?>
            </td>
        </tr>
        
        <tr>
            <td>Date of Birth<sup>*</sup></td>
            <td><?php

            $data_search = array('name' => 'date_of_birth', 'id' => 'date_of_birth', 'value' => $date_of_birth, 'required' => 'required');
            echo form_input($data_search);
            ?></td>
        </tr>
        
                
        <tr>
            <td>Gender</td>
            <td><select name="gender" id="gender" required>
                <option value="" selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select></td>
        </tr>
        
        
        
        
         <tr id="nationalidrow">
            <td>National Id Number</td>
            <td><?php

            $data_search = array('name' => 'national_id', 'value' => $national_id);
            echo form_input($data_search);
            ?></td>
            
              <td>Passport Number</td>
            <td><?php

            $data_search = array('name' => 'passport', 'value' => $passport);
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <!--new-->
        
        
         <tr>
            <td>Nationality</td>
            <td><select name="member_group" id="member_group" required>
                <option value="" selected>Select Nationality</option>
                <?php
                foreach ($countries as $member_country) {
                    echo "<option selected value='$member_country->id'>$member_country->Name</option>";
                }
                ?>
            </select>
            </td>          
        </tr>
        <tr style="height: 10px"></tr>
        <tr>
            <th colspan="2">Other Information</th>
        </tr>
        <tr style="height: 10px"></tr>

        <tr>
            <td>Member Group<sup>*</sup></td>
             <td><select name="member_group" id="member_group" required>
                <option value="" selected>Select Group</option>
                <?php
                foreach ($member_groups as $member_group) {
                    echo "<option selected value='$member_group->id'>$member_group->Group_Name</option>";
                }
                ?>
            </select>
            </td>          
        </tr>
        
        <tr>
            <td>Member Telephone<sup>*</sup></td>
             <td>+254&nbsp;<?php

            $data_search = array('name' => 'member_phone_number', 'value' => $member_phone_number, 'maxlength' => 9, 'required' => 'required', 'id' => 'member_phone_number');
            echo form_input($data_search);
            ?></td>
        </tr>
        


        <tr id="spouserow">
            <td>Spouse</td>
            <td><?php

            $data_search = array('name' => 'spouse', 'id' => 'spouse','value' => $spouse);
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr id="childrenrow">
            <td>Number of Children</td>
            <td><?php

            $data_search = array('name' => 'number_of_children', 'id' => 'number_of_children', 'value' => $number_of_children);
            echo form_input($data_search);
            ?></td>
        </tr>

       
        
        <tr id="professionrow">
            <td>Profession<sup>*</sup></td>
            <td><?php

            $data_search = array('name' => 'profession', 'value' => $profession, 'required' => 'required');
            echo form_input($data_search);
            ?></td>
        </tr>
        <tr id="x"></tr>
        <tr id="statusrow">
            <td>Marital Status</td>
            <td>
                <select name="marital_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widow">Widow</option>
                    <option value="Widower">Widower</option>
                    <option value="N/A">N/A</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Highest Level of Education</td>
            <td>
                <select name="level_of_education">
                    <option value="secondary">High School Diploma</option>
                    <option value="college">College Diploma</option>
                    <option value="degree">Undergraduate Degree</option>
                    <option value="masters">Masters Degree</option>
                    <option value="doctor">Doctorate</option>
                    <option value="n/a">N/A</option>
                </select>
            </td>
        </tr>
        
        <tr id="workplacerow">
            <td>Place of Work</td>
            <td><?php

            $data_search = array('name' => 'place_of_work', 'value' => $place_of_work);
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Language</td>
            <td>
                <select name="country">
                    <option value="english">English</option>
                    <option value="swahili">Swahili</option>
                    <option value="french">French</option>
                    <option value="german">German</option>
                    <option value="italian">Italian</option>
                    <option value="arabic">Arabic</option>
                    <option value="other">Other</option>
                </select>
            </td>
        </tr>               
        
        <tr>
            <td>Physical Address</td>
            <td><?php

            $data_search = array('name' => 'physical_address', 'value' => $physical_address);
            echo form_input($data_search);
            ?></td>
        </tr>
        
                
        <tr>
            <td>Residence/Area/Estate</td>
            <td><?php

            $data_search = array('name' => 'residence', 'value' => $residence);
            echo form_input($data_search);
            ?></td>
        </tr>
        
                
        <tr>
            <td>House Number</td>
            <td><?php

            $data_search = array('name' => 'house', 'value' => $house);
            echo form_input($data_search);
            ?></td>
        </tr>
        
        
        <!------->
        
        <tr>
            <td>Email</td>
            <td><?php

            $data_search = array('name' => 'email', 'value' => $email);
            echo form_input($data_search);
            ?></td>
        </tr>
        <tr style="height: 10px"></tr>
        <tr>
            <td style="font-size: 11px">Mandatory fields denoted by <sup>*</sup></td>
        </tr>
        <tr>
            <td><input name="submit" type="submit" value="Save Member" class="button" style="width: 100px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
</div>
<script>
     $("#date_of_birth").change(function () {
          var datepickerdate = document.getElementById("date_of_birth").value;
          var newdatepickerdate = new Date(datepickerdate);
          var today = new Date();
          var age = today.getFullYear() - newdatepickerdate.getFullYear();
          
          if(age <= 12 ){
              $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
              $(document.getElementById("spouserow")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');
              $(document.getElementById("nationalidrow")).replaceWith('');
              $(document.getElementById("statusrow")).replaceWith('')
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>School</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');
          }else if(age > 12 && age <= 17){
                          $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
              $(document.getElementById("spouserow")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');            
              $(document.getElementById("statusrow")).replaceWith('')
              $(document.getElementById("nationalidrow")).replaceWith('');
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>School</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');              
          }else if(age >= 18){             
              $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
              $(document.getElementById("spouserow")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');            
              $(document.getElementById("statusrow")).replaceWith('')              
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>Campus</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');
          }
})
</script>

<!--script>
    $(function() {
        $("#youthoradult").dialog({
            resizable : false,
            height : 200,
            modal : true,
            buttons : {
                "Youth" : function() {
                    $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
                    $(document.getElementById("spouserow")).replaceWith('');                    
                    $(document.getElementById("apparent")).replaceWith('');
                    $(this).dialog("close");
                },
                "Child" : function() {
                    $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
                    $(document.getElementById("spouserow")).replaceWith('');                    
                    $(document.getElementById("apparent")).replaceWith('');
                    $(document.getElementById("nationalidrow")).replaceWith('');
                    $(document.getElementById("statusrow")).replaceWith('');
                    $(document.getElementById("professionrow")).replaceWith('');
                    $(document.getElementById("workplacerow")).replaceWith(
                        '<tr><td>School</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');
                    $(this).dialog("close");
                },
                "Adult" : function() {
                    $(document.getElementById("x")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
                    $(this).dialog("close");
                }
            }
        });
    });
    
    
    
    
    in case shelmith is persistent about this...add it
 $(document.getElementById("x")).replaceWith(
                        '<tr><td>Father</td><td><select name="father" id="father"><option value="n/a">N/A</option><?php foreach ($maleparents as $maleparentof) {
                             echo "<option value=".$maleparentof->First_Name." ".$maleparentof->Surname.">".$maleparentof->First_Name." ".$maleparentof->Surname."</option>"; }?></select></td><td>Mother</td><td><select name="mother" id="mother"><option value="n/a">N/A</option><?php foreach ($femaleparents as $femaleparentof) { echo "<option value=".$femaleparentof->First_Name." ".$femaleparentof->Surname.">".$femaleparentof->First_Name." ".$femaleparentof->Surname."</option>"; }?></select></td></tr>');
</script>