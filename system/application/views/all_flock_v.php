<?php
if (isset($totalmembers)) {
    $totalmembers = $totalmembers;
} else {
    $totalmembers = "";
}
?>
<script>
	$(function() {
		document.getElementById("taxablepay").value = parseInt(document.getElementById("totalbenefits").value) + parseInt(document.getElementById("salary").value);	
	})
</script>
<div id="view_content">   
        <br />
    <a class="action_button" id="" href="<?php echo site_url("flock_management/groupListing"); ?>" style="width: 104px; text-align: left">Member Groups</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/professionListing"); ?>" style="width: 104px; text-align: left">Professions</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/statusListing"); ?>" style="width: 104px; text-align: left">Marital Status</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/genderListing"); ?>" style="width: 104px; text-align: left">Gender</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/birthdays"); ?>" style="width: 104px; text-align: left">Birthdays</a>
 <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>  
        <table class="reporttable">
            <tr>
                <th>All Members</th>               
             </tr>
             
             <tr id="removablerow">
                  <th colspan="11"></th>
  
            </tr>            
            <tr height="3px"></tr>            
            <tr class="yellow">
                <th>Member</th>
                <th>Group</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Spouse</th>
                <th>Profession</th>
                <th>Number of Children</th>
                <th>Address</th>
                <th>Email Address</th>                
            </tr>
                    <?php
                    foreach($members as $member_data){?>
                        <tr>                                                                        
                        <td><?php echo $member_data -> First_Name ." ". $member_data -> Surname ." ". $member_data -> Last_Name ?></td>     
                        <td><?php echo $member_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $member_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $member_data -> Gender ?></td>
                        <td><?php echo $member_data -> Date_of_Birth ?></td>
                        <td><?php echo $member_data -> Spouse ?></td>
                        <td><?php echo $member_data -> Profession ?></td>
                        <td><?php echo $member_data -> Children ?></td>
                        <td><?php echo $member_data -> Physical_Address ?></td>
                        <td><?php echo $member_data -> Email ?></td>
                   
                        <!--<td><a href="<?php echo base_url()."flock_management/delete/".$member_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$member_data ->id ?>">Edit</a></td>-->
                        <td><a href="<?php echo base_url()."flock_management/manage_member/".$member_data ->Member_Number ?>">View More Information</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table> 
        
    </div>
 </div>