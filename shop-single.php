<?php
  session_start();	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Little Kings &mdash; E-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Form.css">
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dangnhap_dangky.js"></script>
	  <script>
		  
		  
		  $(document).ready(function(){
			  var soluong=1;
		  function addCart(id,soluong){
			  $.ajax({
				  url:"addCart.php",
				  type:"post",
				  data:{id:id,soluong:soluong},
				  success:function(data){
					  //alert(data);
					  $("#countCart").html(data);
				  }
			  });
		  }
		  function getID(x){
			  var query=window.location.search.substring(1);
			  var vars=query.split("&");
			  for(var i=0;i<vars.length;i++){
				  var pair=vars[i].split("=");
				  if(pair[0]==x) return pair[1];
			  }
			  return false;
			  
		  };
		  var id=getID('id');
			  function details(id){
				  $.ajax({
					  type:"get",
					  url:"shopsingle.php",
					  data:{productid:id},
					  success:function(data){
						  $("#details").html(data);
					  }
				  });
			  };
			  details(id);
			  $(document).on("click","#minus",function(){
          //lert($('#sl').attr('max'))
				  if($("#sl").val()>1 ){
					$("#sl").val($("#sl").val()-1);   
				  }
			  });
			  $(document).on("click","#plus",function(){
				      var plus=parseInt($("#sl").val());
				      if(plus<$('#sl').attr('max'))
                  $("#sl").val(plus+1);
		  	  });
			 
			  $(document).on('click','img[name="image"]',function(){
				"use strict";
				$('img[name="image"]').each(function(){
					$('img[name="image"]').attr("style","opacity:0.7");
				});
				$(this).attr("style","opacity:1");
				$('#imageshow').attr('src',$(this).attr('src'));
			});
			  
			
				$(document).on("click","#addCart",function(){
				  // size=$("input[name='shop-sizes']:checked").val();
				  // if(!size){
					 //  alert("Please choose the size. ");
					 //  return false;
				  // };
				  //alert(size);
				  soluong=$("#sl").val();
					var ts=/[0-9]+$/;
					if(!ts.test(soluong.toString())){
						alert("Amount Invalid.");
						return false;
					}
          
				  addCart($(this).attr('title'),soluong);
          $('html body').append('<div id="nofi" style="background-color:rgba(85,85,85,0.93);width: 350px;height: 150px;position: fixed;top: 200px;left: 600px;"><img src="images/success.jpg" alt="" width="50px" height="50px" style="border-radius: 50%; opacity: 1;margin-left: 150px;margin-top: 20px"><h2><p style="color:white;margin-left: 40px;margin-top: 20px">Add to cart success.</p></h2></div>');
				  var rm_nofi=function(){
					  $("#nofi").remove();
				  }
				  setTimeout(rm_nofi,2000);

			  });
		  });
		  
		  
	  </script>
  </head>
  <body>
	<?php
		include 'userinfor-form.php';
		include 'signin-form.php';
		include 'signup-form.php';
	?>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <!-- <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form> -->
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Little Kings</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><?php
					  if(isset($_SESSION['isLogin'])){
						  if($_SESSION['isLogin']==1){
							  echo '<a id="logout"><span class="icon icon-sign-out" style="cursor: pointer;"></span></a>';
						  }
					  }
					  else{
						  echo '<a id="btsignin"><span class="icon icon-person" style="cursor: pointer;" ></span></a>';
					  }
					  
					  ?></li>
                  <li><a href="#"><?php
					  if(isset($_SESSION['isLogin'])){
						  if($_SESSION['isLogin']==1){
							  echo '<a href="#" id="name"> Hello, '.$_SESSION['nameLogin'].'</a>';
						  }
					  }
					  else{
						  echo"<a href='#'> Hello </a>";
					  }
					  ?></a></li>
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count" id="countCart">
						  <?php 
						  
						  
						  $count=0; 
						  if(isset($_SESSION['cart'])){
								foreach($_SESSION['cart'] as $k=>$v){
									$count+=$v;
								}
						  }
						  echo($count); 
						  ?></span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li >
              <a href="index.php">Home</a>
              
            </li>
            <li >
              <a href="about.php">About</a>
              
            </li>
            <li class="active"><a href="shop.php">Shop</a></li>
            
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row" id="details">
			<!-- ajax cho nay-->

        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <!-- Cac sp lien quan -->
              <?php
                require_once "class/shop-single.class.php";
                $pl = new ShopSingle($_GET['id']);
                echo $pl->productslist();
                $pl->close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Leather collection</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="shop.php">Leather wallet</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="shop.php">Leather belts</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="shop.php">Leather bag</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Receive notification</h3>
              <form action="receive-email.php" method="post">
                <input type="email" name="r_email" placeholder="Enter your email" class="form-control">
                <input type="submit" name="sub" value="Subscribe" class="btn">
              </form>              
              
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">273 An Duong Vuong street, District 5, Ho Chi Minh city</li>
                <li class="phone"><a href="#">039 548 2136</a></li>
                <li class="email">littleKings@gmail.com</li>
              </ul>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank" class="text-primary">Team</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>