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
      <th>Category ID</th>
      <th>Category Title</th>
      <th>Edit</th>
      <th>Delete</th>      
    </tr>
   
   <?php 
   include("includes/db.php");
   $get_cat = "select * from Categories";
   $run_cat = mysqli_query($con, $get_cat);
   $i = 0;
   while($row_cat = mysqli_fetch_array($run_cat))
   {
   	  $cat_id = $row_cat['cat_id'];
   	  $cat_title = $row_cat['cat_title'];   	  
   	  $i++;
   
   ?>

   <tr align="center">
     <td><br><?php  echo $i; ?></td>
     <td><br><?php  echo $cat_title; ?></td>
     <td><br><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>  	
     <td><br><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>  	
   </tr>

<?php }?>
</table>
<?php }?>