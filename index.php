<?php
 session_start();
 include("functions/functions.php")
 ?>
<!DOCTYPE>
<html>
    <head>  
  	<title> My Online Shop</title>
  	<link rel="stylesheet" href="styles/style.css" media="all" />
  	</head>
  	<body>
  		<!-- Main Wrapper starts here-->
  		<div class="main_wrapper">
  			<div class="header_wrapper">
             <a href="index.php"><img id="logo" src="images/ecommerce1.png" /></a>
           <img id="banner" src="images/ecom4.gif" />
  			 </div>
  			 <!-- Menu bar Starts here -->
  			 <div class="menubar">
  			 	<ul id="menu">
  			 		<li><a href="index.php">Home</a></li>
  			 		<li><a href="all_products.php">All Products</a></li>
  			 		<li><a href="customer/my_account.php">My Account</a></li>
  			 		<li><a href="customer_register.php">SignUp</a></li>  			 		
  			 		<li><a href="cart.php">Shopping Cart</a></li>
  			 		<li><a href="#">Contact Us</a></li>
  			 	</ul>
  			 	<div id="form">
  			 		<form method="get" action="results.php" enctype="multipart/form-data">
  			 			<input type="text" name="user_query" placeholder="Search a Product" />
  			 			<input type="submit" value="search" name="search" /> 
  			 		</form>
  			 	</div>
  			 </div>
  			 <!--Menu bar Ends here -->
  			 <!-- content wrapper starts here -->
  			<div class="content_wrapper">
  			<!-- side bar starts here -->
  			<div id="sidebar">
  			     <div id="sidebar_title">Categories</div>
  			     <ul id="cat">
                    <?php getcats();?>
  			     </ul>
                 <div id="sidebar_title">Brands</div>
  			     <ul id="cat">
  			     	<?php getbrands();?>
  			     </ul>
  			</div>
  			<!-- side bar end here -->
  			<!-- content area starts here -->
  			<div id="content_area">
          <?php cart();?>
  				<div id="shopping_cart">
                      <span style="float: right; font-size: 18px; padding: 5px; line-height: 40px;">
                        <?php
                         if(isset($_SESSION['customer_email'])) 
                         {
                          echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
                         }
                         else
                         {
                          echo "<b>Welcome Guest:</b>";
                         }
                        ?>
                      <b style="color: yellow">shopping cart -</b>Total Items: <?php total_items(); ?> Total Price: <?php total_price (); ?> <a href="cart.php" style="color: yellow">Go to Cart</a>
                      <?php
                      if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php' style='color:orange;'>Login</a>";                        
                      }
                      else{
                        echo "<a href='logout.php' style='color:orange;'>Logout</a>";
                      } 
                      ?>
                      </span>
                      
  				</div>

  				<div id="products_box">
  					<?php getpro(); ?>
            <?php getCatPro(); ?>
            <?php getbrandpro(); ?>
  				</div>
  			</div>
  			<!-- content area ends here -->
  		</div>
  		  <!--content wrapper ends here -->
  			<div id="footer">
  				<h2 style="text-align: center; padding-top: 30px;">&copy; 2018 by ShopOnline</h2>
  			</div>

  		</div>
  		<!--Main Wrapper Ends here -->
  	</body>
</html>