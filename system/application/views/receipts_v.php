<br />
<div id="view_content">
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">                
                <th>Member Name</th>
                <th>Date OF Contribution</th>    
            </tr>
                    <?php
                    foreach($causedata as $asset_data){?>
                        <tr>                                                                        
                        <td><?php echo $asset_data -> Flock -> First_Name . $asset_data -> Flock -> Last_Name ." ". $asset_data -> Flock -> Surname ?></td>
                        <td><?php echo $asset_data -> Date_of_Contribution ?></td>
                        <td><a href="<?php echo base_url().'pledge_controller/issuereceipt/'.$asset_data -> Member_Number."/".$asset_data->Date_of_Contribution."/".$asset_data->Cause ?>">View Receipt</a></td>                                                                      
                        </tr>
                        <?php
                        }

                       
                    ?>
        </table>      
    </div>
</div>
