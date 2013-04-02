<div id="view_content">
        <br />
    <a class="action_button" id="" href="<?php echo site_url("cheque_management/add"); ?>" style="width: 100px">New Cheque</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr height="10px"></tr>
            <tr class="yellow">
                <th>Bank</th>
                <th>Cheque Number</th>
                <th>Drawer</th>
                <th>Amount</th>
                <th>Issued To</th>
            </tr>
                    <?php
                    foreach($cheques as $cause_data){?>
                        <tr>                                                                        
                        <td><?php echo $cause_data -> Banks -> Name ?></td>                                                                      
                        <td><?php echo $cause_data -> Cheque_Number ?></td>
                        <td><?php echo $cause_data -> Drawer ?></td>
                        <td><?php echo $cause_data -> Amount ?></td>     
                        <td><?php echo $cause_data -> Issued_To ?></td>                       
                        <td><a href="<?php echo base_url()."cheque_management/delete/".$cause_data -> id ?>" onclick="return confirm('Are you sure you want to delete this cheque?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."cheque_management/edit_cheque/".$cause_data ->id ?>">Edit</a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
