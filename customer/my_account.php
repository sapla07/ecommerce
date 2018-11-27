<!DOCTYPE>
<?php
 session_start();
 include("functions/functions.php")
 ?>
<html>
    <head>  
  	<title> My Online Shop</title>
  	<link rel="stylesheet" href="styles/style.css" media="all" />
  	</head>
  	<body>
  		<!-- Main Wrapper starts here-->
  		<div class="main_wrapper">
  			<div class="header_wrapper">
             <a href="../index.php"><img id="logo" src="images/ecommerce1.png" /></a>
           <img id="banner" src="images/ecom4.gif" />
  			 </div>
  			 <!-- Menu bar Starts here -->
  			 <div class="menubar">
  			 	<ul id="menu">
  			 		<li><a href="../index.php">Home</a></li>
  			 		<li><a href="../all_products.php">All Products</a></li>
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
  			     <div id="sidebar_title">My Account</div>
  			     <ul id="cat">
              <?php
              
              $user = $_SESSION['customer_email'];
              $get_img = "select * from customer where customer_email='$user'";
              $run_img = mysqli_query($con, $get_img);
              $row_img = mysqli_fetch_array($run_img);
              $c_image = $row_img['customer_image'];
              $c_name = $row_img['customer_name'];
              echo "<p style='text-align: center'><img src='customer_images/$c_image' width='150px' height='150px' /></p>";
              
              ?>
                    <li><a href="my_account.php?my_orders">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
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
                          echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
                         }
                         else
                         {
                          echo "<b>Welcome Guest:</b>";
                         }
                        ?>
                      
                      <?php
                      if(!isset($_SESSION['customer_email'])){
                        echo "<a href='../checkout.php' style='color:orange;'>Login</a>";                        
                      }
                      else{
                        echo "<a href='logout.php' style='color:orange;'>Logout</a>";
                      } 
                      ?>
                      </span>
                      
  				</div>

  				<div id="products_box">
  			  
    <?php
          if(!isset($_GET['my_orders'])){
            if(!isset($_GET['edit_account'])){
              if(!isset($_GET['change_pass'])){
                if(!isset($_GET['delete_account'])){
          echo "<h2 style='padding: 20px;'>Welcome: $c_name</h2>
              <b>You can see your orders progress by clicking this 
            <a href='my_account.php?my_orders'>link</a></b>";
           }
         }
       }
     }
    ?> 

        <?php
          if(isset($_GET['edit_account']))
          {
            include("edit_account.php");
          }
          if(isset($_GET['change_pass']))
          {
            include("change_pass.php");
          }
          if(isset($_GET['delete_account']))
          {
            include("delete_account.php");
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