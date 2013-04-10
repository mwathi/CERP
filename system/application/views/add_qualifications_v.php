<?php
if (isset($qualification)) {
    $qualification_id = $qualification -> id;
    $qualification_name = $qualification -> Name;
    $description = $qualification -> Description;
} else {
    $qualification_id = "";
    $qualification_name = "";
    $description = "";
    $rate = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('employee_management/savequalifications', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<br />
<a class="action_button" id="new_qualification" href="<?php echo site_url("employee_management/qualification_listing"); ?>">Qualifications</a>
<input type="hidden" name="qualification_id" value = "<?php echo $qualification_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Qualification Details</th>
        </tr>
        
        <tr>
            <td>Qualification Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'qualification_name', 'value' => $qualification_name, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Qualification" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>