<style>
    input, p, select, span {
        font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
    }
    ::-webkit-input-placeholder, select {
        font-style: italic;
    }
    ::-webkit-input-placeholder {
        font-size: 12px;
        text-align: center;
    }
    input,select {
        text-align: center;
        width: 150px;
    }

</style>

<div id="view_content">
    <div id="space" style="height: 20px"></div>

    <a class="action_button" id="parents" href="<?php echo site_url("flock_management/allParentsListing"); ?>">Adults</a>
    <a class="action_button" id="youth" href="<?php echo site_url("flock_management/allYouthListing"); ?>">Youth</a>
    <a class="action_button" id="children" href="<?php echo site_url("flock_management/allChildrenListing"); ?>">Children</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("group_management/listing"); ?>">Groups</a>
    <a class="action_button" id="reports" href="<?php echo site_url("flock_management/allListing"); ?>">Member Reports</a>
    <a class="action_button" id="causes" href="<?php echo site_url("pledge_controller/causelisting"); ?>">Causes</a>
     <?php 
    if($username != '' || $username != NULL){
    ?>
    <a class="action_button" id="pledges" href="<?php echo site_url("home_controller/log_out"); ?>">Logout</a>	
    <?php
	}else{
	}
    ?>
    
    <br />      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr>
                <th>
                    <?php echo form_open('flock_management/searchMember');?>
                        <input type="text" name="search" placeholder="Enter Search Field"/></th><td style="border-bottom: 0; color: #FFF">
                        <input type="submit" value="Search" class="button"/>
                    <?php echo form_close();?>
                </td>
            </tr>
            <tr><th>Latest Additions: Parents</th></tr>
            <tr class="yellow">
                <th>Member Number</th>
                <th><a href="<?php echo base_url()."flock_management/order/Surname"?>"> Member </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Member_Group"?>"> Group </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Phone"?>"> Phone Number</a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Gender"?>">Gender</a></th>
                <th>Age</th>
                <th><a href="<?php echo base_url()."flock_management/order/Spouse"?>">Spouse</a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Children"?>">Number of Children</a></th>
                <th>Address</th>
                <th><a href="<?php echo base_url()."flock_management/order/Email"?>">Email Address</a></th>                
            </tr>
                    <?php
                    foreach($parentmembers as $parentmember_data){?>
                        <tr>
                        <td><?php echo $parentmember_data -> Member_Number ?></td>                                                                        
                        <td><?php echo $parentmember_data -> Surname ." ". $parentmember_data -> Last_Name ." ". $parentmember_data -> First_Name ?></td>     
                        <td><?php echo $parentmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $parentmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $parentmember_data -> Gender ?></td>
                        <td><?php echo  (date('Y-m-d') - $parentmember_data -> Date_of_Birth) ?></td>
                        <td><?php echo $parentmember_data -> Spouse ?></td>
                        <td><?php echo $parentmember_data -> Children ?></td>
                        <td><?php echo $parentmember_data -> Physical_Address ?></td>
                        <td><?php echo $parentmember_data -> Email ?></td>
                        <td><a href="<?php echo base_url()."flock_management/manage_member/".$parentmember_data ->Member_Number ?>">View More Information</a></td>
                   
                        <!--<td><a href="<?php echo base_url()."flock_management/delete/".$parentmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$parentmember_data ->id ?>">Edit</a></td>-->
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
    
    <div id="space"></div>
        <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Latest Additions: Youths</th></tr>
            <tr class="yellow">
                <th>Member Number</th>
                <th><a href="<?php echo base_url()."flock_management/order/Surname"?>"> Member </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Member_Group"?>"> Group </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Phone"?>"> Phone Number</a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Gender"?>">Gender</a></th>
                <th>Age</th>
                        
                <th>Address</th>
                <th><a href="<?php echo base_url()."flock_management/order/Email"?>">Email Address</a></th>
            </tr>
                    <?php
                    foreach($youthmembers as $youthmember_data){?>
                        <tr>                                                            
                             <td><?php echo $youthmember_data -> Member_Number ?></td>            
                        <td><?php echo $youthmember_data -> Surname ." ". $youthmember_data -> First_Name ." ". $youthmember_data -> Last_Name ?></td>
                        <td><?php echo $youthmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $youthmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $youthmember_data -> Gender ?></td>
                                     
                        <td><?php echo (date('Y-m-d') - $youthmember_data -> Date_of_Birth) ?></td>     
                        <td><?php echo $youthmember_data -> Physical_Address ?></td>                                                                       
                        <td><?php echo $youthmember_data -> Email ?></td>
                   
                        <!--td><a href="<?php echo base_url()."flock_management/delete/".$youthmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$youthmember_data ->id ?>">Edit</a></td-->
                        <td><a href="<?php echo base_url()."flock_management/manage_member/".$youthmember_data ->Member_Number ?>">View More Information</a></td>
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
    
    <div id="space"></div>
        <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr><th>Latest Additions: Children</th></tr>
            <tr class="yellow">
               <th>Member Number</th>
                <th><a href="<?php echo base_url()."flock_management/order/Surname"?>"> Member </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Member_Group"?>"> Group </a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Phone"?>"> Phone Number</a></th>
                <th><a href="<?php echo base_url()."flock_management/order/Gender"?>">Gender</a></th>
                <th>Age</th>
                
                
                <th>Address</th>
                <th><a href="<?php echo base_url()."flock_management/order/Email"?>">Email Address</a></th>
            </tr>
                    <?php
                    foreach($childrenmembers as $childrenmember_data){?>
                        <tr>
                        <td><?php echo $childrenmember_data -> Member_Number ?></td>                                                                            
                        <td><?php echo $childrenmember_data -> Surname ." ". $childrenmember_data -> First_Name ." ". $childrenmember_data -> Last_Name ?></td>
                        <td><?php echo $childrenmember_data -> Groups -> Group_Name ?></td>                                             
                        <td><?php echo $childrenmember_data -> Phone ?></td>                       
                        <td id="gender"><?php echo $childrenmember_data -> Gender ?></td>
                             
                        <td><?php echo (date('Y-m-d') - $childrenmember_data -> Date_of_Birth) ?></td>     
                        <td><?php echo $childrenmember_data -> Physical_Address ?></td>                                                                       
                        <td><?php echo $childrenmember_data -> Email ?></td>
                   
                        <!--td><a href="<?php echo base_url()."flock_management/delete/".$childrenmember_data -> id ?>" onclick="return confirm('Are you sure you want to delete this member?')" >Delete</a></td>
                        <td><a href="<?php echo base_url()."flock_management/edit_member/".$childrenmember_data ->id ?>">Edit</a></td-->
                        <td><a href="<?php echo base_url()."flock_management/manage_member/".$childrenmember_data ->Member_Number ?>">View More Information</a></td>
                        
                      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
