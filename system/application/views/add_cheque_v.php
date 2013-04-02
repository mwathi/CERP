<?php
if (isset($cheque)) {
    $cheque_id = $cheque -> id;
    $cheque_number = $cheque -> Cheque_Number;
    $drawer = $cheque -> Drawer;
    $issued_to = $cheque -> Issued_To;
    $amount = $cheque -> Amount;
} else {
    $cheque_id = "";
    $cheque_number = "";
    $drawer = "";
    $amount = "";
    $issued_to = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('cheque_management/save', $attributes);
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
<a class="action_button" id="" href="<?php echo site_url("cheque_management/listing"); ?>">Cheques</a>
<input type="hidden" name="cheque_id" value = "<?php echo $cheque_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Cheque Details</th>
        </tr>
        
        <tr>
            <td>Bank</td>
            <td class="othertext">
                <select name="bank" id="bank" >
                <option value="">Select Bank</option>
                <?php
                foreach ($banks as $benki) {
                    echo "<option value='$benki->id' selected>$benki->Name</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        
         <tr>
            <td>Cheque Number</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'cheque_number', 'value' => $cheque_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Drawer</td>
            <td><?php

            $data_search = array('name' => 'drawer', 'value' => $drawer, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Issued To</td>
            <td><?php

            $data_search = array('name' => 'issued_to', 'value' => $issued_to, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Amount</td>
            <td><?php

            $data_search = array('name' => 'amount', 'value' => $amount, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <input type="hidden" value="<?=$partakings -> Transaction_Value;?>" name="opening_balance" />

        <tr>
            <td><input name="submit" type="submit" value="Save Cheque" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>