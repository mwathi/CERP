<div id="view_content"> 
    <br />
    <a class="action_button" id="" href="<?php echo site_url("employee_management/payroll/".$employee -> id."/".$employee -> Job_Group); ?>" style="width: 50px">Payroll</a>     
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow"><th>Manage your Employees</th></tr>
           <tr>
               <th class="purpleelement">Employee: <?php echo "<u>" .$employee -> Name . "</u>"; ?></th>
               <th></th>
               <th></th>
               <th></th>
               <th class="purpleelement"><?php echo date('F Y d'); ?></th>               
           </tr>
           <tr></tr>
           <tr style="height: 30px"></tr>
           
           <!--Personal
               Information-->
           <tr>
               <th>Post</th>
               <th>Current Salary</th>               
               <th>Schools Attended</th>
               <th>Contact Person</th>
               <th>Contact Telephone</th>
               <th>Professional Qualifications</th>
               <th>Academic Qualifications</th>               
           </tr>
           <tr>
               <td><?php echo $employee -> Posts -> Name; ?></td>
               <td class="purpleelement"><?php echo $employee -> Job_Groups -> Salary; ?></td>               
               <td><?php echo $employee -> Schools_Attended; ?></td>
               <td><?php echo $employee -> Contact_Person; ?></td>
               <td><?php echo $employee -> Contact_Telephone; ?></td>
               <td><?php echo $employee -> Qualifications -> Name; ?></td>
               <td><?php echo $employee -> Academic_Qualifications; ?></td>
           </tr>
           <tr style="height: 30px"></tr>
           <!--Work Details-->
        </table>      
    </div>
</div>
