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
  <script type="text/javascript">
    // $(document).on("click","#minuss",function(){
    //       var max=parseInt($('.sl').attr('max'));
    //       var sl=parseInt($(".sl").val());
          
    //       if(sl>1 ){
    //         $(".sl").val(sl-1);   
    //       }
    //     });
    //     $(document).on("click","#pluss",function(){
    //         var max=parseInt($('.sl').attr('max'));
    //         var sl=parseInt($(".sl").val());
    //         //var plus=parseInt($(".sl").val());
    //         if(sl<max){
    //           $(".sl").val(sl+1);
    //         }
    //       });
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
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
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
                      <span class="count"><?php $count=0; if(isset($_SESSION['cart'])){foreach($_SESSION['cart'] as $k=>$v)$count+=$v;}; echo ($count) ?></span>
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
            <li><a href="shop.php">Shop</a></li>            
            
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form id="listcart" class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
<!--
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/ao thun/AT01.jpg" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">Top Up T-Shirt</h2>
                    </td>
                    <td>$49.00</td>
					<td>M</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td>$49.00</td>
                    <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                  </tr>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/ao thun/AT05.jpg" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">Polo Shirt</h2>
                    </td>
                    <td>$49.00</td>
					<td>L</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td>$49.00</td>
                    <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
-->
			<?php
	require_once('ketnoi.php');
			$str="";
			$total=0;
			if(isset($_SESSION['cart'])){
				foreach($_SESSION['cart'] as $k=>$v){
					//echo $k;
					//if(isset($_SESSION[$k])){
						$sql="SELECT * FROM products WHERE ID='$k'";
						//foreach($_SESSION[$k] as $sz=>$sl){
							//echo ($k." ".$sz." ".$sl."<br>".$sql);
							//echo $sql;
							$result=mysqli_query($connect,$sql)or die("loi truy van");
							if(mysqli_num_rows($result)<1) die("Loi gio hang");
							$row=mysqli_fetch_assoc($result);
							$str.='<tr><td class="product-thumbnail">';
							$str.='<img src="images/products/'.$row["Image"].'" alt="Image" class="img-fluid">';
							$str.='</td>';
							$str.='<td class="product-name">';
							$str.='<h2 class="h5 text-black">'.$row["Name"].'</h2>';
							$str.='</td>';
							$str.='<td>$'.$row["Price"].'</td>';
							//$str.='<td>'.mb_strtoupper($sz,"utf8").'</td>';
							$str.='<td>';
							$str.='<div class="input-group mb-3" style="max-width: 120px;">';
							$str.='<div class="input-group-prepend">';
							$str.='<button class="btn btn-outline-primary js-btn-minus minuss" id="minuss" type="button" name="'.$k.'">&minus;</button>';
							$str.='</div>';
							$str.='<input type="text" class="form-control text-center sl" value="'.$v.'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="'.$k.'" max='.$row["Amount"].' readonly>';
							$str.='<div class="input-group-append">';
							$str.='<button class="btn btn-outline-primary js-btn-plus pluss" id="pluss" type="button" name="'.$k.'">&plus;</button>';
							$str.='</div>';
							$str.='</div>';

							$str.='</td>';
							$str.='<strong><td class="totalprice" title="total'.$k.'" style="color:red;">$'.($row["Price"]*$v).'</td></strong>';
							$str.='<td><a href="cart.php" class="btn btn-primary btn-sm bt-delproduct" name="'.$k.'">X</a></td>';
							$str.='</tr>';
							$total+=($row["Price"]*$v);
							mysqli_free_result($result);
						//}
					//}
				}
						  echo $str;
						  mysqli_close($connect);
			}
			?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" onClick="window.location.reload(true)">Update Cart</button>
              </div>
              <div class="col-md-6">
                <a href="shop.php"><button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black subtotal">$<?php echo($total)  ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black total">$<?php echo($total)  ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="checkCart()">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
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
                <li class="address">274 An Duong Vuong street, District 5, Ho Chi Minh city</li>
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

  
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script src="js/xulycart.js"></script>
	  <script type="text/javascript">
		function checkCart(){
			var total=<?php echo $total ?>;
			//alert(total);
			if(total==0){
				alert("Please purchase. ");
			}
			else{
				window.location="checkout.php";
			}
		}
	</script>
  </body>
</html>