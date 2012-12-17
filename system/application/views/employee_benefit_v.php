<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('employee_management/savebenefits', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<div class="holder" style="margin-top: 50px; width: 500px">
    
    <table class="othertext">
        
        <tr class="yellow">
        <th class="" colspan="2">Employee Benefit Details</th>
        </tr>
        <tr height="20px"></tr>
        <tr>
            <td style="font-weight: bold"><?php echo $employee -> Name?></td>
            <input type="hidden" name="employee_id" value="<?php echo $employee -> id?>"/>            
        </tr>
        <tr height="10px"></tr>
        <tr>
            <td>Current Benefits: </td>
            <td>
                <b>
            <?php
            foreach ($employeebenefits as $currentbenefits) {
                echo $currentbenefits -> Benefits -> Name.",&nbsp;";
            }
            ?>
            </b>
            </td>
        </tr>
        <tr height="10px"></tr>
        <tr>
             <td style="font-weight: bold">Benefit</td>
             <td>  <?php
            foreach ($benefits as $benefit) {
                echo "<tr><td><input type=checkbox name='benefit[]' value='$benefit->id'> $benefit->Name</td><tr/>";
            }
              ?></td>
           
        </tr>
        <tr>
            <td><input name="submit" type="submit" value="Save Benefit Details" class="button"></td>
        </tr>
    </table>
    </form>
    </div>
