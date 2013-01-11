<style>
.holder input, select{
    font-family: calibri;
    font-size: 16px;
} 

.segoe {
        font: .75em "Segoe UI", Segoe, Arial, Sans-Serif;
    }   
</style>
<script>
    $(function() {
        $("#date_of_birth").datepicker({
            changeMonth : true,
            changeYear : true,
            yearRange: "-100",
            maxDate: "0D"
        });
    });
    
                  $(function() {
                 $( "#place_of_work" ).autocomplete({
                    source: function(request, response) {
                    $.ajax({ url: "<?php echo site_url('flock_management/employerSuggestions'); ?>",
                    data: { term: $("#place_of_work").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    response(data);
                    }
                  });
            },
            minLength: 0
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
    $email = "";

}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('flock_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>



<input type="hidden" name="member_id" value = "<?php echo $member_id; ?>"/>
<div class="holder" style="width: 1100px; margin-left: 10%" align="center">
    <table class="segoe">        
        <tr>
            <th class="" colspan="2">CONREGATION MEMBER DETAILS</th>
        </tr>
        <tr>
            <th>Member Number</th>
            <td>
                <input type="text" name="member_number" value="<?php foreach($maxno as $max){ echo $max -> Member_Number + 1; } ?>" style="border: 0; background-color: #FFF" readonly/>
            </td>
        </tr>        
        <tr>
            <th colspan="2">PERSONAL INFORMATION</th>
        </tr>
        <tr style="height: 10px"></tr>
        <tr>
            
            <!--SURNAME-->
            <td>Surname<sup>*</sup></td>
            <td>
                <?php
            $data_search = array('name' => 'surname', 'value' => $surname, 'required' => 'required');
            echo form_input($data_search);
            ?>
           
            </td>
           </tr>
           <tr> 
            
            <td>First Name<sup>*</sup> </td>
            <td>
            <?php
            $data_search = array('name' => 'first_name', 'value' => $first_name, 'required' => 'required');
            echo form_input($data_search);
            ?>
            </td>
            </tr>
            <tr>
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
            </tr>
            <tr>
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
        
                <tr id="statusrow">
            <td>Marital Status</td>
            <td>
                <select name="marital_status" id="marital_status">
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
            <th colspan="2">OTHER INFORMATION</th>
        </tr>
        <tr style="height: 10px"></tr>

        <tr>
            <td>Primary Member Group<sup>*</sup></td>
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
        <tr style="height: 10px"></tr>
        <tr>
              <td>Other Group(s)</td>
             <td><select name="other_member_groups[]" id="member_groups" multiple="multiple">
                <option value="">Select Group</option>
                <?php
                foreach ($member_groups as $member_group) {
                    echo "<option value='$member_group->id'>$member_group->Group_Name</option>";
                }
                ?>
            </select>
            </td>             
        </tr>
        
         <tr>
          
        </tr>
        
        <tr>
            <td>Member Telephone<sup>*</sup></td>
             <td>+254&nbsp;<?php

            $data_search = array('name' => 'member_phone_number', 'value' => $member_phone_number, 'maxlength' => 9, 'required' => 'required', 'id' => 'member_phone_number');
            echo form_input($data_search);
            ?></td>
        </tr>
        


        <tr id="spouserow">
            
        </tr>

        <tr id="childrenrow">

        </tr>
        
        
        <!--teatsuckers-->
        <tr id="query1">
            <td>Any Children?</td>
            <tr id="removemerowa"> <td><a id="query1a" class="action_button">Yes</a></td><td> <a id="query1b" class="action_button">No</a></td></tr>
        </tr>
        

        
        
        
        <tr id="new_child_row">
        </tr>
        <tr style="height: 10px"></tr>        
       <tr id="newbuttonsrow">
       </tr>
        
        <!--end teatsuckers-->
        
        
        <tr id="professionrow">
            <td>Profession<sup>*</sup></td>
            <td><?php

            $data_search = array('name' => 'profession', 'value' => $profession, 'required' => 'required');
            echo form_input($data_search);
            ?></td>
        </tr>
        <tr id="x"></tr>

        
        <tr>
            <td>Highest Level of Education</td>
            <td>
                <select name="level_of_education">
                    <option value="Primary">Primary School</option>
                    <option value="Secondary">High School</option>
                    <option value="College">College</option>
                    <option value="Degree">Undergraduate Degree</option>
                    <option value="Masters">Masters Degree</option>
                    <option value="Doctor">Doctorate</option>
                    <option value="N/A">N/A</option>
                </select>
            </td>
        </tr>
        
        <tr id="workplacerow">
            <td>Place of Work</td>
            <td><?php

            $data_search = array('name' => 'place_of_work', 'value' => $place_of_work, 'id' => 'place_of_work', 'style' => 'width:300px');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Primary Language</td>
            <td>
                <select name="country">
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                </select>
            </td>
        </tr>           
        <tr id="otherlanguagerow">
            <td>Do you speak another language?</td>
            <td>
                <tr id="otherlanguagerownested">
                    <td><a id="yeslanguage" class="action_button">Yes</a></td>
                    <td><a id="nolanguage" class="action_button">No</a></td>
                </tr>
            </td>
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
                        '<tr><td>Father</td><td><input type="text" id="autocomplete" required name="mother"/></td><td>Mother</td><td><input type="text" id="autocomplete2" name="mother" required/></td></tr>');
              $(function() {
                 $( "#autocomplete" ).autocomplete({
                    source: function(request, response) {
                    $.ajax({ url: "<?php echo site_url('flock_management/fatherSuggestions'); ?>",
                    data: { term: $("#autocomplete").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    response(data);
                    }
                  });
            },
            minLength: 0
            });
            });
            
            $(function() {
                 $( "#autocomplete2" ).autocomplete({
                    source: function(request, response) {
                    $.ajax({ url: "<?php echo site_url('flock_management/motherSuggestions'); ?>",
                    data: { term: $("#autocomplete2").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    response(data);
                    }
                  });
            },
            minLength: 0
            });
            });
            
            
              $(document.getElementById("spouserow")).replaceWith(''); 
              $(document.getElementById("new_child_row")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');
              $(document.getElementById("nationalidrow")).replaceWith('');
              $(document.getElementById("statusrow")).replaceWith('')
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>School</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');
              alert(age);
          }else if(age > 12 && age <= 17){
                        $(document.getElementById("childrenrow")).replaceWith(
                        '<tr><td>Father</td><td><input type="text" id="autocomplete" required name="mother"/></td><td>Mother</td><td><input type="text" id="autocomplete2" name="mother" required/></td></tr>');
              $(function() {
                 $( "#autocomplete" ).autocomplete({
                    source: function(request, response) {
                    $.ajax({ url: "<?php echo site_url('flock_management/fatherSuggestions'); ?>",
                    data: { term: $("#autocomplete").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    response(data);
                    }
                  });
            },
            minLength: 0
            });
            });
            
            $(function() {
                 $( "#autocomplete2" ).autocomplete({
                    source: function(request, response) {
                    $.ajax({ url: "<?php echo site_url('flock_management/motherSuggestions'); ?>",
                    data: { term: $("#autocomplete2").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    response(data);
                    }
                  });
            },
            minLength: 0
            });
            });
            
              $(document.getElementById("spouserow")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');            
              $(document.getElementById("statusrow")).replaceWith('')
              $(document.getElementById("nationalidrow")).replaceWith('');
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>School</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');              
          }else if(age >= 18){             
              $(document.getElementById("spouserow")).replaceWith('');                    
              $(document.getElementById("apparent")).replaceWith('');            
              $(document.getElementById("statusrow")).replaceWith('')              
              $(document.getElementById("professionrow")).replaceWith('');
              $(document.getElementById("workplacerow")).replaceWith(
              '<tr><td>Campus</td><td><?php $data_search = array("name" => "school", "value" => ""); echo form_input($data_search);?></td></tr>');
          }
})

</script>
<script>    

//this section is about registering kids. basically if you have kids, you are asked the number of kids you have and can enter their names and dates of birth


   $( "#query1a" ).click(function(){ 
                  $(document.getElementById("query1")).replaceWith('<tr id="query2"><td>Do you wish to register them?</td> <tr id="removemerowb"><td><a id="query2a" class="action_button">Yes</a></td> <td><a id="query2b" class="action_button">No</a></td></tr> </tr>');
                  $(document.getElementById("removemerowa")).replaceWith('');
                  $( "#query2a" ).click(function(){
                      $(document.getElementById("query2")).replaceWith('');
                      $(document.getElementById("removemerowb")).replaceWith('');                      
                      $(document.getElementById("childrenrow")).replaceWith('<tr id="childrenrow"><td>Number of Children</td><td><?php $data_search = array("name" => "number_of_children","id" => "number_of_children", "value" => $number_of_children); echo form_input($data_search);?></td></tr>');
                          $("#number_of_children").change(function () {
           var kids = document.getElementById("number_of_children").value; 
           if(kids > 0){
               $(document.getElementById("new_child_row")).replaceWith('<tr id="new_child_row" class="new_child_row"><td>Child First Name</td><td><input type="text" name="child_firstname[]" id="childfname" /></td><td>Child Surname</td><td><input type="text" name="child_surname[]" id="childsname" /></td><td>Child DOB</td><td><input type="text" name="child_dob[]" id="datepicker" class="datepicker"/></td></tr>');
               $(document.getElementById("newbuttonsrow")).replaceWith('<tr><td><a id="dave" class="action_button">Add Another Child</a></td></tr>');              
           } 
           $( "#datepicker" ).datepicker({changeMonth : true,changeYear : true,maxDate: "0D"});
           $("#dave").click(function () {     
                $( ".new_child_row:last" ).clone( true ).insertAfter( ".new_child_row:last" );
                $( ".new_child_row:last" ).find( ":input" ).val( "" ); 
                $( ".new_child_row:last" ).find( "input.datepicker" ).removeAttr( "id" ).removeClass( "hasDatepicker" ).datepicker({changeMonth : true,changeYear : true,maxDate: "0D" });
            });

    });
                  });            
             
                  $( "#query2b" ).click(function(){
                      $(document.getElementById("query2")).replaceWith('');
                      $(document.getElementById("removemerowb")).replaceWith('');
                  });
           }); 
           
                $( "#query1b" ).click(function(){
                      $(document.getElementById("query1")).replaceWith('');
                      $(document.getElementById("removemerowa")).replaceWith('');
                  });  
    
    
</script>

 <script>
            $("#yeslanguage").click(function(){
               $(document.getElementById("otherlanguagerow")).replaceWith('<tr><td>Other Language</td><td><select name="otherlanguage"><option value="Swahili">Swahili</option><option value="Baganda">Baganda</option><option value="Afrikaans">Afrikaans</option><option value="german">German</option><option value="italian">Italian</option><option value="arabic">Arabic</option><option value="other">Other</option></select></td></tr>');
               $(document.getElementById("otherlanguagerownested")).replaceWith(''); 
            });
            $("#nolanguage").click(function(){
               $(document.getElementById("otherlanguagerow")).replaceWith('');
               $(document.getElementById("otherlanguagerownested")).replaceWith(''); 
            });
        </script>
        
<script>
    $("#marital_status").change(function () {
        if(document.getElementById("marital_status").value == "Married" || document.getElementById("marital_status").value == "N/A"){
        $(document.getElementById("spouserow")).replaceWith('<tr id="spouserow"><td>Spouse</td><td><?php $data_search = array("name" => "spouse", "id" => "spouse","value" => $spouse); echo form_input($data_search);?></td></tr>');
        }else if (document.getElementById("marital_status").value == "Single" || document.getElementById("marital_status").value == "Divorced" || document.getElementById("marital_status").value == "Widow" || document.getElementById("marital_status").value == "Widower"){
            $(document.getElementById("spouserow")).replaceWith('<tr id="spouserow"></tr>');
        }     
    });
</script>