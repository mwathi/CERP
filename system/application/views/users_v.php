<br />
<div id="view_content">
    <a class="action_button" id="new_user" href="<?php echo site_url("user_management/add"); ?>">New User</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <div>
        <table class="reporttable">
            <tr class="yellow">
                <th>Names</th>
                <th>Username</th>
                <th>Email</th>         
            </tr>
                    <?php
                    foreach($user_details as $user_data){?>
                        <tr>                                                                        
                        <td><?php echo $user_data -> Name ?></td>
                        <td><?php echo $user_data -> Username ?></td>
                        <td><?php echo $user_data -> Email ?></td>
                        <td><a href="<?php echo base_url()."user_management/delete/".$user_data['id'] ?>">Delete</a></td>
                        <td><a href="<?php echo base_url()."user_management/edit_user/".$user_data['id'] ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>
    </div>

    </div>

</div>
