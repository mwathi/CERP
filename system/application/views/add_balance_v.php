<?php
if (isset($balance)) {
    $balance_id = $balance -> id;
    $balance_due = $balance -> Balance_Due;
    $date_due = $balance -> Date_Due;
} else {
    $balance_id = "";
    $balance_due = "";
    $date_due = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('balances_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>


<style>
    table, select {
        font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
    }
</style>
<script>
    $(function() {
        $("#date_due").datepicker({
            changeMonth : true,
            changeYear : true,
            yearRange : "-100"
        });
        ;
    });

</script>


<br />
<a class="action_button" id="new_balance" href="<?php echo site_url("balance_management/listing"); ?>">Balances</a>
<input type="hidden" name="balance_id" value = "<?php echo $balance_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Balance Details</th>
        </tr>
        
        <tr>
            <td>Supplier Name</td>
            <td class="othertext">
                <select name="supplier" id="supplier" >
                <option value="">Select Supplier</option>
                <?php
                foreach ($suppliers as $supplier) {
                    echo "<option value='$supplier->id' selected>$supplier->Company_Name</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        
         <tr>
            <td>Balance</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'balance', 'value' => $balance_due, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Date Due</td>
            <td><?php

            $data_search = array('name' => 'date_due', 'value' => $date_due, 'class' => 'othertext', 'id'=>'date_due');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td><input name="submit" type="submit" value="Save Balance" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>