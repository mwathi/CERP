<?php
if (isset($asset)) {
    $asset_id = $asset -> id;
    $asset_name = $asset -> Name;
    $model = $asset -> Model;
    $number_of_assets = $asset -> Number_of_Assets;
    $serial_number = $asset -> Serial_Number;
    $location = $asset -> Location;
    $value = $asset -> Value;
    $date_purchased= $asset -> Date_Purchased;
    $description = $asset -> Description;
} else {
    $asset_id = "";
    $asset_name = "";
    $model = "";
    $number_of_assets = "";
    $serial_number = "";
    $location = "";
    $value = "";
    $date_purchased= "";
    $description = "";
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
<a class="action_button" id="new_asset" href="<?php echo site_url("asset_management/listing"); ?>">Assets</a>
<input type="hidden" name="asset_id" value = "<?php echo $asset_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Asset Registration Details</th>
        </tr>
        
         <tr>
            <td>Asset Type</td>
            <td><select name="asset_type" id="asset_type" required>
                <option value="">Select Asset Type</option>
                <?php
                foreach ($assetes as $asset_type) {
                    echo "<option value='$asset_type->id'>$asset_type->Type</option>";
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
            <td>Asset Value</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'value', 'value' => $value, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Number of Assets</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'number_of_assets', 'value' => $number_of_assets, 'class' => 'othertext');
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
            <td>Description</td>
            <td><?php

            $data_search = array('name' => 'description', 'value' => $description, 'class' => 'othertext');
            echo form_textarea($data_search);
            ?></td>
        </tr>

        <tr>
            <td><input name="submit" type="submit" value="Save Asset to Database" class="submit" ></td>
        </tr>
    </table>
    </form>
    </div>