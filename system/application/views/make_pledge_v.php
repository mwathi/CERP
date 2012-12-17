<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    


<script type="text/javascript">
$(function(){
  $("#first_name").autocomplete({
    source: "pledge_controller/suggestions" // name of controller
  });
});
</script>
<div id="view_content">   
    <div align="center" class="othertext">
        <i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i>
        <br />
        <br />
           
        <table style="font-size: 11px">
            <tr>
            
            <td> A total amount of: KES. 250 (minimum)<input type="text" name="minpledge" /> </td>
            <td> &nbsp;&nbsp;KES. 500 <input type="text" name="midpledge" /> </td> 
            <td> KES. 750 <input type="text" name="modpledge" /> </td> 
            <td> KES. 1000 <input type="text" name="maxpledge" /> </td>
            <td> More/Other <input type="text" name="otherpledge" /> </td>
            </tr>
            <tr style="height: 30px"></tr>
            
            <tr>
            <td> KES. <input type="text" name="weeklypledge" /> weekly</td>
            <td> KES. <input type="text" name="monthlypledge" /> monthly&nbsp;&nbsp;&nbsp;</td> 
            <td> KES. <input type="text" name="quarterlypledge" /> quarterly&nbsp;&nbsp;&nbsp;</td> 
            <td> KES. <input type="text" name="semiannualpledge" /> semi-annually&nbsp;&nbsp;&nbsp;</td>
            <td> KES. <input type="text" name="annualpledge" /> annually</td>
            </tr>
            <tr style="height: 30px"></tr>
            <tr style="height: 30px"></tr>
            <tr>
                <td>First Name <input type="text" name="first_name" id="first_name" /></td><td>Telephone <input type="text" name="telephone" id="telephone" /></td>
                 <td>Address <input type="text" name="address" id="address" /></td><td>Email Address<input type="text" name="email" id="email" /></td>
            </tr>
            <tr style="height: 10px"></tr>
            <tr>
               
            </tr>
            <tr style="height: 10px"></tr>
            <tr>
                <td>City <input type="text" name="city" id="city" /></td><td>Country <input type="text" name="state" id="state" /></td>
                <td>Zip <input type="text" name="zip" id="zip" /></td>
            </tr>
            
        </table>
    </div>
</div>