<?php
if (isset($post)) {
    $post_id = $post -> id;
    $post_name = $post -> Name;
    $pay = $post -> Pay;
    $description = $post -> Description;
} else {
    $post_id = "";
    $post_name = "";
    $pay = "";
    $description = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('post_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<input type="hidden" name="post_id" value = "<?php echo $post_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Post Details</th>
        </tr>
        
        <tr>
            <td>Post Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'post_name', 'value' => $post_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>

        <tr>
            <td>Description</td>
             <td><?php

            $data_search = array('name' => 'description', 'value' => $description);
            echo form_textarea($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td><input name="submit" type="submit" value="Save Post" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>