<?php
error_reporting(E_ALL ^ E_NOTICE);
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('sunday_money/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<style>
    table, select {
        font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
    }
</style>


<br />

<a class="action_button" id="new_balance" href="<?php echo site_url("sunday_money"); ?>">Tithes and Offerings</a>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Cheque Details</th>
        </tr>
        
        <tr>
            <td>Bank Name</td>
            <td class="othertext">
                <select name="bank" id="" >
                <option value="">Select Bank</option>
                <?php
                foreach ($banks as $bank_data) {
                    echo "<option value=".$bank_data->id." selected>".$bank_data->Name."</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        
         <tr>
            <td>Amount</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'amount', 'value' => $amount, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Cheque Number</td>
            <td><?php

            $data_search = array('name' => 'cheque_number', 'value' => $cheque_number, 'class' => 'othertext', 'id'=>'');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Drawer</td>
            <td><?php

            $data_search = array('name' => 'drawer', 'value' => $drawer, 'class' => 'othertext', 'id'=>'');
            echo form_input($data_search);
            ?></td>
        </tr>
        <input type="hidden" name="cashorcheque" value="1" />


        <tr>
        	<td>Account</td>
        	<td>
        		<!--select with registered banks-->
        		<select name="bank_related_account_credited" id="registered_banks" required>
                <option value="">Select Account</option>
                <?php
                foreach ($registeredbanks as $church_banks) {
                    echo "<option value=".$church_banks->bank.">".$church_banks->account_name."</option>";
                }
                ?>
            </select>
        	</td>
        	<td>
        		Balance{<input type="text" value="0" id="balance_account" readonly="" style="border: 0"/>}
        	</td>
        </tr>
         <tr>
            <input type="hidden" name="account_balance" value="0" id="account_balance" />
        </tr>



        <tr>
            <td><input name="submit" type="submit" value="Save Balance" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>
    


<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
	 $(document.getElementById('registered_banks')).change(function() {

        $.ajax({
            url : '../account_balance.php',
            data : { registered_banks: document.getElementById('registered_banks').value},

            dataType : 'json',
            success : function(data) {
                var opening_balance = data[0];
                 var opening_bala_duplicate = data[1];
               	$('#account_balance').val(opening_bala_duplicate);
                $('#balance_account').val(numberWithCommas(opening_balance));
            },
            error : function(data) {
                document.getElementById('account_balance').value = "0";
                document.getElementById('balance_account').value = "0";
            } 
        });
    });
    
</script>