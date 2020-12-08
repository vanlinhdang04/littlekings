<?php
session_start();
?>
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
	<script src="js/main1.js"></script>
	<script src="js/dangnhap_dangky.js"></script>
  <script src="xulydangnhap.php"></script>
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
              <form action="" method="get" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search" id="search">
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
                  <li><a href="#">
                      <?php
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
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="about.php">About</a>
              
            </li>
            <li><a href="shop.php">Shop</a></li>
            
            <li><a href="contact.php">Contact</a></li>
            <li class="active"><a href="myorder.php">My order</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">My order</strong></div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="myorder_title col-12"><h1>MY ORDER</h1></div>
        <form id="listcart" class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-total"></th>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Name</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Amount</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Date</th>
                    <th class="">Status</th>
                    <th class="product-remove">Cancel order</th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                        include_once('ketnoi.php');
                        $myorder="";
                        if (isset($_SESSION['userid'])) {
                              $sql="call myorder('".$_SESSION['userid']."')";
                              $result=mysqli_query($connect,$sql);
                              foreach ($result as $key => $value) {
                                $row=mysqli_fetch_assoc($result);
                                $myorder.='<tr><td>'.($key+1).'</td>';
                                $myorder.='<td class="product-thumbnail">';
                                $myorder.='<img src="images/products/'.$row["Image"].'" alt="Image" class="img-fluid">';
                                $myorder.='</td>';
                                $myorder.='<td class="product-name">';
                                $myorder.='<h2 class="h5 text-black">'.$row["Name"].'</h2>';
                                $myorder.='</td>';
                                $myorder.='<td>$'.$row["Price"].'</td>';
                                $myorder.='<td>'.$row["Amounts"].'</td>';
                                $myorder.='<td>'.$row["Total"].'</td>';
                                $myorder.='<td>'.$row["Date"].'</td>';
                                if ($row["stt"] == 1) {
                                  $myorder.='<td><p class="btn btn-warning waves-effect">Wait confirm</p></td>';
                                }
                                elseif($row['stt'] == 2 ){
                                  $myorder.='<td><p class="btn btn-info waves-effect">Confirm</p></td>';
                                }
                                else {
                                  $myorder.='<td><p class="btn btn-success waves-effect">Success</p></td>';
                                }
                                $myorder.='<td><p class="btn btn-primary btn-sm bt-delproduct">Cancel</p></td>';
                            }
                            
                        }
                        echo $myorder;
                        
                    ?>
                </tbody>
            </table>
        </div>
    </form>
  </div>
</body>
