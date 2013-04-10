<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link href="<?php echo base_url().'system/CSS/style.css'?>" type="text/css" rel="stylesheet"/> 
<link href="<?php echo base_url().'system/CSS/jquery-ui.css'?>" type="text/css" rel="stylesheet"/> 
<script src="<?php echo base_url().'system/Scripts/jquery.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'system/Scripts/jquery-ui.js'?>" type="text/javascript"></script> 

<style>
    p, select, span {
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
    .submit {
        letter-spacing: 1px;
        text-align: center;
        color: white;
        height: 35px;
        width: 150px;
        padding: 0 8px;
        line-height: 15px;
        border: 1px solid gainsboro;
        background-color: #660198;
        cursor: pointer;
    }
    .submit:hover {
        background-color: #9A32CD;
    }

</style>
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
    <br />
    <div>
    <a class="header_action_button" id="employees" href="<?php echo site_url("employee_management/listing"); ?>">Employees</a>
    <span style="margin-right: 0.1%"></span>
    
 <a class="header_action_button" id="parents" href="<?php echo site_url("flock_management/listing"); ?>">Members</a>
 <span style="margin-right: 0.1%"></span>


    
    <a class="header_action_button" id="assets" href="<?php echo site_url("church_management"); ?>">Church</a>
    <span style="margin-right: 0.1%"></span>
    

    <a class="header_action_button" id="sunday_money" href="<?php echo site_url("sunday_money"); ?>">Tithes and Offerings</a>
    <span style="margin-right: 0.1%"></span>
    
    <a class="header_action_button" id="journal_entries" href="<?php echo site_url("journal_entries"); ?>">Financials</a>
    <span style="margin-right: 0.1%"></span>
    
    
        <?php 
    if($username != '' || $username != NULL){
    ?>
    <span style="float: right"><span>Welcome, </span><span style="font-weight: bold; color: #660198"><?php echo $username; ?></span></span>	
    <?php
	}else{
		
	}
    ?>
        </div>
    
    
    <div id="main_wrapper"> 
        <?php $this -> load -> view($content_view); ?>
    </div>
  <!--End Wrapper div-->
</div>


</body>
</html>



