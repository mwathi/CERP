<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

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
	input, select {
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
	<div align="center" class="othertext">

		<?php
        $attributes = array('enctype' => 'multipart/form-data');
        echo form_open('sunday_money/save', $attributes);
        echo validation_errors('
<p class="error">', '</p>
');
		?>
		<div style="height: 50px"></div>
		<div id="250div" class="holder" style="width: 25%; margin-left: 5%;">
			<!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
			<p>
				<i> Add Tithe or Offering Information</i>
			</p>
			<br />
			<p>
				Youth Service Amount
				<input type="text" name="youthservice" id="youthservice" value="0" onfocusout="dave()"/>
			</p>
			<br />

			Teens Service Amount
			<input type="text" name="teens" id="teens" value="0" onfocusout="dave()"/>
			<br />
			<br />

			Sunday School Amount
			<input type="text" name="sunday_school" id="ss" value="0" onfocusout="dave()"/>
			<br />
			<br />
			English Service Amount
			<input type="text" name="english_service" id="es" value="0" onfocusout="dave()"/>
			<br />
			<br />

			Swahili Service Amount
			<input type="text" name="swahili_service" id="sws" value="0" onfocusout="dave()"/>
			<br />
			<br />

			Monthly Pledge Amount
			<input type="text" name="monthly_pledge" id="mp" value="0" onfocusout="dave()"/>
			<br />
			<br />

			Thanksgiving Amount
			<input type="text" name="thanksgiving" id="thk" value="0" onfocusout="dave()" />
			<br />
			<br />

			Tithe Amount
			<input type="text" name="tithe" id="tih" value="0" onfocusout="dave()"/>
			<br />
			<br />
			
	        <label id="total"></label>
			<input type="submit" class="submit" />

		</div>
		</form>
	</div>
</div>

<script>
function dave(){
	var val1 = parseInt(document.getElementById('youthservice').value);
	var val2 = parseInt(document.getElementById('teens').value);
	var val3 = parseInt(document.getElementById('ss').value);
	var val4 = parseInt(document.getElementById('es').value);
	var val5 = parseInt(document.getElementById('sws').value);
	var val6 = parseInt(document.getElementById('mp').value);
	var val7 = parseInt(document.getElementById('thk').value);
	var val8 = parseInt(document.getElementById('tih').value);
	
	var total = val1 + val2 + val3 + val4 + val5 + val6 + val7 + val8
	document.getElementById("total").innerHTML = total;
}
</script>

