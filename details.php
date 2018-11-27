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
             <img id="logo" src="images/ecommerce1.png" />
           <img id="banner" src="images/ecom4.gif" />
  			 </div>
  			 <!-- Menu bar Starts here -->
  			 <div class="menubar">
  			 	<ul id="menu">
  			 		<li><a href="index.php">Home</a></li>
  			 		<li><a href="allproducts.php">All Products</a></li>
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
  			     <ul id="sub">
                    <?php getcats();?>
  			     </ul>
                 <div id="sidebar_title">Brands</div>
  			     <ul id="sub">
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
          <?php
            if(isset($_GET['pro_id'])){   

            $product_id = $_GET['pro_id'];

            $get_pro = "select * from products where product_id='$product_id'";

            $run_pro = mysqli_query($con,$get_pro);

            while($row_pro = mysqli_fetch_array($run_pro))
            {
              $pro_id = $row_pro['product_id'];
              $pro_titile = $row_pro['product_title'];
              $pro_price = $row_pro['product_price'];
              $pro_image = $row_pro['product_image'];
              $pro_desc = $row_pro['product_desc'];

              echo "

                    <div id='single_product'>
                         <h4><center>$pro_titile</center></h4>
                         <img src='admin_area/product_images/$pro_image' width='400' height='300' />
                         <p><b><center>$ $pro_price</center></b></p>
                         <p>$pro_desc</p>
                         <a href='index.php' style='float:left;'>Go Back</a>
                         <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
                    </div>

                 ";

            }
          }
  	      ?>			
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