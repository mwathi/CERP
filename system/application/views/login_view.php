
<div id="signinholder">
<form action="<?php echo base_url(); ?>login/process" method="post" name="process">
		<p class="signintitle">
			Sign in | <a href="<?php echo base_url().'user_management/register'?>"> Register </a>
			<div id="hmsholder">
				<a href="<?php echo base_url()?>">Rwanda Business Directory</a>
			</div>
		</p>
		<p> <?php if(! is_null($msg)) echo $msg;?>       </p>
		<p class="othertext">
			<b>Username</b>
		</p>
		<input type="text" name="username" id="username" class="signininput"/>
		<p style="font-family: calibri; font-size: 16px">
			<b>Password</b>
		</p>
		<input type="password" name="password" id="password" class="signininput"/>
		<p>
			<input type="submit" name="signin" value="Log in" class="greenbutton"/>
		</p>
	</form>
</div>