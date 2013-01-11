<div id="view_content">
    <a class="action_button" id="new_pledge" href="<?php echo site_url("pledge_controller/add"); ?>">New Cause</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Member Name</th>
                <th>Amount Pledged</th>
                <th>Amount Contributed</th>
                <th>Cause</th>
            </tr>
            
            <?php

            foreach($contributiondata as $contribution){
            ?>
            <tr>
                <td><?php echo $contribution -> Name; ?></td>
                <td><?php echo $contribution -> Pledge; ?></td>
                <td id="contribution"><?php echo $contribution -> Contribution_Made; ?></td>
                <td><?php echo $contribution -> Causes -> Name; ?></td>
            </tr>
            <?php
            }
            ?>
            
            
            <tr>
                <td></td>
                <td></td>
                <th>Total Contribution: <?php foreach($contriboot as $contribooting){echo $contribooting -> Total_Contribution_Made; }?></th>
                <th></th>
            </tr>
            

            
            
        </table>
    </div>
</div>
