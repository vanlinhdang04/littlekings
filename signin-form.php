<form class="form-dangnhap " action="" onSubmit="return checkLogin();"  id="log-in-form" name="log-in-form" method="post">
	<h1>Sign in</h1>
	<p>Enter your account and password to make a purchase</p>
	<hr>
	<div class="form-group">
		<div class="col-md-11">
			<label for="dn_username"><b> Username</b></label>
				<input id="dn_username" type="text" placeholder="Username" name="username" class="form-control">
	<!--		<div class="error-1">Invalid information</div>-->
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-11">
			<label for="dn_password"><b> Password </b></label>
			<input id="dn_password" type="password" placeholder="Password" name="password" class="form-control">
			<div class="error-1">Invalid information</div>
		</div>
	</div>
	<div class="selection-box">
		<input type="button" class="cancel-btn" id="cancel-log-in" value="Cancel">
		<input type="submit" id="a" name="log-in-submit" value="Sign in">
		<div class="no-hope">					
			<a href="#"> <h6 id="noacc"> <span style="color:black;">No account?</span> Registration</h6> </a>
		</div>
	</div>
</form>

