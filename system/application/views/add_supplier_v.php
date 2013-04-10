<?php
if (isset($supplier)) {
    $supplier_id = $supplier -> id;
    $company_name = $supplier -> Company_Name;
    $email = $supplier -> Email;
    $phone = $supplier -> Phone;
    $address = $supplier -> Address;
    $city = $supplier -> City;
    $zip = $supplier -> Zip;
    $contact_name = $supplier -> Contact_Name;
    $contact_phone = $supplier -> Contact_Phone;
} else {
    $supplier_id = "";
    $company_name = "";
    $email = "";
    $phone = "";
    $address = "";
    $city = "";
    $zip = "";
    $contact_name = "";
    $contact_phone = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('supplier_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<br />
<a class="action_button" id="supplier" href="<?php echo site_url("supplier_management/listing"); ?>">Suppliers</a>
<input type="hidden" name="supplier_id" value = "<?php echo $supplier_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table class="othertext">
        
        <tr class="yellow">
        <th class="" colspan="2">Suppier Details</th>
        </tr>
        
        <tr>
            <td>Company Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'company_name', 'value' => $company_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Email Address</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'email', 'value' => $email, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

         <tr>
            <td>Company Telephone</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'phone', 'value' => $phone, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
                
         <tr>
            <td>Address</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'address', 'value' => $address, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>City</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'city', 'value' => $city, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Zip</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'zip', 'value' => $zip, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Contact Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'contact_name', 'value' => $contact_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Contact Telephone +254</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'contact_phone', 'value' => $contact_phone, 'class' => 'othertext', 'maxlength' => 9);
            echo form_input($data_search);
            ?></td>
        </tr>
        


        
        <tr>
            <td><input name="submit" type="submit" value="Save Supplier" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>