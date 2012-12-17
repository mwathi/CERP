<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Latest Additions: Parents</th></tr>
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
                    foreach($parentmembers as $parentmember_data){?>
                        <tr>                                                                        
                        <td><?php echo $parentmember_data -> First_Name ." ". $parentmember_data -> Last_Name ." ". $parentmember_data -> Surname ?></td>     
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
    
    <div id="space"></div>
        <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Latest Additions: Youths</th></tr>
            <tr class="yellow">
                <th>Member</th>
                <th>Group</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Parent</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Email Address</th>
            </tr>
                    <?php
                    foreach($youthmembers as $youthmember_data){?>
                        <tr>                                                                        
                        <td><?php echo $youthmember_data -> First_Name ." ". $youthmember_data -> Surname ." ". $youthmember_data -> Last_Name ?></td>
                        <td><?php echo $youthmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $youthmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $youthmember_data -> Gender ?></td>
                        <td><?php echo $youthmember_data -> Parent_name ?></td>             
                        <td><?php echo $youthmember_data -> Date_of_Birth ?></td>     
                        <td><?php echo $youthmember_data -> Physical_Address ?></td>                                                                       
                        <td><?php echo $youthmember_data -> Email ?></td>
                   
                        <td><a href="<?php echo base_url()."flock_management/delete/".$youthmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$youthmember_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
    
    <div id="space"></div>
        <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Latest Additions: Children</th></tr>
            <tr class="yellow">
                <th>Member</th>
                <th>Group</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Parent</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Email Address</th>
            </tr>
                    <?php
                    foreach($childrenmembers as $childrenmember_data){?>
                        <tr>                                                                        
                        <td><?php echo $childrenmember_data -> First_Name ." ". $childrenmember_data -> Surname ." ". $childrenmember_data -> Last_Name ?></td>
                        <td><?php echo $childrenmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $childrenmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $childrenmember_data -> Gender ?></td>
                        <td><?php echo $childrenmember_data -> Parent_name ?></td>             
                        <td><?php echo $childrenmember_data -> Date_of_Birth ?></td>     
                        <td><?php echo $childrenmember_data -> Physical_Address ?></td>                                                                       
                        <td><?php echo $childrenmember_data -> Email ?></td>
                   
                        <td><a href="<?php echo base_url()."flock_management/delete/".$youthmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$youthmember_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
