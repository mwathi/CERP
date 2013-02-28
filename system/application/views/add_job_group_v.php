<?php
if (isset($group)) {
    $group_id = $group -> id;
    $group_name = $group -> Job_Group;    
    $description = $group -> Description;
    $salary = $group -> Salary;        
} else {
    $group_id = "";
    $group_name = "";
     $description = "";
    $salary = "";        
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('job_group_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<br />
<a class="action_button" id="new_job_group" href="<?php echo site_url("job_group_management/listing"); ?>">Job Groups</a>
<input type="hidden" name="group_id" value = "<?php echo $group_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Job Group Details</th>
        </tr>
        
        <tr>
            <td>Job Group Name</td>
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
            <td>Salary</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'salary', 'value' => $salary, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Benefits</td>
            <td class="othertext"><select name="benefits[]" id="benefits" multiple="multiple">
                <option value="">Select Benefits</option>
                <?php
                foreach ($benefits as $benefit) {
                    echo "<option value='$benefit->id'>$benefit->Name</option>";
                }
                ?>
            </select></td>
        </tr>

        <tr>
            <td><input name="submit" type="submit" value="Save Job Group" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>