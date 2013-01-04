<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow"><th>Manage your Job Groups</th></tr>
           <tr>
               <th class="purpleelement">Job Group: <?php echo "<u>" .$group -> Job_Group . "</u>"; ?></th>
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
               <th>Description</th>
               <th>Current Salary</th>
               <th>Benefits</th>
             
           </tr>
           <tr>
               <td><?php echo $group -> Description; ?></td>
               <td><?php echo $group -> Salary; ?></td>
               <td><table><?php foreach($benefits as $benefit){
                        echo "<tr><td>". $benefit['Name'] . "</td></tr>";
                    }?>
                </table></td>
           </tr>
           <tr style="height: 30px"></tr>
            
        </table>      
    </div>
</div>
