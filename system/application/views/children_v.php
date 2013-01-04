<div id="view_content">    
    <a class="action_button" id="new_flock" href="<?php echo site_url("flock_management/add"); ?>">New Member</a>
    <a class="action_button" id="new_group" href="<?php echo site_url("group_management/listing"); ?>" style="width: 50px">Groups</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Children</th></tr>
            <tr class="yellow">
                <th>Member</th>
                <th>Group</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Email Address</th>                
            </tr>
                    <?php
                    foreach($children as $childrenmember_data){?>
                        <tr>                                                                        
                        <td><?php echo $childrenmember_data -> First_Name ." ". $childrenmember_data -> Surname ." ". $childrenmember_data -> Last_Name ?></td> 
                        <td><?php echo $childrenmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $childrenmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $childrenmember_data -> Gender ?></td>
                        <td><?php echo $childrenmember_data -> Date_of_Birth ?></td>
                        <td><?php echo $childrenmember_data -> Physical_Address ?></td>
                        <td><?php echo $childrenmember_data -> Email ?></td>
                   
                        <!--<td><a href="<?php echo base_url()."flock_management/delete/".$childrenmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$childrenmember_data ->id ?>">Edit</a></td>-->
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>