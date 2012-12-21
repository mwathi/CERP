<?php
if (isset($employer)) {
    $employer_id = $employer -> id;
    $employer_name = $employer -> Employer_Name;
    $company = $employer -> Company;
} else {
    $employer_id = "";
    $employer_name = "";
    $company = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('employer_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<a class="action_button" id="employers" href="<?php echo site_url("employer_management/listing"); ?>">Employers</a>
<input type="hidden" name="employer_id" value = "<?php echo $employer_id; ?>"/>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table>
        
        <tr class="yellow">
        <th class="" colspan="2">Employer Details</th>
        </tr>
        
        <tr>
            <td>Employer Name</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'employer_name', 'value' => $employer_name, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
         <tr>
            <td>Company</td>
            <td class="othertext"><?php

            $data_search = array('name' => 'company', 'value' => $company, 'class' => 'othertext');
            echo form_input($data_search);
            ?></td>
        </tr>
        
        <tr>
            <td><input name="submit" type="submit" value="Save Employer" class="button" style="width: 120px; height: 30px; font-size: 13px"></td>
        </tr>
    </table>
    </form>
    </div>