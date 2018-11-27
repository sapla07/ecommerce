<div>
<?php
include("includes/db.php");
$total = 0;
global $con;
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con, $sel_price);
while($p_price = mysqli_fetch_array($run_price))
{
    $pro_id  = $p_price['p_id'];
    $pro_price = "select * from products where product_id='$pro_id'";
    $run_pro_price = mysqli_query($con, $pro_price);
    while($pp_price = mysqli_fetch_array($run_pro_price))
    {
        $product_price = array($pp_price['product_price']);
        $product_name = $pp_price['product_title'];
        $values = array_sum($product_price);
        $total += $values;

    }
}
?>
<h2 align="center" style="margin :10px; padding:20px;">Pay with paypal :</h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="s.sapla132-facilitator@gmail.com">
  
  <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
  <input type="hidden" name="amount" value="<?php echo $total; ?>">
  <input type="hidden" name="currency_code" value="USD">

 <!--  <input type="hidden" name="return" value="">
  <input type="hidden" name="cancel_return" value=""> -->


  <input type="image"
    src="http://readyshoppingcart.com/wp-content/uploads/2013/06/express-checkout-paypal.png" alt="Buy Now">
  <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif"
    width="1" height="1">
</form>
</div>