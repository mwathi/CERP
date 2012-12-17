<div id="view_content">
    <a class="action_button" id="new_pledge" href="<?php echo site_url("pledge_controller/add"); ?>">New Cause</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Cause</th>
                <th>Description</th>
                <th>Date Created</th>
                <th>Deadline</th>                        
            </tr>
                    <?php
                    foreach($causedata as $cause_data){?>
                        <tr>                                                                        
                        <td><?php echo $cause_data -> Name ?></td>                                                                      
                        <td><?php echo $cause_data -> Description ?></td>                       
                        <td><?php echo date('F Y D', strtotime($cause_data -> Date_Created)) ?></td>
                        <td><?php echo date('F Y D', strtotime($cause_data -> Deadline)) ?></td>                 
                        <td><a href="<?php echo base_url()."pledge_controller/delete/".$cause_data -> id ?>" onclick="return confirm('Are you sure you want to delete this post?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."pledge_controller/edit_/".$cause_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
