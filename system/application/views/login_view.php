
<div id="signinholder">
<form action="<?php echo base_url(); ?>login/process" method="post" name="process">
		<p class="signintitle">
			Sign in
		</p>
		<p> <?php if(! is_null($msg)) echo $msg;?>       </p>
		<br /><br />
		<p class="othertext">
			<b>Username</b>
		</p>
		<input type="text" name="username" id="username" class="signininput"/>
		<br />
		<br />
		<p style="font-family: calibri; font-size: 16px">
			<b>Password</b>
		</p>
		<input type="password" name="password" id="password" class="signininput"/>
		<br />
		<br />
		<p>
			<input type="submit" name="signin" value="Log in" class="action_button" style="height: 50px"/>
		</p>
	</form>
</div>

