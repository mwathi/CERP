<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
             <tr>
                <th>
                    <?php echo form_open('employee_management/searchEmployee');?>
                        <input type="text" name="search" placeholder="Enter Search Field"/></th><td style="border-bottom: 0; color: #FFF">
                        <input type="submit" value="Search" class="button"/>
                    <?php echo form_close();?>
                </td>
            </tr>
            <tr><th>Employee Information</th></tr>
            <tr class="yellow">
                <th>Employee</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Post</th>
            </tr>
                    <?php
                    foreach($employeeinfo as $employee_data){?>
                        <tr>                                                                        
                        <td><?php echo $employee_data -> Name ?></td>     
                        <td><?php echo $employee_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $employee_data -> Gender ?></td>
                        <td><?php echo $employee_data -> Date_of_Birth ?></td>
                        <td><?php echo $employee_data -> Address ?></td>
                        <td><?php echo $employee_data -> Post ?></td>
                   
                        <td><a href="<?php echo base_url()."employee_management/delete/".$employee_data -> id ?>" onclick="return confirm('Are you sure you want to delete this employee?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."employee_management/edit_employee/".$employee_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
