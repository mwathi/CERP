<div id="view_content">
    <div id="space" style="height: 20px"></div>
    <a class="action_button" id="new_employee" href="<?php echo site_url("employee_management/add"); ?>">New Employee</a>
    <a class="action_button" id="new_employee" href="<?php echo site_url("benefit_management/listing"); ?>" style="width: 50px">Benefits</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Employee</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Post</th>              
            </tr>
                    <?php
                    foreach($employees as $employee_data){?>
                        <tr>                                                                        
                        <td><?php echo $employee_data -> Name ?></td> 
                        <td><?php echo $employee_data -> Phone ?></td>                       
                        <td><?php echo $employee_data -> Gender ?></td>
                        <td><?php echo $employee_data -> Date_of_Birth ?></td>
                        <td><?php echo $employee_data -> Address ?></td> 
                        <td><?php echo $employee_data -> Posts -> Name ?></td>                   
                        <td><a href="<?php echo base_url()."employee_management/delete/".$employee_data -> id ?>" onclick="return confirm('Are you sure you want to delete this employee?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."employee_management/edit_employee/".$employee_data ->id ?>">Edit</a></td>
                        <td><a href="<?php echo base_url()."employee_management/manage_employee/".$employee_data ->id ?>">Manage Employee</a></td>
                        <td><a href="<?php echo base_url()."employee_management/employee_benefits/".$employee_data ->id ?>">Employee Benefits</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
