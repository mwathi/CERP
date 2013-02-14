<br />
<div id="view_content">
    <a class="action_button" id="new_asset" href="<?php echo site_url("supplier_management/add"); ?>">New Supplier</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">                
                <th>Company Name</th>
                <th>Email</th>
                <th>Company Telephone</th>
                <th>Address</th>
                <th>City</th>
                <th>Zip</th>
                <th>Contact Name</th>
                <th>Contact Telephone</th>    
            </tr>
                    <?php
                    foreach($suppliers as $asset_data){?>
                        <tr>                                                                        
                        <td><?php echo $asset_data -> Company_Name ?></td>                                                                      
                        <td><?php echo $asset_data -> Email ?></td>      
                        <td><?php echo $asset_data -> Phone ?></td>
                        <td><?php echo $asset_data -> Address ?></td>
                        <td><?php echo $asset_data -> City ?></td>
                        <td><?php echo $asset_data -> Zip ?></td>
                        <td><?php echo $asset_data -> Contact_Name ?></td>
                        <td><?php echo $asset_data -> Contact_Phone ?></td>                                                           
                        <td><a href="<?php echo base_url()."supplier_management/delete/".$asset_data -> id ?>" onclick="return confirm('Are you sure you want to delete this asset?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."supplier_management/edit_supplier/".$asset_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
