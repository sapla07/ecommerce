<?php 

if(!isset($_SESSION['user_email']))
{
     echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else
{

?>
<table width="795" align="center" bgcolor="skyblue">

	<tr align="center">
       <td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
    
    <tr align="center" bgcolor="orange">
      <th>S.N</th>
      <th>Title</th>
      <th>Image</th>
      <th>Price</th>
      <th>Edit</th>
      <th>Delete</th>      
    </tr>
   
   <?php 
   include("includes/db.php");
   $get_pro = "select * from products";
   $run_pro = mysqli_query($con, $get_pro);
   $i = 0;
   while($row_pro = mysqli_fetch_array($run_pro))
   {
   	  $pro_id = $row_pro['product_id'];
   	  $pro_title = $row_pro['product_title'];
   	  $pro_image = $row_pro['product_image'];
   	  $pro_price = $row_pro['product_price'];
   	  $i++;
   
   ?>

   <tr align="center">
     <td><br><?php  echo $i; ?></td>
     <td><br><?php  echo $pro_title; ?></td>
     <td><br><img  src="product_images/<?php  echo $pro_image; ?>" width="60" height="60"></td>
     <td><br><?php  echo $pro_price; ?></td>  	
     <td><br><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>  	
     <td><br><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>  	
   </tr>

<?php }?>
</table>
<?php }?>