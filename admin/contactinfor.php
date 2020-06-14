<?php 
$id=$_POST['id'];
include_once("../ketnoi.php");
$result=mysqli_query($connect,"SELECT * FROM contact WHERE ContactID='$id'");
$row=mysqli_fetch_assoc($result);
$str="";
$str='<form class="form-horizontal" method="post" action="contact-table.php">
									<div class="form-group">
										<label class="control-label col-md-5">Contact ID</label>	
										<div class="col-md-7">
											<input name="ci_contactid" type="text" class="form-control" value="'.$row['ContactID'].'" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Customer Name</label>	
										<div class="col-md-7">
											<input  type="text" class="form-control" value="'.$row['Name'].'" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Email</label>	
										<div class="col-md-7">
											<input  type="text" class="form-control" value="'.$row['Email'].'" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Subject</label>	
										<div class="col-md-7">
											<input  type="text" class="form-control" value="'.$row['Subject'].'" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Message</label>	
										<div class="col-md-7">
											<input  type="text" class="form-control" value="'.$row['Messenger'].'" readonly/>	
										</div>
									</div>';
if($row['Status']==1){
	$str.='<div class="form-group">
										<label class="control-label col-md-5">Status</label>	
										<div class="col-md-7">
											<input id="ci_status" name="ci_status" type="hidden" value="1">
											<button id="bt_status" type="button" class="btn btn-danger waves-effect" value="Not response">Not response</button>
										</div>
									</div>';
}
if($row['Status']==2){
	$str.='<div class="form-group">
										<label class="control-label col-md-5">Status</label>	
										<div class="col-md-7">
											<input id="ci_status" name="ci_status" type="hidden" value="2">
											<button id="bt_status" type="button" class="btn btn-success waves-effect" value="Response">Response</button>
										</div>
									</div>';
}
							$str.='<div class="form-group">
										<label class="control-label col-md-5">Created(yyyy/mm/dd)</label>	
										<div class="col-md-7">
											<input  type="text" class="form-control" value="'.$row['Created'].'" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-2 col-md-4">
        									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#reply">Reply</button>
      									</div>
      									<div class="col-md-offset-1 col-md-5">
        									<button type="submit" class="btn btn-info">Confirm</button>
      									</div>
									</div>
									</form>';
echo $str;
?>