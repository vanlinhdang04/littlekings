<?php
session_start();
if($_SESSION['role']!=2 and $_SESSION['role']!=1){
	
	header('Location: blank.php');
}
if(isset($_SESSION['error'])){
	$error=$_SESSION['error'];
}
else{
	$error=-1;
}
if(isset($_POST['ci_contactid'])){
	include_once('../ketnoi.php');
	$sql="UPDATE `contact` SET `Status`='".$_POST['ci_status']."' WHERE ContactID='".$_POST['ci_contactid']."'";
	mysqli_query($connect,$sql) or die($sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>LittleKings - Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="plugins/font-icon/css.css" rel="stylesheet" type="text/css">
    <link href="plugins/font-icon/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="plugins/jquery/jquery-3.3.1.min.js"></script>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click","#bt_status",function(){
			//$("#bt_status").click(function(){
			//alert($(this).val());
				if($(this).val()=="Response"){
					$("#ci_status").val("1");
					$(this).removeClass("btn-success");
					$(this).addClass("btn-danger");
					$(this).html("Not response");
					$(this).val("Not response");
					return false;
				}
				if($(this).val()=="Not response"){
					$("#ci_status").val("2");
					$(this).removeClass("btn-danger");
					$(this).addClass("btn-success");
					$(this).html("Response");
					$(this).val("Response");
					return false;
				}
			});
			$(document).on("click","#btn_status",function(){
			//$("#bt_status").click(function(){
			//alert($(this).val());
				if($(this).val()=="Not response"){
					$("#ci_status").val("2");
					$(this).removeClass("btn-danger");
					$(this).addClass("btn-success");
					$(this).html("Response");
					$(this).val("Response");
					return false;
				}
				if($(this).val()=="Response"){
					$("#ci_status").val("1");
					$(this).removeClass("btn-success");
					$(this).addClass("btn-danger");
					$(this).html("Not response");
					$(this).val("Not response");
					return false;
				}
			});
			
			$("table#contact tbody tr").click(function(){
				//alert($(this).val());
				$.ajax({
					type:"post",
					url:"contactinfor.php",
					data:{id:$(this).attr("id")},
					success:function(data){
						$("#contactInfo div.modal-body").html(data);
					}
				})
			});
            $("table#contact tbody tr").click(function(){
                //alert($(this).attr("id"));
                $("#rc_contactid").val($(this).attr("id"));
            });
		});
	</script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">Contact Management</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo($_SESSION['nameLogin']); ?></div>
                    <div class="email"><?php echo($_SESSION['Email']) ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<li>
                        <a href="usertable.php">
                            <i class="material-icons">person</i>
                            <span>Users</span>
                        </a>
                    </li>
					<li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Manager</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="product-table.php">Products Table</a>
                            </li>
							<li>
                                <a href="orders-table.php">Orders Table</a>
                            </li>
                            <li class="active">
                                <a href="contact-table.php">Contacts Table</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../index.php">
                            <i class="material-icons">update</i>
                            <span>Go to LittleKings</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">LittleKings - Admin Site</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CONTACT TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="contact" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										include_once("../ketnoi.php");
										$results=mysqli_query($connect,"SELECT * FROM contact");
										$str="";
										while($row=mysqli_fetch_assoc($results)){
											$str.='<tr id="'.$row["ContactID"].'" data-toggle="modal" data-target="#contactInfo">';
											$str.="<td>".$row['Name']."</td>";
											$str.="<td>".$row['Email']."</td>";
											$str.="<td>".$row['Subject']."</td>";
											$str.="<td>".$row['Messenger']."</td>";
											if($row['Status']==1){
												$str.='<td><button type="button" class="btn btn-danger waves-effect">Not response</button></td>';
											}
											else if($row['Status']==2){
												$str.='<td><button type="button" class="btn btn-success waves-effect">Responded</button></td>';
											}
											$str.="<td>".$row['Created']."</td>";
											$str.="</tr>";
										}
										echo $str;
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
					<!-- Cua so modal product info-->
					<div id="contactInfo" class="modal fade" role="form">
						<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Contact Info</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-5">Contact ID</label>	
										<div class="col-md-7">
											<input type="text" class="form-control" value="" disabled/>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Customer Name</label>	
										<div class="col-md-7">
											<input id="ci_name" type="text" class="form-control" value="so mi" />	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Email</label>	
										<div class="col-md-7">
											<input id="ci_email" type="text" class="form-control" value="SM" />	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Subject</label>	
										<div class="col-md-7">
											<input id="ci_subject" type="text" class="form-control" value="SM" />	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Message</label>	
										<div class="col-md-7">
											<input id="ci_message" type="text" class="form-control" value="SM" />	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Status</label>	
										<div class="col-md-7">
											<input id="ci_status" type="hidden" value="1">
											<button id="bt_status" type="button" class="btn btn-success waves-effect" value="">Success</button>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Created(yyyy/mm/dd)</label>	
										<div class="col-md-7">
											<input id="pi_productname" type="text" class="form-control" value="2019-04-02" />	
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-4 col-md-8">
        									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#reply">Reply</button>
      									</div>
									</div>
									<div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-info">Confirm</button>
                                        </div>
                                    </div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>
			<div id="reply" class="modal fade" role="form">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Reply Customer</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="reply-contact.php" method="post">
                                    <div class="form-group">
                                        <input type="text" id="rc_contactid" name="rc_contactid" hidden="true" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Message</label>   
                                        <div class="col-md-7">
                                            <textarea rows="4" id="rc_message" name="rc_message" class="form-control"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-5 col-md-6">
                                            <input type="submit" name="" value="Send" class="btn btn-default">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>            
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
<!--    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<!--	<script src="../../../js/jquery-3.3.1.min.js"></script>-->
</body>

</html>