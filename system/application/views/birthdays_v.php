<div id="view_content">   
    <br />
    <a class="action_button" id="" href="<?php echo site_url("flock_management/groupListing"); ?>" style="width: 104px; text-align: left">Member Groups</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/professionListing"); ?>" style="width: 104px; text-align: left">Professions</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/statusListing"); ?>" style="width: 104px; text-align: left">Marital Status</a>
    <a class="action_button" id="" href="<?php echo site_url("flock_management/genderListing"); ?>" style="width: 104px; text-align: left">Gender</a>
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
                <th>Birthdays Today!</th>
              
            </tr>
                    <?php
                    foreach($members as $member_data){?>
                        <tr>                                                                        
                        <td><?php echo $member_data -> First_Name ." ". $member_data -> Surname ." ". $member_data -> Last_Name ?></td>     
                        <td><?php echo date('F Y d',strtotime($member_data -> Date_of_Birth)); ?></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table> 
        
        
         <table class="reporttable">
            <tr>
                <th>All Members</th>               
             </tr>
             
             <tr id="removablerow">
                  <th colspan="11"></th>
  
            </tr>            
            <tr height="3px"></tr>            
            <tr class="yellow">
                <th>Upcoming Birthdays</th>
              
            </tr>
                    <?php
                    foreach($upcomingbdays as $member_data){?>
                        <tr>                                                                        
                        <td><?php echo $member_data -> First_Name ." ". $member_data -> Surname ." ". $member_data -> Last_Name ?></td>     
                        <td><?php echo date('F d',strtotime($member_data -> Date_of_Birth)); ?></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table> 
        
    </div>
 </div>