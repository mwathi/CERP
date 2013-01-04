<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<style>
	input, p, select {
		font: .75em "Segoe UI", Segoe, Arial, Sans-Serif;
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
	<div align="center" class="othertext">
		
<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('pledge_controller/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

		<div id="250div" class="holder" style="width: 12%; margin-left: 8%;">
		    <!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
			<p>
				<i> Pledges</i>
			</p>
			<br />
			<select name="pledgecause" id="cause">
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
            
			<input type="text" name="pledge" placeholder="Enter amount in Shillings" style="width: 200px">				
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<select style="width: 200px; height: 20px" name="pledgeplan">
			    <option value="">Select Pledge Plan</option>
				<option value="oneoff">One Off Pledge</option>
				<option value="weekly">Weekly</option>
				<option value="monthly">Monthly</option>
				<option value="quarterly">Quarterly</option>
				<option value="semiannually">Semi-annually</option>
				<option value="annually">Annually</option>
			</select>
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<input type="text" name="pledgename" placeholder="Name"/>
			<br />
			<br />
			<input type="text" name="pledgetelephone" placeholder="Telephone"/>
			<br />
			<br />
			<input type="text" name="pledgeaddress" placeholder="Address"/>
			<br />
			<br />
			<input type="text" name="pledgeemail" placeholder="Email Address"/>
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />

		</div>
</form>
	</div>
</div>
