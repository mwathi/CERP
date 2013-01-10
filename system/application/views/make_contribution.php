<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


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


<div id="view_content">
    <div id="neworreturning" title="New or Returning Client">Is this a new or returning member?</div>
    <div align="center" class="othertext">
        
<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('pledge_controller/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

        <div id="250div" class="holder" style="width: 20%; margin-left: 8%;">
            <!--i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i-->
            <p>
                <i> Make a Contribution</i>
            </p>
            <br />
            <p>
            Member Name
            <select name="member_name" id="member_name" required>
                <option value="" id="">Select Member</option>
                <?php
                foreach ($members as $member) {
                    echo '<option value="' . $member -> Member_Number . '" id="' . $member -> Member_Number . '">' . $member -> First_Name . '</option>';
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
            url : '../contributors.php',
            data : "id=" + document.getElementById('member_name').value,

            dataType : 'json',
            success : function(data) {
                var phone = data[3];
                var member_number = data[1];
                var address = data[4];
                var email = data[5];
                var name = data[2];

                document.getElementById('pledgeemail').value = email;
                document.getElementById('pledgename').value = name;
                document.getElementById('pledgeaddress').value = address;
                document.getElementById('pledgetelephone').value = phone;
                document.getElementById('member_number').value = member_number;
                document.getElementById('pledge').value = member_number;
            }
        });
    });

    </script>