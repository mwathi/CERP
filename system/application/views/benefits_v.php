<div id="view_content">
    <a class="action_button" id="new_benefit" href="<?php echo site_url("benefit_management/add"); ?>">New Benefit</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Benefit</th>
                <th>Rate</th>    
                <th>Description</th>                             
            </tr>
                    <?php
                    foreach($benefits as $benefit_data){?>
                        <tr>                                                                        
                        <td><?php echo $benefit_data -> Name ?></td>                                                                      
                        <td><?php echo $benefit_data -> Rate ?></td>      
                        <td><?php echo $benefit_data -> Description ?></td>                                                           
                        <td><a href="<?php echo base_url()."benefit_management/delete/".$benefit_data -> id ?>" onclick="return confirm('Are you sure you want to delete this benefit?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."benefit_management/edit_benefit/".$benefit_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
