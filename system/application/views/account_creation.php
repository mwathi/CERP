<?php
if (isset($account)) {
    $account_id = $account -> id;
    $account_name = $account -> Name;
    $account_type = $account -> Type;
    $description = $account -> Description;
} else {
    $account_id = "";
    $account_name = "";
    $description = "";
    $account_type = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('account_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<br />

<a class="action_button" id="new_account" href="<?php echo site_url("account_management/listing"); ?>">Accounts</a>
<input type="hidden" name="account_id" value = "<?php echo $account_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Account Details</th>
        </tr>
        
        <tr>
            <td>Account Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'account_name', 'value' => $account_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Type</td>
            <td class="othertext">
                <select name="account_type">
                    <option value="Asset Account">Asset Account</option>
                    <option value="Expense Account">Expense Account</option>
                    <option value="Income Account">Income Account</option>
                    <option value="Liability Account">Liability Account</option>
                    <option value="Fixed Asset Account">Fixed Asset Account</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Description</td>
            <td><?php

            $data_search = array('name' => 'description', 'value' => $description, 'class' => 'othertext');
            echo form_textarea($data_search);
            ?></td>
        </tr>

        <tr>
            <td><input name="submit" type="submit" value="Save Account" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>