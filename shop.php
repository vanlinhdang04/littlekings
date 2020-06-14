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
    <script type="text/javascript">
		var page=1,category="",color="",price="",key="",sort="";
		$(document).ready(function(){
			
			$(".dropdown-item").click(function(){
				
				sort=$(this).html();
				phantrang(page,category,color,price,key,sort)
				
			});
			$("#search").keyup(function(event){
				key=$('#search').val();
				key = key.toUpperCase();
				phantrang(1,category,color,price,key,sort);
			})
			$("#slider-range").click(function(){
				price=$('#amount').val();
				price=price.substring(1);
				phantrang(1,category,color,price,key,sort);
			})
			function load(){
				phantrang(1,"","","","","");
			}
			function phantrang(page,category,color,price,key,sort){
				$.ajax({
					type:"get",
					url:"phantrang.php",
					data:{page:page,category:category,color:color,price:price,key:key,sort:sort},
					success:function(data){
						$('#products').html(data);
					}
				});
				
            	//return false;
			}
			
	
			load();
				
			$(document).on("click","ul.phantrang li",function(){
			page =$(this).attr('page');
			phantrang(page,category,color,price,key,sort);
			$("html, body").animate({ scrollTop: 300 }, 'slow');
		});
			
			$("input[name='category[]']").click(function(){
				category='';
				$("input[name='category[]']:checked").each(function(){
					
						category+=" "+$(this).val();
				});
				if(category.length>1){
					category=category.substring(1);
				}
				phantrang(1,category,color,price,key,sort);
				//string-=" ";
			});
			
			$('input[name="color[]"]').click(function(){
				color="";
				$('input[name="color[]"]:checked').each(function(){
					color+=" "+$(this).val();
				});
				if(color.length>1){
					color=color.substring(1);
				}
				phantrang(1,category,color,price,key,sort);
			})
			
		
			
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

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">

                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" style="cursor: pointer">Relevance</a>
                      <a class="dropdown-item" style="cursor: pointer">Name, A to Z</a>
                      <a class="dropdown-item" style="cursor: pointer">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" style="cursor: pointer">Price, low to high</a>
                      <a class="dropdown-item" style="cursor: pointer">Price, high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div id="products">  
            	<div class="row mb-5">


            	</div>
			</div>
		  
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
				<label for="all-cate" class="d-flex">
				  <input type="checkbox" id="all-cate" class="mr-2 mr-0 fix"  name="category[]" value="" ><span>ALL</span> <span class="text-black ml-auto"></span>
				</label>
				  <?php
	include_once('ketnoi.php');
						  $result=mysqli_query($connect,"SELECT * FROM catalog ORDER BY `catalog`.`CatalogID` DESC");
						  $str="";
						  while($row=mysqli_fetch_assoc($result)){
							  $str.='<label for="'.strtolower($row['CatalogName']).'-cate" class="d-flex">
				  <input type="checkbox" id="'.strtolower($row['CatalogName']).'-cate" class="mr-2 mt-0 fix" name="category[]" value="'.$row['CatalogID'].'"><span>'.$row['CatalogName'].'</span> <span class="text-black ml-auto"></span>
				</label>';
						  }
						  echo $str;
	?>
				
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"  disabled=""/>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
				<label for="all-color" class="d-flex">
                  <input type="checkbox" id="all-color" class="mr-2 mt-0"  name="color[]" value=""> <span class="text-black">ALL </span>
                </label>
                <label for="white-color" class="d-flex">
                  <input type="checkbox" id="white-color" class="mr-2 mt-0" name="color[]" value="Black"> <span class="text-black">Black </span>
                </label>
                <label for="black-color" class="d-flex">
                  <input type="checkbox" id="black-color" class="mr-2 mt-0" name="color[]" value="BuckBrown"> <span class="text-black">Buck Brown </span>
                </label>
                <label for="blue-color" class="d-flex">
                  <input type="checkbox" id="blue-color" class="mr-2 mt-0" name="color[]" value="RuggedTan"> <span class="text-black">Rugged Tan </span>
                </label>
				<label for="brown-color" class="d-flex">
                  <input type="checkbox" id="brown-color" class="mr-2 mt-0" name="color[]" value="Olive"> <span class="text-black">Olive </span>
                </label>
				<label for="gray-color" class="d-flex">
                  <input type="checkbox" id="gray-color" class="mr-2 mt-0" name="color[]" value="RoseWood"> <span class="text-black">RoseWood </span>
                </label>
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