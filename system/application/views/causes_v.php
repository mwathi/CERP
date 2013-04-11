<div id="view_content">
        <br />
        <a class="action_button" id="" href="<?php echo site_url("pledge_controller/pledgelisting"); ?>" style="width: 150px">View Pledges Report</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/makepledge"); ?>" style="width: 100px">Make a Pledge</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/makecontribution"); ?>" style="width: 135px">Make a Contribution</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/makechequecontribution"); ?>" style="width: 175px">Make cheque Contribution</a>
    <a class="action_button" id="new_pledge" href="<?php echo site_url("pledge_controller/add"); ?>" style="width: 100px">New Cause</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            
                        <tr>
                <th>
                    <?php echo form_open('pledge_controller/searchPledge'); ?>
                        <input type="text" name="search" placeholder="Enter Search Field"/></th><td style="border-bottom: 0; color: #FFF">
                        <input type="submit" value="Search" class="button"/>
                    <?php echo form_close(); ?>
                </td>
            </tr>
            <tr height="10px"></tr>
            <tr class="yellow">
                <th>Cause</th>
                <th>Description</th>
                <th>Date Created</th>
                <th>Amount Targeted</th>
                
                <th>Deadline</th>                        
            </tr>
                    <?php
                    foreach($causedata as $cause_data){?>
                        <tr>                                                                        
                        <td><?php echo $cause_data -> Name ?></td>                                                                      
                        <td><?php echo $cause_data -> Description ?></td>                       
                        <td><?php echo date('F Y D', strtotime($cause_data -> Date_Created)) ?></td>
                        <td style="text-align: right"><?php
                            if ($cause_data -> Target != 0) {echo number_format($cause_data -> Target);
                            }
                            ?></td>
                        
                        <td><?php
                            if ($cause_data -> Deadline != "") {echo date('F Y D', strtotime($cause_data -> Deadline));
                            }
                        ?></td>                 
                        <td><a href="<?php echo base_url()."pledge_controller/delete_cause/".$cause_data -> id ?>" onclick="return confirm('Are you sure you want to delete this post?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."pledge_controller/edit_cause/".$cause_data ->id ?>">Edit</a></td>
                        <td><a href="<?php echo base_url()."pledge_controller/cause_details/".$cause_data ->id ?>">View Details</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
