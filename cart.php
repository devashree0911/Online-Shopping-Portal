<?php
session_start();
if(!isset($_SESSION['uid'])){
header('Location:index.php');
}
include('dbconnect.php');
$uid=$_SESSION['uid'];
$cart_id=1;
?>
<?php
if(isset($_GET['remove_id']))
{
1";
}
?>
$pidr=mysqli_real_escape_string($conn,$_GET['remove_id']);
$sql="DELETE FROM cart WHERE p_id='$pidr' AND user_id='$uid' LIMIT
$run_query=mysqli_query($conn,$sql);
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online Shopping</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<div class="navi">
<ul>
<li><a href="profile.php" class="active">Shopping Made
Easy</a></li>
<li style="padding-left: 1000px"><a
href="cart.php">Cart</a></li>
<li style="padding-left: 70px"><a href="#">Hello, <?php echo
$_SESSION['uname']; ?></a></li>
<li style="padding-left: 70px"><a
href="logout.php">Logout</a></li>
</ul>
</div>
<br>
<div>
<div class="nrow">
<div class="ncol-2"></div>
<div class="ncol-8">
<div class="nrow">
<div class="ncol-12" ></div>
</div>
10px; padding:10px">
<div style="border:2px solid #595959; border-radius:
<div class="pannel-head"><u><span style="font-size:
22px;">--Cart--</span></u>
</div> 
<div class="nrow">
<div class="ncol-2"><b>Action</b></div>
<div class="ncol-2"><b>Product Image</b></div>
<div class="ncol-2"><b>Product Name</b></div>
<div class="ncol-2"><b>Product Price in ₹</b></div>
<div class="ncol-2"><b>Quantity</b></div>
<div class="ncol-2"><b>Price in ₹</b></div>
</div>
<br><br>
<div class="nrow">
<?php
$sql="SELECT * FROM cart WHERE user_id='$uid'";
$run_query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($run_query);
if($count>0){
$i=1;
$total_amt=0;
while($row=mysqli_fetch_array($run_query))
{
$sl=$i++;
$pid=$row['p_id'];
$query_new2=mysqli_query($conn,"SELECT * FROM
products WHERE product_id='$pid'");
$row_new2=mysqli_fetch_array($query_new2);
<div>
$product_image=$row_new2['product_image'];
$product_title=$row_new2['product_title'];
$product_price=$row_new2['product_price'];
$qty=$row['qty'];
$total=$row['total_amount'];
$price_array=array($total);
$total_sum=array_sum($price_array);
$total_amt+=$total_sum;
echo "
<div class='nrow'>
<div class='ncol-2'><a
href='cart.php?remove_id=$pid' class='delete-btn'>Delete</a>
</div>
<div class='ncol-2'><img
src='prod_images/$product_image' width='50px' height='50px'></div>
<div class='ncol-2'>$product_title</div>
<div class='ncol-2'><input type='text' size='10px'
value='$product_price' disabled></div>
<div class='ncol-2'><input type='text' size='10px'
value='$qty' disabled></div>
<div class='ncol-2'><input type='text' size='10px'
value='$total' disabled></div>
</div></div>
";}
?>
</div>
<?php echo "
<div class='nrow'>
<div class='ncol-8'></div>
<div style='font-size:25px' class='ncol-4'>
<b>Total:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹$total_amt</b> 
</div>
</div>
";
$_SESSION['total_amount']=$total_amt; }?>
</div>
<div>
</div>
<div class="nrow">
<br>
<a href="profile.php" class='goback-btn'>Go Back</a>
<?php echo " <a href='payment_success.php?cart_id=$cart_id'
class='checkout-btn'>Checkout</a> "?>
</div>
</div>
<div class="ncol-2"></div>
</div>
</div>
</div>
</body>
<style> .foot{text-align: center;}
</style>
</html>
