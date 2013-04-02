<br />
<div id="view_content">
    <a class="action_button" id="assets" href="<?php echo site_url("asset_management"); ?>">Assets</a>
    <a class="action_button" id="new_church" href="<?php echo site_url("church_management/add"); ?>">New Information</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">                
                <th>Church Name</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Opening Balance</th>
                <th>Opening Balance Date</th>
            </tr>
                    <?php
                    foreach($church as $church_data){?>
                        <tr>                                                                        
                        <td><?php echo $church_data -> Church_Name ?></td>                                                                      
                        <td><?php echo $church_data -> Banks -> Name ?></td>      
                        <td><?php echo $church_data -> Account_Number?></td>
                        <td><?php echo "KES&nbsp<b>".number_format($church_data -> Opening_Balance) ."</b>"; ?></td>
                        <td><?php echo $church_data -> Opening_Balance_Date ?></td>
                        <td><a href="<?php echo base_url()."church_management/delete/".$church_data -> id ?>" onclick="return confirm('Are you sure you want to delete this church information?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."church_management/edit_church/".$church_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
