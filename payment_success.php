<?php
session_start();
include('dbconnect.php');
if(!isset($_SESSION['uid'])){
header('Location:index.php');
}
?>
<?php
if(isset($_GET['pro_id']))
{
$pid=mysqli_real_escape_string($conn,$_GET['pro_id']);
$uid=$_SESSION['uid'];
$i=rand();
$query_new=mysqli_query($conn,"SELECT * FROM products WHERE
product_id='$pid'");
$row_new=mysqli_fetch_array($query_new);
$p_name=$row_new['product_title'];
$p_price=$row_new['product_price'];
$sql2="INSERT INTO customer_order(uid,pid,p_qty,p_status,tr_id) VALUES
('$uid','$pid','1','CONFIRMED','$i')";
$run_query2=mysqli_query($conn,$sql2);
$_SESSION['tr_id']=$i;
$_SESSION['total_amount']=$p_price;
}
if(isset($_GET['cart_id']))
{
$uid=$_SESSION['uid'];
$sql="SELECT * FROM cart WHERE user_id='$uid'";
$run_query=mysqli_query($conn,$sql);
$i=rand();
while($cart_row=mysqli_fetch_array($run_query))
{
$cart_prod_id=$cart_row['p_id'];
$pid=$cart_prod_id;
$query_new3=mysqli_query($conn,"SELECT * FROM products WHERE
product_id='$cart_prod_id'");
$row_new3=mysqli_fetch_array($query_new3);
$cart_prod_image=$row_new3['product_image'];
$cart_prod_title=$row_new3['product_title'];
$cart_prod_price=$row_new3['product_price'];
$cart_qty=$cart_row['qty'];
$cart_price_total=$cart_row['total_amount'];
$sql2="INSERT INTO customer_order
(uid,pid,p_qty,p_status,tr_id) VALUES
('$uid','$cart_prod_id','$cart_qty','CONFIRMED','$i')";
$run_query2=mysqli_query($conn,$sql2);
} 
$_SESSION['tr_id']=$i;
?>
<?php
$sql3="DELETE FROM cart WHERE user_id='$uid'";
$run_query3=mysqli_query($conn,$sql3);
}
$trid=$_SESSION['tr_id'];
$total_amount=$_SESSION['total_amount'];
$sql="SELECT * FROM customer_order WHERE tr_id='$trid'";
$run_query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online Shopping</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
<div style="padding-left: 20px;">
<div>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div>
<div><h1>Thank you!</h1></div>
<div style="font-size: 16px">
Hello <?php echo $_SESSION['uname']; ?>, your payment
is successful.
?>
<br>Your Transaction ID is <?php echo $trid; ?>
<br>Your Orders:-
<br><?php while($row=mysqli_fetch_array($run_query)){
<?php
$pid=$row['pid'];
$query_prod=mysqli_query($conn,"SELECT * FROM products
WHERE product_id='$pid'");
$row_prod=mysqli_fetch_array($query_prod);
$p_name=$row_prod['product_title'];
?>
<ul>
<li>
<?php echo "$p_name" ?> &nbsp Quantity- <?php echo
$row['p_qty']; ?>
</li>
</ul> 
<?php } ?>
<br><div style="font-size: 20px">Total Amount : ₹ <?php echo
"$total_amount" ?></div>
<br>You can continue with your shopping.
<p></p>
<a href="go_back.php" class='quickbook-btn'>Back to
store</a>
</div>
</div>
<div class='col-md-2'></div>
</div>
</div>
</div>
</div>
<img src="images/loading.gif" style="width:400px;
height: 400px;
position: relative;
top: 0px;
left: 469px;">
</body>
</html> 
