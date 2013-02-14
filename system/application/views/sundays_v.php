<div id="view_content">
    <br />
    <a class="action_button" id="new_post" href="<?php echo site_url("sunday_money/add"); ?>">Add Tithe or Offering</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Date</th>
            </tr>
                    <?php
                    foreach($sunday as $sundays){?>
                        <tr>                                                                        
                        <td><?php echo $sundays -> Date ?></td>                                                                      
                        <td><a href="<?php echo base_url()."sunday_money/view_sunday/".$sundays ->id ?>">View All Information</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
