<div id="view_content">
    <a class="action_button" id="new_employee" href="<?php echo site_url("employee_management/add"); ?>">New Employee</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Employee</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>              
            </tr>
                    <?php
                    foreach($employees as $employee_data){?>
                        <tr>                                                                        
                        <td><?php echo $employee_data -> Name ?></td>                                                                      
                        <td><?php echo $employee_data -> Phone ?></td>                       
                        <td><?php echo $employee_data -> Gender ?></td>
                        <td><?php echo $employee_data -> Date_of_Birth ?></td>
                        <td><?php echo $employee_data -> Address ?></td>                   
                        <td><a href="<?php echo base_url()."employee_management/delete/".$employee_data -> id ?>" onclick="return confirm('Are you sure you want to delete this employee?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."employee_management/edit_employee/".$employee_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
