<!DOCTYPE>
<?php include("functions/functions.php")?>
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
  			 		<li><a href="#">SignUp</a></li>  			 		
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
  				<div id="shopping_cart">
                      <span style="float: right; font-size: 18px; padding: 5px; line-height: 40px;">
                      Welcome Guest!<b style="color: yellow">shopping cart -</b>Total Items: Total Price: <a href="cart.php" style="color: yellow">Go to Cart</a>

                      </span>
  				</div>
  				<div id="products_box">
  					<?php
  						$get_pro = "select * from products";

  						$run_pro = mysqli_query($con,$get_pro);

  						while($row_pro = mysqli_fetch_array($run_pro))
  						{
  							$pro_id = $row_pro['product_id'];
  							$pro_cat = $row_pro['product_cat'];
  							$pro_brand = $row_pro['product_brand'];
  							$pro_titile = $row_pro['product_title'];
  							$pro_price = $row_pro['product_price'];
  							$pro_image = $row_pro['product_image'];

  							echo "

  					          <div id='single_product'>
  					               <h4>$pro_titile</h4>
  					               <img src='admin_area/product_images/$pro_image' width='180' height='160' />
  					               <p><b>Price: $ $pro_price</b></p>
  					               <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
  					               <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
  					          </div>

  							   ";

  						}


  					?>
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