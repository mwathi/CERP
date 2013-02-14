<br />

<div id="view_content">
    <a class="action_button" id="new_account" href="<?php echo site_url("account_management/add"); ?>">New Account</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Account Name</th>
                <th>Account Type</th>    
                <th>Description</th>                             
            </tr>
                    <?php
                    foreach($accounts as $account_data){?>
                        <tr>                                                                        
                        <td><?php echo $account_data -> Name ?></td>                                                                      
                        <td><?php echo $account_data -> Type ?></td>      
                        <td><?php echo $account_data -> Description ?></td>                                                           
                        <td><a href="<?php echo base_url()."account_management/delete/".$account_data -> id ?>" onclick="return confirm('Are you sure you want to delete this account?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."account_management/edit_account/".$account_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
