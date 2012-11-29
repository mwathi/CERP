<div id="view_content">
    <a class="action_button" id="new_flock" href="<?php echo site_url("flock_management/add"); ?>">New Flock</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Member</th>
                <th>Group</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Spouse</th>
                <th>Number of Children</th>
                <th>Address</th>
                <th>Email Address</th>                
            </tr>
                    <?php
                    foreach($members as $member_data){?>
                        <tr>                                                                        
                        <td><?php echo $member_data -> Name ?></td>     
                        <td><?php echo $member_data -> Groups -> Name ?></td>                                             
                        <td><?php echo $member_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $member_data -> Gender ?></td>
                        <td><?php echo $member_data -> Date_of_Birth ?></td>
                        <td><?php echo $member_data -> Spouse ?></td>
                        <td><?php echo $member_data -> Children ?></td>
                        <td><?php echo $member_data -> Address ?></td>
                        <td><?php echo $member_data -> Email ?></td>
                   
                        <td><a href="<?php echo base_url()."flock_management/delete/".$member_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$member_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
