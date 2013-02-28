<div id="view_content">
    <br />
    <a class="action_button" id="new_group" href="<?php echo site_url("job_group_management/add"); ?>">New Job Group</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Job Group</th>                
                <th>Description</th>          
                <th>Salary</th>                
                <!--th>Benefits</th-->                             
            </tr>
                    <?php
                    
                    foreach($groups as $group_data){?>
                        <tr>                                                                        
                        <td><?php echo $group_data -> Job_Group ?></td>                                                                                                   
                        <td><?php echo $group_data -> Description ?></td>   
                        <td><?php echo $group_data -> Salary ?></td>   
                        <!--td><?php echo $group_data -> Benefit ?></td-->                                                           
                        <td><a href="<?php echo base_url()."job_group_management/delete/".$group_data -> id ?>" onclick="return confirm('Are you sure you want to delete this group?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."job_group_management/edit_group/".$group_data ->id ?>">Edit</a></td>
                        <td><a href="<?php echo base_url()."job_group_management/manage_group/".$group_data ->Job_Group ?>">Manage Data</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
