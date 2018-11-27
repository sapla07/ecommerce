<?php

include("includes/db.php");

if(isset($_GET['delete_brand']));
{

	$brand_id = $_GET['delete_brand'];
	$delete_brand = "delete from brands where brand_id='$brand_id'";
	$run_delete = mysqli_query($con, $delete_brand);
	if($run_delete)
	{
		echo "<script>alert('brand has been deleted successfully!')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}

?>