<div id="view_content">
    <br />
    <a class="action_button" id="new_relief" href="<?php echo site_url("benefit_management/addRelief"); ?>">New relief</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Relief</th>
                <th>Rate</th>    
                <th>Description</th>                             
            </tr>
                    <?php
                    foreach($reliefs as $relief_data){?>
                        <tr>                                                                        
                        <td><?php echo $relief_data -> Name ?></td>                                                                      
                        <td><?php echo $relief_data -> Rate ?></td>      
                        <td><?php echo $relief_data -> Description ?></td>                                                           
                        <td><a href="<?php echo base_url()."benefit_management/deleteRelief/".$relief_data -> id ?>" onclick="return confirm('Are you sure you want to delete this relief?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."benefit_management/edit_relief/".$relief_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
