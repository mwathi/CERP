<?php
if (isset($church)) {
    $church_id = $church -> id;
    $church_name = $church -> Church_Name;
    $bank = $church -> Bank;
    $account_number = $church -> Account_Number;
    $opening_balance = $church -> Opening_Balance;
    $opening_balance_date = $church -> Opening_Balance_Date;
} else {
    $church_id = "";
    $church_name = "";
    $bank = "";
    $account_number = "";
    $opening_balance = "";
    $opening_balance_date = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('church_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<script>
	$(function() {
		$("#opening_balance_date").datepicker({
			changeMonth : true,
			changeYear : true,
			yearRange : "-100"
		});
		;
	});

</script>

<style>
    table, select {
        font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
    }
    
    .submit {
        letter-spacing: 1px;
        text-align: center;
        color: white;
        height: 35px;
        width: auto;
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
<a class="action_button" id="new_church_particulars" href="<?php echo site_url("church_management/listing"); ?>">Church Information</a>
<input type="hidden" name="church_id" value = "<?php echo $church_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Church Details</th>
        </tr>
        
        <tr>
            <td>Church Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'church_name', 'value' => $church_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Bank</td>
            <td class="othertext"><select name="bank" id="bank" >
                <option value="">Select Bank</option>
                <?php
                foreach ($banks as $bank) {
                    echo "<option value='$bank->id'>$bank->Name</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        
        <tr>
            <td>Account Number</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'account_number', 'value' => $account_number, 'class' => 'othertext', 'maxlength' => '14');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Opening Balance</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'opening_balance', 'value' => $opening_balance, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Opening Balalnce Date</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'opening_balance_date', 'value' => $opening_balance_date, 'class' => 'othertext', 'id' => 'opening_balance_date');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <input type="hidden" value="<?=$partakings -> Transaction_Value;?>" name="opening_opening_balance" />

        
        <tr>
            <td><input name="submit" type="submit" value="Save Church Details" class="submit"></td>
        </tr>
    </table>
    </form>
    </div>