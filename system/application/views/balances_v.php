<br />
<div id="view_content">
    <a class="action_button" id="new_asset" href="<?php echo site_url("balances_management/add"); ?>">Add Debt</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">                
                <th>Company Name</th>
                <th>Balance</th>
                <th>Date Entered</th>
                <th>Date Due</th>    
            </tr>
                    <?php
                    foreach($balances as $asset_data){?>
                        <tr>                                                                        
                        <td><?php echo $asset_data -> Suppliers -> Company_Name ?></td>                                                                      
                        <td><?php echo "<b>KES " .number_format($asset_data -> Balance_Due) ."</b>";  ?></td>      
                        <td><?php echo $asset_data -> Date_Created ?></td>     
                        <td><?php echo $asset_data -> Date_Due ?></td>                                                           
                        <td><a href="<?php echo base_url()."balances_management/edit_balance/".$asset_data ->id ?>">Edit Figures</a></td>
                        <td><a href="<?php echo base_url()."balances_management/pay_balance/".$asset_data ->id."/".$asset_data->Balance_Due."/".$partakings -> Transaction_Value; ?>" onclick="return confirm('Are you sure you want to settle this accout?')" >Pay Balance</a></td>
                        </tr>
                        <?php
                        }

                       
                    ?>
        </table>      
    </div>
</div>
