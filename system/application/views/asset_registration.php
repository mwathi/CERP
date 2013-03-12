<?php
if (isset($asset)) {
    $asset_id = $asset -> id;
    $asset_name = $asset -> Name;
    $model = $asset -> Model;

    $serial_number = $asset -> Serial_Number;
    $location = $asset -> Location;
    $asset_cost = $asset -> Asset_Cost;
    $date_purchased= $asset -> Date_Purchased;
    $description = $asset -> Description;
    $userorassingedto = $asset -> User;
    $supplier_name = $asset -> Supplier_Name;
    $supplier_phone = $asset -> Supplier_Phone;
    $asset_number = $asset -> Asset_Number;
    $useful_life = $asset -> Useful_Life;
    $salvage = $asset -> Salvage_Value;
} else {
    $asset_id = "";
    $asset_name = "";
    $model = "";

    $serial_number = "";
    $location = "";
    $asset_cost = "";
    $date_purchased= "";
    $description = "";
    $userorassingedto = "";
    $supplier_name = "";
    $supplier_phone = "";
    $asset_number = "";
    $useful_life = "";
    $salvage = "";
}




$attributes = array('enctype' => 'multipart/form-data');
echo form_open('asset_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<style>
    input, select, table {
        font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
    }
    select {
        font-style: italic;
    }
    input,select {
        text-align: center;
    }
    .submit {
        letter-spacing: 1px;
        text-align: center;
        color: white;
        height: 35px;
        width: 180px;
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
<script>
        $(function() {
        $("#date_purchased").datepicker({
            changeMonth : true,
            changeYear : true,
            yearRange: "-100",
            maxDate: "0D"
        });
    });
</script>
<br />
<a class="action_button" id="new_asset" href="<?php echo site_url("asset_management/listing"); ?>">Assets</a>
<input type="hidden" name="asset_id" value = "<?php echo $asset_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Asset Registration Details</th>
        </tr>
        
         <tr>
            <td>Asset Class</td>
            <td><select name="asset_class" id="asset_class" required>
                <option value="">Select Asset Type</option>
                <?php
                foreach ($assetes as $asset_class) {
                    echo "<option value='$asset_class->id'>$asset_class->Type</option>";
                }
                ?>
            </select></td>
        </tr>
        
        <tr>
            <td>Asset Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'asset_name', 'value' => $asset_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Cost of Asset</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'asset_cost', 'value' => $asset_cost, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
                 
        
         <tr>
            <td>Model</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'model', 'value' => $model, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Serial Number</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'serial_number', 'value' => $serial_number, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Location</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'location', 'value' => $location, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Date Purchased</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'date_purchased', 'value' => $date_purchased, 'class' => 'othertext','id' => 'date_purchased');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>User/Assigned To</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'userorassingedto', 'value' => $userorassingedto, 'class' => 'othertext','id' => 'userorassingedto');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Supplier Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'supplier_name', 'value' => $supplier_name, 'class' => 'othertext','id' => 'supplier_name');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Supplier Telephone Number</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'supplier_phone', 'value' => $supplier_phone, 'class' => 'othertext','id' => 'supplier_phone');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Asset Number</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'asset_number', 'value' => $asset_number, 'class' => 'othertext','id' => 'asset_number');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        
         <tr>
            <td>Useful Life</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'useful_life', 'value' => $useful_life, 'class' => 'othertext','id' => 'useful_life');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Salvage Value</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'salvage', 'value' => $salvage, 'class' => 'othertext','id' => 'salvage');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Description</td>
            <td><?php

            $data_search = array('name' => 'description', 'value' => $description, 'class' => 'othertext');
            echo form_textarea($data_search);
            ?></td>
        </tr>
        <input type="hidden" value="<?=$partakings -> Transaction_Value;?>" name="opening_balance" />
        <tr>
            <td><input name="submit" type="submit" value="Save Asset to Database" class="submit" ></td>
        </tr>
    </table>
    </form>
    </div>