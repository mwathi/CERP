<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow"><th>Manage your Members</th></tr>
           <tr>
               <th class="purpleelement">Member: <?php echo "<u>" .$member -> Surname . " " .$member -> First_Name . " " .$member -> Last_Name  . "</u>"; ?></th>
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
               <th>Groups</th>
               <th>Nationality</th>
               <th>Phone Contacts</th>
               <th>Gender</th>
               <th>Date of Birth</th>
               <th>Residence</th>
               <th>Address</th>               
           </tr>
           <tr>
               <td><?php echo $member -> Groups -> Group_Name. " "; foreach($other_groups_for_me as $othergroups){
                   echo $othergroups -> Groups -> Group_Name. " ";
               }?></td>
               <td><?php echo $member -> Countries -> Name; ?></td>
               <td><?php echo $member -> Phone; ?></td>
               <td><?php echo $member -> Gender; ?></td>
               <td><?php echo $member -> Date_of_Birth; ?></td>
               <td><?php echo $member -> Residence; ?></td>
               <td><?php echo $member -> Physical_Address; ?></td>
           </tr>
           <tr style="height: 30px"></tr>
           <!--Work Details-->
           <tr>
               <th>Email Address</th>
               <th>House Number</th>
               <th>Marital Status</th>
               <th>Level of Education</th>
               <th>Place of Work</th>
               <th>National Id</th>
               <th>Passport</th>
               <th>Language</th>
               
           </tr>
           
           <tr>
               <td><?php echo $member -> Email; ?></td>
               <td><?php echo $member -> House; ?></td>
               <td><?php echo $member -> Marital_Status; ?></td>
               <td><?php echo $member -> Level_of_education; ?></td>
               <td><?php echo $member -> Place_of_work; ?></td>
               <td><?php echo $member -> National_id; ?></td>
               <td><?php echo $member -> Passport; ?></td>
               <td><?php echo $member -> Country; ?></td>
           </tr>
        </table>      
    </div>
</div>
