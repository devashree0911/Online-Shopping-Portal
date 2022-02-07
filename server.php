<?php
include('dbconnect.php');
session_start();
if(isset($_POST['userlogin'])){
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pwd=mysqli_real_escape_string($conn,$_POST['password']);
$sql="SELECT * FROM customer WHERE email='$email' AND
password='$pwd'";
$run_query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($run_query);
if($count==1){
$row=mysqli_fetch_array($run_query);
$_SESSION['uid']=$row['cust_id'];
$_SESSION['uname']=$row['first_name'];
echo "true";
header("Location:profile.php");
}
}
if(isset($_POST['signup'])){
$f_name=mysqli_real_escape_string($conn,$_POST['f_name']);
$m_name=mysqli_real_escape_string($conn,$_POST['m_name']);
$l_name=mysqli_real_escape_string($conn,$_POST['l_name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$address1=mysqli_real_escape_string($conn,$_POST['address1']);
$address2=mysqli_real_escape_string($conn,$_POST['address2']);
$name = "/^[A-Z][a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[az]{2,4})$/";
$number = "/^[0-9]+$/";
//check for available user-details
$sql = "SELECT user_id FROM user_info WHERE email = '$email'" ;
$check_query = mysqli_query($conn,$sql);
$count_email = mysqli_num_rows($check_query);
if($count_email > 0){
echo "
<div >
<a href='#'>&times;</a>
<b>Email Address is already available Try Another email
address</b>
";
</div>
exit(); 
}
else {
$sql="INSERT INTO customer
(first_name,middle_name,last_name, email, password, mobile, address1,
address2) VALUES
('$f_name','$m_name','$l_name','$email','$password','$mobile','$address1','
$address2')";
$run_query=mysqli_query($conn,$sql);
if($run_query){
$sql_new="SELECT * FROM customer WHERE
email='$email' AND password='$password'";
$run_query_new=mysqli_query($conn,$sql_new);
$count_new=mysqli_num_rows($run_query_new);
if($count_new==1)
{
$row_new=mysqli_fetch_array($run_query_new);
$_SESSION['uid']=$row_new['cust_id'];
$_SESSION['uname']=$row_new['first_name'];
echo "true";
}
header("Location:profile.php");
}
}
}
?>
