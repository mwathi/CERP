<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
             <tr>
                <th>
                    <?php echo form_open('flock_management/searchMember');?>
                        <input type="text" name="search" placeholder="Enter Search Field"/></th><td style="border-bottom: 0; color: #FFF">
                        <input type="submit" value="Search" class="button"/>
                    <?php echo form_close();?>
                </td>
            </tr>
            <tr><th>Member Information</th></tr>
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
                    foreach($memberinfo as $parentmember_data){?>
                        <tr>                                                                        
                        <td><?php echo $parentmember_data -> Surname ." ". $parentmember_data -> First_Name ." ". $parentmember_data -> Last_Name ?></td>     
                        <td><?php echo $parentmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $parentmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $parentmember_data -> Gender ?></td>
                        <td><?php echo $parentmember_data -> Date_of_Birth ?></td>
                        <td><?php echo $parentmember_data -> Spouse ?></td>
                        <td><?php echo $parentmember_data -> Children ?></td>
                        <td><?php echo $parentmember_data -> Physical_Address ?></td>
                        <td><?php echo $parentmember_data -> Email ?></td>
                   
                        <td><a href="<?php echo base_url()."flock_management/delete/".$parentmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$parentmember_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
