<?php
if (isset($users)) {
    $name = $users -> Name;
    $username = $users -> Username;
    $email = $users -> Email;
    $user_id = $users -> id;
} else {
    $name = "";
    $username = "";
    $email = "";
    $user_id = "";
}
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('user_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>
<br />
<input type="hidden" name="user_id" value = "<?php echo $user_id; ?>"/>
<div class="holder">

	<table>
		<tr>
			<td>Full Names</td>
			<td> <?php

            $data_search = array('name' => 'name', 'value' => $name, 'class' => 'othertext');
            echo form_input($data_search);
			?> </td>
		</tr>

		<tr>
			<td>Username</td>
			<td> <?php

            $data_search = array('name' => 'username', 'value' => $username, 'class' => 'othertext');
            echo form_input($data_search);
			?> </td>
		</tr>

		<tr>
			<td>Email</td>
			<td> <?php

            $data_search = array('name' => 'email', 'value' => $email, 'class' => 'othertext');
            echo form_input($data_search);
			?> </td>
		</tr>

		<tr>
			<td>
			<input name="submit" type="submit" value="Save User" class="button">
			</td>
		</tr>
	</table>
	</form>
</div>
</div>