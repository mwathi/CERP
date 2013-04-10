<div id="view_content">
	<br />
    <a class="action_button" id="new_qualification" href="<?php echo site_url("employee_management/add_qualifications"); ?>">New Qualification</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Qualification</th>
                <th>Description</th>                             
            </tr>
                    <?php
                    foreach($qualifications as $qualification_data){?>
                        <tr>                                                                        
                        <td><?php echo $qualification_data -> Name ?></td>                                                                      
                        <td><?php echo $qualification_data -> Description ?></td>                                                           
                        <td><a href="<?php echo base_url()."employee_management/delete_qualification/".$qualification_data -> id ?>" onclick="return confirm('Are you sure you want to delete this qualification?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."employee_management/edit_qualification/".$qualification_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
