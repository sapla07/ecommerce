<?php 

if(!isset($_SESSION['user_email']))
{
     echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{

?>

<form action="" method="post" style="padding: 80px;">
	
<b>Insert New Brands: </b>
<input type="text" name="new_brand" />
<input type="submit" name="add_brand" value="Add Brand" />

</form>

<?php 
include("includes/db.php");

 if (isset($_POST['add_brand'])) {
 	
  $new_brand = $_POST['new_brand'];
 $insert_brand = "insert into brands (brand_title) values ('$new_brand')";
 $run_brand = mysqli_query($con, $insert_brand);
 if($run_brand)
	{
		echo "<script>alert('new brand has been inserted successfully!')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}



?>
<?php }?>
