<div id="view_content">
	<br />
    <a class="action_button" id="new_post" href="<?php echo site_url("post_management/add"); ?>">New Post</a>
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow">
                <th>Post</th>
                <th>Pay</th>
                <th>Description</th>                        
            </tr>
                    <?php
                    foreach($posts as $post_data){?>
                        <tr>                                                                        
                        <td><?php echo $post_data -> Name ?></td>                                                                      
                        <td>KES: <?php echo $post_data -> Pay ?></td>                       
                        <td><?php echo $post_data -> Description ?></td>                 
                        <td><a href="<?php echo base_url()."post_management/delete/".$post_data -> id ?>" onclick="return confirm('Are you sure you want to delete this post?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."post_management/edit_post/".$post_data ->id ?>">Edit</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
