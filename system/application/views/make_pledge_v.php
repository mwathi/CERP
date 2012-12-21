<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script type="text/javascript">
	$(function() {
		$("#first_name").autocomplete({
			source : "pledge_controller/suggestions" // name of controller
		});
	}); 
</script>
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
	input {
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

		<div id="250div" class="holder" style="width: 12%; margin-left: 8%;margin-right: 3%;margin-bottom: 3%;margin-top: 3%; float: left">
		    <!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
			<p>
				<i>Small Pledges</i>
			</p>
			<br />
			<select name="smallpledgecause" id="cause">
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
            
			<select style="width: 100px; height: 20px" name="smallpledge">
				<option value="100">KES. 100</option>
				<option value="150">KES. 150</option>
				<option value="250">KES. 250</option>
			</select>
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<select style="width: 100px; height: 20px" name="smallpledgeplan">
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
			<input type="text" name="smallpledgename" placeholder="Name"/>
			<br />
			<br />
			<input type="text" name="smallpledgetelephone" placeholder="Telephone"/>
			<br />
			<br />
			<input type="text" name="smallpledgeaddress" placeholder="Address"/>
			<br />
			<br />
			<input type="text" name="smallpledgeemail" placeholder="Email Address"/>
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />

		</div>

		<div id="500div" class="holder" style="width: 12%; margin: 3%; float: left">
			<p>
				<i>Medium Pledges</i>
			</p>
			<br />
            <select name="mediumpledgecause" id="cause">
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
            
			<select style="width: 100px; height: 20px" name="mediumpledge">
				<option value="500">KES. 500</option>
				<option value="650">KES. 650</option>
				<option value="700">KES. 700</option>
			</select>
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<select style="width: 100px; height: 20px" name="mediumpledgeplan">
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
			<input type="text" name="mediumpledgename" placeholder="Name"/>
			<br />
			<br />
			<input type="text" name="mediumpledgetelephone" placeholder="Telephone"/>
			<br />
			<br />
			<input type="text" name="mediumpledgeaddress" placeholder="Address"/>
			<br />
			<br />
			<input type="text" name="mediumpledgeemail" placeholder="Email Address"/>
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />
		</div>

		<div id="750div" class="holder" style="width: 12%; margin: 3%; float: left">
			<p>
				<i>Great Pledges</i>
			</p>
			<br />
            <select name="greatpledgecause" id="cause">
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
            
			<select style="width: 100px; height: 20px" name="greatpledge">
				<option value="800">KES. 800</option>
				<option value="900">KES. 900</option>
				<option value="1000">KES. 1000</option>
			</select>
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<select style="width: 100px; height: 20px" name="greatpledgeplan">
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
			<input type="text" name="greatpledgename" placeholder="Name"/>
			<br />
			<br />
			<input type="text" name="greatpledgetelephone" placeholder="Telephone"/>
			<br />
			<br />
			<input type="text" name="greatpledgeaddress" placeholder="Address"/>
			<br />
			<br />
			<input type="text" name="greatpledgeemail" placeholder="Email Address"/>
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />
		</div>

		<div id="1000div" class="holder" style="width: 12%; margin: 3%; float: left">
			<p>
				<i>Major Pledges</i>
			</p>
			<br />
            <select name="majorpledgecause" id="cause">
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
            
			<select style="width: 100px; height: 20px" name="majorpledge">
				<option value="10000">KES. 10000</option>
				<option value="15000">KES. 15000</option>
				<option value="25000">KES. 25000</option>
			</select>
			<br />
			<br />
			<br />
			<p style="border-bottom: 1px solid grey"></p>
			<br />
			<select style="width: 100px; height: 20px" name="majorpledgeplan">
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
			<input type="text" name="majorpledgename" placeholder="Name"/>
			<br />
			<br />
			<input type="text" name="majorpledgetelephone" placeholder="Telephone"/>
			<br />
			<br />
			<input type="text" name="majorpledgeaddress" placeholder="Address"/>
			<br />
			<br />
			<input type="text" name="majorpledgeemail" placeholder="Email Address"/>
			<br />
			<br />
			<br />
			<input type="submit" class="submit" />
		</div>
</form>
	</div>
</div>
