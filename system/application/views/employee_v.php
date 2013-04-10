<style>
     ::-webkit-input-placeholder {
        text-align: center;
        font: .88em "Segoe UI", Segoe, Arial, Sans-Serif;
        font-style: italic
    }
</style>
  
<div id="view_content">
    <div id="space" style="height: 20px"></div>
    <a class="action_button" id="new_employee" href="<?php echo site_url("employee_management/add"); ?>" style="background-color: #DF00FF">New Employee</a>
    <a class="action_button" id="" href="<?php echo site_url("benefit_management/listing"); ?>" style="width: 130px">Benefits</a>
    <a class="action_button" id="" href="<?php echo site_url("job_group_management/listing"); ?>" style="width: 130px">Job Groups</a>
    <a class="action_button" id="" href="<?php echo site_url("employee_management/qualification_listing"); ?>" style="width: 130px">Qualifications</a>
    <a class="action_button" id="" href="<?php echo site_url("payroll_management/listing"); ?>" style="width: 130px">Payroll Information</a>
    
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
            <tr style="height: 20px"></tr>
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
                        
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
