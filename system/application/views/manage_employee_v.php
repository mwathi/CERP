<div id="view_content">      
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
               <th>Previous Employer</th>
               <th>Schools Attended</th>
               <th>Contact Person</th>
               <th>Qualifications</th>               
           </tr>
           <tr>
               <td><?php echo $employee -> Posts -> Name; ?></td>
               <td class="purpleelement"><?php echo $employee -> Paygrade -> Salary; ?></td>
               <td><?php echo $employee -> Previous_Employer; ?></td>
               <td><?php echo $employee -> Schools_Attended; ?></td>
               <td><?php echo $employee -> Contact_Person; ?></td>
               <td><?php echo $employee -> Qualifications; ?></td>
           </tr>
           <tr style="height: 30px"></tr>
           <!--Work Details-->
           
           <tr>
               <th>Days Paid</th>
               <th>Days Absent</th>
               <th>Days Present</th>               
           </tr>
           <tr>
               <th>Sick Leave</th>
               <th>Paid Holidays</th>
               <th>Casual Leave</th>
           </tr>
        </table>      
    </div>
</div>
