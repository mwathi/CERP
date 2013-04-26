<br />
<style>
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
<a class="action_button" id="new_balance" href="<?php echo site_url("balances_management/listing"); ?>">Balances</a>
<div class="holder" style="margin-top: 50px; width: 500px;   font-family:'Segoe UI' ">
<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('balances_management/pay_balance', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
echo "<b>Supplier</b> ". $balance_data-> Suppliers -> Company_Name.
	 "<br/>".
	 "<br/>".
     "<b>Balance Due</b> ".$balance_data-> Balance_Due.
     "<br/><br/>";?>
      
	 <b>Pay From</b> 
	 <select name="bank_related_account_credited" id="registered_banks" required>
                <option value="">Select Account</option>
                <?php foreach ($registeredbanks as $church_banks) {
                echo "<option value='$church_banks->bank'>$church_banks->account_name</option>";
                }?>
     </select>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     Balance{<input type="text" name="account_balance" value="0" id="account_balance" readonly="" style="border: 0"/>}
     <br />
     <br />
     <input type="hidden" name="balance_account" id="balance_account" value="0"/>
     <input type="hidden" name="balance_due" value="<?php echo $balance_data-> Balance_Due ?>" />
     <input type="hidden" name="idee" id="" value="<?php echo $balance_data->id ?>"/>
     <input type="hidden" name="supplier" id="" value="<?php echo $balance_data-> Supplier ?>"/>
     <input type="hidden" name="transactionid" id="" value="<?php echo $balance_data-> Transaction_Id ?>"/>
     <input type="submit" class="submit">
	 	
</div>
<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
	 $(document.getElementById('registered_banks')).change(function() {

        $.ajax({
            url : '<?php echo site_url('account_balance.php') ?>',
            data : { registered_banks: document.getElementById('registered_banks').value},

            dataType : 'json',
            success : function(data) {
                var opening_balance = data[0];
                var opening_bala_duplicate = data[1];
               	document.getElementById('balance_account').value = opening_bala_duplicate;
                document.getElementById('account_balance').value = numberWithCommas(opening_balance);
            },
            error : function(data) {
                document.getElementById('account_balance').value = "0";
                document.getElementById('balance_account').value = "0";
            } 
        });
    });
    </script>