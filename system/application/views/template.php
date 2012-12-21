<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link href="<?php echo base_url().'system/CSS/style.css'?>" type="text/css" rel="stylesheet"/> 
<link href="<?php echo base_url().'system/CSS/jquery-ui.css'?>" type="text/css" rel="stylesheet"/> 
<script src="<?php echo base_url().'system/Scripts/jquery.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'system/Scripts/jquery-ui.js'?>" type="text/javascript"></script> 


<?php
$this -> load -> helper(array('form', 'search'));
if (isset($scripts)) {
    foreach ($scripts as $script) {
        echo "<script src=\"" . base_url() . "system/Scripts/" . $script . "\" type=\"text/javascript\"></script>";
    }
}

if (isset($styles)) {
    foreach ($styles as $style) {
        echo "<link href=\"" . base_url() . "system/CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"/>";
    }
}
?>  

</head>

<body>
    <div id="header">
            <div class="wrap">
                <div class="menu">
                    <a class="menu-item logo" href="<?php echo base_url()."flock_management/listing"?>"> <span class="label">Church ERP</span> </a>                   
                </div>                              
            </div>
        </div>    
<div id="wrapper">
    <a class="action_button" id="employees" href="<?php echo site_url("employee_management/listing"); ?>">Employees</a>
     <a class="action_button" id="parents" href="<?php echo site_url("flock_management/allParentsListing"); ?>">Adults</a>
    <a class="action_button" id="youth" href="<?php echo site_url("flock_management/allYouthListing"); ?>">Youth</a>
    <a class="action_button" id="children" href="<?php echo site_url("flock_management/allChildrenListing"); ?>">Children</a>    
    <a class="action_button" id="reports" href="<?php echo site_url("flock_management/allListing"); ?>">Member Reports</a>
    <a class="action_button" id="pledges" href="<?php echo site_url("pledge_controller/causelisting"); ?>">Causes</a>
    
    
    
    <div id="main_wrapper"> 
        <?php $this -> load -> view($content_view); ?>
    </div>
  <!--End Wrapper div-->
</div>


</body>
</html>



