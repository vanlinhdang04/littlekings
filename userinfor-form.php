<form class="form-info" action="" onSubmit="return checkinfo();"  id="info" name="info" method="post" >
    <h1 align="center">Information</h1>
				
	<hr>
	<div class="form-group row">
		<div class="col-md-6">
			<label for="infofirstname"> <b>Full Name</b> </label>
			<input id="infofirstname" type="text" placeholder="Full Name" name="fullname" class="form-control" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['fullname'];
				}  
			}
			?>">
		    <div class="error">Invalid information</div>
        </div>
	</div>
												
	<!-- <div class="form-group">
    	<div class="col-md-11">
			<label for="infousername"><b> Username</b></label>
			<input id="infousername" type="text" placeholder="Username" name="username" class="form-control" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['username'];
				}  
			}
    		?>" readonly disabled>

		</div>
	</div>
	<div class="form-group">
		<div class="col-md-11">
			<label for="infopassword"><b> Password </b></label>
			<input id="infopassword" type="password" placeholder="Password" name="password" class="form-control" value="password" readonly disabled>
			<div class="error-1">Invalid information</div>
		</div>
	</div> -->
	<div class="form-group row">
		<div class="col-md-6">
			<label for="infoemail" > <b> Email </b></label>
			<input id="infoemail" type="text" placeholder="Email" name="email" class="form-control" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['Email'];
				}  
			}
			?>">
			<div class="error-1" id="info_err_email">Invalid information</div>
		</div>
		<div class="col-md-6">
			<label for="infophone"><b>Phone number </b></label>
			<input id="infophone" type="text" placeholder="Phone number" name="phone" class="form-control" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['phone'];
				}  
			}
    	    ?>">
		<div class="error-1" id="info_err_phone">Invalid information</div>
	</div>
    <div class="form-group row">
        <input type="button" class="form-control" value="Alter Password"/>
    </div>
</div>
		<div align="center" class="selection-box">
        	<input type="submit" id="submitupload" name="submitUpload" value="ALTER>
		</div>
</form>