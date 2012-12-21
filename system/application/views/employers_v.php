<div id="view_content">
    <a class="action_button" id="new_employer" href="<?php echo site_url("employer_management/add"); ?>">New employer</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Employer</th>
                <th>Company</th>    
                                             
            </tr>
                    <?php
                    foreach($employers as $employer_data){?>
                        <tr>                                                                        
                        <td><?php echo $employer_data -> Employer_Name ?></td>                                                                      
                        <td><?php echo $employer_data -> Company ?></td>                                                                                
                        <td><a href="<?php echo base_url()."employer_management/delete/".$employer_data -> id ?>" onclick="return confirm('Are you sure you want to delete this employer?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."employer_management/edit_employer/".$employer_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
