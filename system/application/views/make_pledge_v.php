<link href="<?php echo base_url().'system/CSS/jquery.ui.all.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery-1.7.2.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.bgiframe-2.1.2.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.core.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.widget.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.mouse.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.button.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.draggable.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.position.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.dialog.js'?>"></script>


<script>
    $(function() {
        $("#neworreturning").dialog({
            resizable : true,
            height : 250,
            modal : true,
            buttons : {
                "New" : function() {
                    $(document.getElementById("member_name")).replaceWith('<input type="text" name="member_name" id="member_name"/>');
                    $(this).dialog("close");
                },
                "Returning" : function() {
                    $(this).dialog("close");
                }
            }
        });
    });

</script>
<style>
	input, p, select {
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


<div id="view_content">
    <div id="neworreturning" title="New or Returning Member">Is this a returning member or a visitor?</div>
	<div align="center" class="othertext">
		
<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('pledge_controller/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<br />
		<div id="250div" class="holder" style="width: 25%; margin-left: 5%;">
		    <!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
			<p>
				<i> Make a Pledge</i>
			</p>
			<br />
			<p>
			Member Name
            <select name="member_name" id="member_name" required>
                <option value="" id="">Select Member</option>
                <?php
                foreach ($members as $member) {
                    echo '<option value="' . $member -> id . '" id="' . $member -> Member_Number. '">' .$member -> First_Name." ".$member -> Surname." ".$member -> Last_Name. '</option>';
                }//end foreach
                ?>
            </select>
			</p>
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			
			Select Cause <select name="pledgecause" id="cause">
                <option value="">Causes</option>
                <option value="0">General</option>
                <?php
                foreach ($causedata as $cause) {
                    echo "<option value='$cause->id'>$cause->Name</option>";
                }
                ?>
            </select>
            <br />
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            <br />
            
			Amount Pledged <input type="text" name="pledge" placeholder="Enter amount in Shillings">				
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			Select Pledge Plan <select name="pledgeplan">
			    <option value="">Select Pledge Plan</option>
				<option value="One Off">One Off Pledge</option>
				<option value="Weekly">Weekly</option>
				<option value="Monthly">Monthly</option>
				<option value="Quarterly">Quarterly</option>
				<option value="Semiannually">Semi-annually</option>
				<option value="Annually">Annually</option>
				<option value="Open">Open</option>
			</select>
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			
			<br />
			<input type="text" name="pledgetelephone" id="pledgetelephone" placeholder="Telephone" readonly=""/>
			<br />
			<br />
			<input type="text" name="pledgeaddress" id="pledgeaddress" placeholder="Address" readonly=""/>
			<br />
			<br />
			<input type="text" name="pledgeemail" id="pledgeemail" placeholder="Email Address" readonly=""/>
			<input type="hidden" name="pledgename" id="pledgename" />
			<input type="hidden" name="member_number" id="member_number" />
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />

		</div>
</form>
	</div>
</div>


<script>
    $(document.getElementById('member_name')).change(function() {
        $.ajax({
            url : '../members.php',
            data : "id=" + document.getElementById('member_name').value,

            dataType : 'json',
            success : function(data) {
                var phone = data[11];
                var member_number = data[1];
                var address = data[2];
                var email = data[19];
                var name = data[3] + " " + data[4] + " " + data[5];

                document.getElementById('pledgeemail').value = email;
                document.getElementById('pledgename').value = name;
                document.getElementById('pledgeaddress').value = address;
                document.getElementById('pledgetelephone').value = phone;
                document.getElementById('member_number').value = member_number;
            }
        });
    });

    </script>