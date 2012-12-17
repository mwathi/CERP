<div id="view_content">
    <a class="action_button" id="new_group" href="<?php echo site_url("group_management/add"); ?>">New Group</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Group</th>                
                <th>Description</th>                             
            </tr>
                    <?php
                    foreach($groups as $group_data){?>
                        <tr>                                                                        
                        <td><?php echo $group_data -> Group_Name ?></td>                                                                                                   
                        <td><?php echo $group_data -> Description ?></td>                                                           
                        <td><a href="<?php echo base_url()."group_management/delete/".$group_data -> id ?>" onclick="return confirm('Are you sure you want to delete this group?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."group_management/edit_group/".$group_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
