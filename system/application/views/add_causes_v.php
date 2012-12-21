<?php
if (isset($cause)) {
    $cause_id = $cause -> id;
    $cause_name = $cause -> Name;
    $description = $cause -> Description;
    $deadline = $cause -> Deadline;
    $target = $cause -> Target;
} else {
    $cause_id = "";
    $cause_name = "";
    $description = "";
    $deadline = "";
    $target = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('pledge_controller/savecause', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<script>
    $(function() {
        $("#deadline").datepicker({                 
            minDate: "1D"       
        });
    });
</script>

<input type="hidden" name="cause_id" value = "<?php echo $cause_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Cause Details</th>
        </tr>
        
        <tr>
            <td>Cause Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'cause_name', 'value' => $cause_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Deadline</td>
            <td class="othertext"><?php

            $data_search = array('id' => 'deadline', 'name' => 'deadline', 'value' => $deadline, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td>Targeted Amount</td>
            <td class="othertext"><?php

            $data_search = array('id' => 'target', 'name' => 'target', 'value' => $target, 'class' => 'othertext');
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
            <td><input name="submit" type="submit" value="Save Cause" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>