<?php
session_start();
if(!isset($_SESSION['uid'])){
header('Location:index.php');
}
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online Shopping Portal</title>
<link rel="shortcut icon" href="images/fav.png">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<div >
<div class="navi"> 
<ul>
<li><a href="profile.php" class="active">Shopping Made
Easy</a></li>
<li style="padding-left: 1000px"><a
href="cart.php">Cart</a></li>
<li style="padding-left: 70px"><a href="#">Hello, <?php echo
$_SESSION['uname']; ?></a></li>
<li style="padding-left: 70px"><a href="logout.php"
class="logout">Logout</a></li>
</ul>
</div>
<br>
<div class="ncol-1"></div>
<div class="ncol-2">
<br><br>
<div class="dash">
<?php
$category_query="SELECT * FROM categories";
$run_query=mysqli_query($conn,$category_query);
echo "<ul>
<li ><a href='#' style='backgroundcolor:black;color:orange;' ><h3>Categories</h3></a></li>";
if(mysqli_num_rows($run_query)){
while($row=mysqli_fetch_array($run_query)){
$cid=$row['cat_id'];
$cat_name=$row['cat_title'];
echo "<li ><a href='profile.php?ctid=$cid' class='category'
cid='$cid'>$cat_name</a></li>";
}
echo "</ul>";
}?>
</div>
<br>
<div class="dash" >
<?php
$category_query="SELECT * FROM brands";
$run_query=mysqli_query($conn,$category_query);
echo "<ul>
<li ><a href='#'style='backgroundcolor:black;color:orange;'><h3>Brands</h3></a></li>";
if(mysqli_num_rows($run_query)){
while($row=mysqli_fetch_array($run_query)){
$bid=$row['brand_id'];
$brand_name=$row['brand_title'];
echo "<li ><a href='profile.php?brid=$bid'
class='brand' bid='$bid'>$brand_name</a></li>";
}
echo "</ul>";
}
?>
</div>
</div>
<div class="ncol-8">
<div class="ncol-12">
<?php
if(isset($_GET['pro_id']))
{$pid=mysqli_real_escape_string($conn,$_GET['pro_id']);
$uid=$_SESSION['uid'];
$sql = "SELECT * FROM products WHERE product_id = '$pid'"; 
$run_query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($run_query);
$id = $row["product_id"];
$pro_title = $row["product_title"];
$pro_image = $row["product_image"];
$pro_price = $row["product_price"];
$sql="INSERT INTO cart(p_id,user_id,qty,total_amount)
VALUES('$pid','$uid','1','$pro_price')";
$run_query = mysqli_query($conn,$sql);
if($run_query){
echo "
<div style='backgroundcolor:#a8ff94;width:100%;border:3px solid green;padding:5px;margin:5px;
border-radius:12px;}'>
<a href='profile.php' class='close-btn'>&times</a>
<strong>Success!</strong> $pro_title added to cart!
</div>
";
}}
?>
</div>
<div id="pannel" >
<div class="pannel-head"><u><span style="font-size:
22px;">--Featured Products--</span></u>
</div>
<br>
<div >
<div class="nrow">
<?php
if(isset($_GET['ctid']))
{
$cid=mysqli_real_escape_string($conn,$_GET['ctid']);
$product_query="SELECT * FROM products WHERE
product_cat=$cid";
}
else if (isset($_GET['brid']))
{
$bid=mysqli_real_escape_string($conn,$_GET['brid']);
$product_query="SELECT * FROM products WHERE
product_brand=$bid";
}
else
{
$product_query="SELECT * FROM products;";
}
$run_query=mysqli_query($conn,$product_query);
if(mysqli_num_rows($run_query)){
while($row=mysqli_fetch_array($run_query)){
$pro_id=$row['product_id'];
$pro_cat=$row['product_cat'];
$brand=$row['product_brand'];
$title=$row['product_title'];
$price=$row['product_price'];
$img=$row['product_image'];
echo "<div class='ncol-4 pannel_style'
style='background-color: #e7e7e7'>
<div id='pannel_in' > 
size:17px'>$title</span><br>
height='200px' width='150px'>
<span style='font-
<img src='prod_images/$img'
<br>
₹ $price <br><br>
<a href='profile.php?pro_id=$pro_id'
class='addtocart-btn'>Add to Cart</a>&nbsp &nbsp
<a
href='payment_success.php?pro_id=$pro_id' class='quickbook-btn'> Quick
Book</a> 
</div></div>";
}} ?>
</div>
</div>
</div> 
<div class="ncol-2"></div>
</div>
</body>
</html>
