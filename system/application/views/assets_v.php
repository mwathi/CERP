<div id="view_content">
    <a class="action_button" id="new_asset" href="<?php echo site_url("asset_management/add"); ?>">New Asset</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">                
                <th>Name</th>
                <th>Serial NO.</th>
                <th>Date_Purchased</th>    
            </tr>
                    <?php
                    foreach($assets as $asset_data){?>
                        <tr>                                                                        
                        <td><?php echo $asset_data -> Name ?></td>                                                                      
                        <td><?php echo $asset_data -> Serial_Number ?></td>      
                        <td><?php echo $asset_data -> Date_Purchased ?></td>                                                           
                        <td><a href="<?php echo base_url()."asset_management/delete/".$asset_data -> id ?>" onclick="return confirm('Are you sure you want to delete this asset?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."asset_management/edit_asset/".$asset_data ->id ?>">Edit</a></td>
                        <td><a href="<?php echo base_url()."asset_management/manage_asset/".$asset_data ->id ?>">Manage Asset</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
