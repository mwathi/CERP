<?php
if (isset($group)) {
    $group_id = $group -> id;
    $group_name = $group -> Name;    
    $description = $group -> Description;
} else {
    $group_id = "";
    $group_name = "";
    $description = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('group_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<a class="action_button" id="new_employee" href="<?php echo site_url("group_management/listing"); ?>">Groups</a>
<input type="hidden" name="group_id" value = "<?php echo $group_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Group Details</th>
        </tr>
        
        <tr>
            <td>Group Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'group_name', 'value' => $group_name, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Group" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>