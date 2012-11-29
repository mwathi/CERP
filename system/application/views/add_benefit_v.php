<?php
if (isset($benefit)) {
    $benefit_id = $benefit -> id;
    $benefit_name = $benefit -> Name;
    $rate = $benefit -> Rate;
    $description = $benefit -> Description;
} else {
    $benefit_id = "";
    $benefit_name = "";
    $description = "";
    $rate = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('benefit_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<input type="hidden" name="benefit_id" value = "<?php echo $benefit_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Benefit Details</th>
        </tr>
        
        <tr>
            <td>Benefit Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'benefit_name', 'value' => $benefit_name, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Benefit" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>