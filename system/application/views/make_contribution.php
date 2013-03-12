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
            resizable : false,
            height : 200,
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

<br />
<br />

<div id="view_content">
    <div id="neworreturning" title="New or Returning Client">Is this a new or returning member?</div>
    <div align="center" class="othertext">
        
<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('pledge_controller/save_contribution', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

        <div id="250div" class="holder" style="width: 25%; margin-left: 5%;">
            <!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
            <p>
                <i> Make a Contribution</i>
            </p>
            <br />
            <p>
                        Select Cause <select name="pledgecause" id="cause">
                <option value="">Causes</option>
                <option value="0">General</option>
                <?php
                foreach ($causedata as $cause) {
                    echo "<option value='$cause->id'>$cause->Name</option>";
                }
                ?>
            </select>
            </p>
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            <br />
            

            
            
            Member Name
            <select name="member_name" id="member_name" required>
                <option value="" id="">Select Member</option>
                <?php
                foreach ($members as $member) {
                    echo '<option value="' . $member -> Member_Number . '" id="' . $member -> Member_Number . '">' . $member -> First_Name . " ". $member -> Surname ." ". $member -> Last_Name . '</option>';
                }//end foreach
                ?>
            </select>
            <br />
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            <br />
            
            Amount Pledged <input type="text" name="pledge" id="pledge" readonly="" style="border: 0; " value="">                
            <br />
            <br />
            Amount to Contribute <input type="text" name="contribution">
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
            <br />
            <br />
            <input type="text" name="dateofcontribution" id="dateofcontribution" value="<?php echo date('Y-m-d')?>" readonly/>
            <input type="hidden" name="pledgename" id="pledgename" />
            <input type="hidden" name="member_number" id="member_number" />
            <input type="hidden" name="pledgetobesaved" id="pledgetobesaved" />
            <input type="hidden" value="<?=$partakings -> Transaction_Value;?>" name="opening_balance" />
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
            url : '../contributors.php',
            data : { id: document.getElementById('member_name').value, cause: document.getElementById('cause').value},

            dataType : 'json',
            success : function(data) {
                var phone = data[3];
                var member_number = data[1];
                var address = data[4];
                var email = data[5];
                var name = data[2];
                var pledge = data[0];
                var pledgetobesaved = data[0];

                document.getElementById('pledgeemail').value = email;
                document.getElementById('pledgename').value = name;
                document.getElementById('pledgeaddress').value = address;
                document.getElementById('pledgetelephone').value = phone;
                document.getElementById('member_number').value = member_number;
                document.getElementById('pledge').value = pledge;
                document.getElementById('pledgetobesaved').value = pledgetobesaved;
            },
            error : function(data) {
                document.getElementById('pledgeemail').value = "";
                document.getElementById('pledgename').value = "";
                document.getElementById('pledgeaddress').value = "";
                document.getElementById('pledgetelephone').value = "";
                document.getElementById('member_number').value = "";
                document.getElementById('pledge').value = "";
                document.getElementById('pledgetobesaved').value = "";
            } 
        });
    });

    </script>
<script>
        $(document.getElementById('cause')).change(function() {

        $.ajax({
            url : '../contributors.php',
            data : { id: document.getElementById('member_name').value, cause: document.getElementById('cause').value},

            dataType : 'json',
            success : function(data) {
                var phone = data[3];
                var member_number = data[1];
                var address = data[4];
                var email = data[5];
                var name = data[2];
                var pledge = data[0];
                var pledgetobesaved = data[0];

                document.getElementById('pledgeemail').value = email;
                document.getElementById('pledgename').value = name;
                document.getElementById('pledgeaddress').value = address;
                document.getElementById('pledgetelephone').value = phone;
                document.getElementById('member_number').value = member_number;
                document.getElementById('pledge').value = pledge;
                document.getElementById('pledgetobesaved').value = pledgetobesaved;
            },
            error : function(data) {
                document.getElementById('pledgeemail').value = "";
                document.getElementById('pledgename').value = "";
                document.getElementById('pledgeaddress').value = "";
                document.getElementById('pledgetelephone').value = "";
                document.getElementById('member_number').value = "";
                document.getElementById('pledge').value = "";
                document.getElementById('pledgetobesaved').value = "";
            } 
        });
    });
</script>

