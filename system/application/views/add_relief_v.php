<?php
if (isset($relief)) {
    $relief_id = $relief -> id;
    $relief_name = $relief -> Name;
    $rate = $relief -> Rate;
    $description = $relief -> Description;
} else {
    $relief_id = "";
    $relief_name = "";
    $description = "";
    $rate = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('benefit_management/saveRelief', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<br />
<a class="action_button" id="new_relief" href="<?php echo site_url("benefit_management/relief_listing"); ?>">Reliefs</a>
<input type="hidden" name="relief_id" value = "<?php echo $relief_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Relief Details</th>
        </tr>
        
        <tr>
            <td>Relief Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'relief_name', 'value' => $relief_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Rate</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'rate', 'value' => $rate, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Relief" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>