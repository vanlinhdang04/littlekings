<script type="text/javascript">
	function checkif(){
		"use strict";
			var testemail=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+\.\w{2,4}$/;
			var testphone=/^(08|09|03|07|05)\d{8}$/;
			var flag=true;
			$("form#info input").each(function(){
				//alert($(this).attr('name'));
				if($(this).val()=="" && $(this).attr('name')!="address"){
					$(this).addClass("ui-state-error");
					flag = false;
				}
			});
			if(!testemail.test($("#infoemail").val())){
				$("#infoemail").addClass("ui-state-error");
				$("#info_err_email").html("Email Invalid. ");
				$("#info_err_email").fadeIn(300);
				flag=false;
			}
			if(!testphone.test($("#infophone").val())){
				$("#infophone").addClass("ui-state-error");
				$("#info_err_phone").html("Phone Invalid");
				$("#info_err_phone").fadeIn(300);
				flag=false;
			}
			if(flag==false){
				return flag;
			}
			$.ajax({
				type:"post",
				url:"admin/edituser.php",
				data:{user:0,name:$("#infoname").val(),
				  email:$("#infoemail").val(),phone:$("#infophone").val(),address:$("#infoaddress").val()},
				success:function(data){
					//alert(data);
					if(data.indexOf("1")!=-1)
						{
							alert("ERROR:Phone already exists");
							$("#infophone").addClass("ui-state-error");
							$("#infophone").focus();
							$("#info_err_phone").html("Phone Invalid");
							$("#info_err_phone").fadeIn(300);
							
						}
					if(data.indexOf("2")!=-1)
						{
							alert("ERROR:Email already exists");
							$("#infoemail").addClass("ui-state-error");
							$("#infoemail").focus();
							$("#info_err_email").html("Email Invalid. ");
							$("#info_err_email").fadeIn(300);
							
						}
					if(data==0)
						{
							alert("SUCCESSFULLY");
							window.location.reload();
						}
				}
			});
			
			return false;
	}
</script>
<form onsubmit="return checkif();" class="form-info" action="" id="info" name="info" method="post">
    <h1 align="center">Profile</h1>
				
	<hr/>
	<input type="text" name="userid" value="<?php echo $_SESSION['userid'] ?>" hidden>
	<div class="form-group row">
		<div class="col-md-12">
			<label for="infoname" > <b> Name </b></label>
			<input id="infoname" class="form-control" type="text" name="name" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['fullname'];
				}  
			}
			?>">
			<div class="error-1" id="info_err_name">Invalid information</div>
		</div>
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
	</div>
	<div class="form-group row">
		<div class="col-md-12">
			<label for="infoaddress"><b>Address</b></label>
			<input id="infoaddress" type="text" name="address" placeholder="Enter your address" class="form-control" value="<?php 
	  		if(isset($_SESSION['isLogin'])){
				if($_SESSION['isLogin']==1){
					echo $_SESSION['address'];
				}  
			}
    	    ?>"/>
    	    <div class="error-1" id="info_err_email">Invalid information</div>
		</div>
	</div>
    <div class="form-group row">
        <input type="button" class="btn" value="Alter Password"/>
    </div>
		<div align="center" class="selection-box">
        	<input type="submit" id="submitupload" name="submitUpload" value="CONFIRM" />
		</div>
</form>