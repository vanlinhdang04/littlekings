<form class="form-dangnhap" onSubmit="return checkSignup()" id="registration-form" name="registration-form" method="post">
	<h1>Register an account</h1>
	<p>Please enter the required information below</p>
	<hr>
					
	<div class="form-group row">
		<div class="col-md-10">
			<label for="dk_fname"> <b>Full Name</b><span class="text-danger">*</span> </label>
			<input id="dk_fname" type="text" placeholder="Enter fullname" name="fullname" class="form-control">
			<div class="error">Invalid information</div>
    	</div>
	</div>
						
	<div class="form-group row">
		<div class="col-md-6">
			<label for="dk_email" > <b> Email </b><span class="text-danger">*</span></label>
			<input id="dk_email" type="text" placeholder="Enter your email" name="email" class="form-control">
			<div class="error-1" id="dk_err_email">Invalid information</div>
		</div>
		<div class="col-md-6">
			<label for="dk_phone"><b>Phone number </b><span class="text-danger">*</span></label>
			<input id="dk_phone" type="text" placeholder="Enter your phone number" name="phone" class="form-control">
			<div class="error-1" id="dk_err_phone">Invalid information</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-12">
    		<label for="dk_username"> <b> Username </b><span class="text-danger">*</span>
				<i style="font-size: 14px; padding-left:5px"></i> </label>
				<input id="dk_username" type="text" placeholder="Enter username" name="username" class="form-control">
				<div class="error-1" id="dk_err_username">Invalid information</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-6">
			<label for="dk_password"> <b>Password</b><span class="text-danger">*</span> 
			 	<i style="font-size: 14px; padding-left:5px">(Minimum 5 characters)</i> </label>
				<input id="dk_password" type="password" placeholder="Enter password" name="password" class="form-control">
				<div class="error-1" id="dk_err_password">Invalid information</div>
		</div>
		<div class="col-md-6">
			<label for="dk_repassword"> <b>Repeat password</b><span class="text-danger">*</span> </label>
			<input id="dk_repassword" type="password" placeholder="Repeat password" name="psw-repeat" class="form-control">
			<div class="error-1" id="dk_err_repassword">Invalid information</div>
		</div>
    </div>
						
	<div class="selection-box">
		<input type="submit" name="log-in-submit" value="Register">
		<input type="button" class="cancel-btn" id="cancel-log-in" value="Cancel">						
    </div>
	<div class="no-hope">
		<a href="#"> <h6 id="haveacc"><span style="color:black;"> Have a account?</span> Login</h6> </a>
	</div>
</form>