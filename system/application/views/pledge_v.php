<div id="view_content">
        <br />
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/makepledge"); ?>" style="width: 100px">Make a Pledge</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/makecontribution"); ?>" style="width: 135px">Make a Contribution</a>
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
            <tr style="height: 10px"></tr>
            <tr class="yellow">
                <th>Cause</th>
                <th>Total Pledges Made</th>
                <!--th>Date Created</th>
                <th>Amount Targeted</th>
                <th>Deadline</th-->
                <th></th>                        
            </tr>
                    <?php
                    foreach($causedata as $cause_data){?>
                        <tr>                                                                        
                        <td><?php echo $cause_data -> Causes -> Name ?></td>                                                                      
                        <td><?php echo $cause_data -> Total_Pledges ?></td>                       
                        <td><a href="<?php echo base_url()."pledge_controller/pledge_details/".$cause_data ->id ?>">View Details</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
