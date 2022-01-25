<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Online Shopping</title><style>
body
{
background: url(bg.jpg);
background-repeat:no-repeat;
background-attachment:fixed;
background-size:100% 100%;
font-family: 'Sansita', sans-serif;
}
form
{
width: 30%;
margin: 0px auto;
padding: 20px;
border: 1px solid #B0C4DE;
background: white;
border-radius: 0px 0px 10px 10px;
}
.btn
{
text-align: center;
width:100px;
padding: 10px;
font-size: 18px;
color: white;
background: green;
border: none;
border-radius: 5px;
}
.header
{
width: 30%;
margin: 50px auto 0px;
color: white;
background: #5F9EA0;
text-align: center;
border: 1px solid #B0C4DE;
border-bottom: none;
border-radius: 10px 10px 0px 0px;
padding: 20px;
} 
label
{
display: block;
text-align: left;
margin: 3px;
}
.demo1
{
margin: 10px 0px 10px 0px;
}
.demo1 input
{
height: 30px;
width: 93%;
padding: 5px 10px;
font-size: 16px;
border-radius: 5px;
border: 1px solid gray;
}
</style>
</head>
<body >
<div class="header">
<h2>Shopping Made Easy</h2>
</div>
<form method="post" action="index.php">
<div class="demo1">
<label>Email</label>
<input type="text" name="email" placeholder="e-Mail ID">
</div>
<div class="demo1">
<label>Password</label>
<input type="password" name="password" placeholder="Password">
</div>
<br>
<div >
<input type="submit" class="btn" value="Sign In" name="userlogin">
</div>
<br>
<p>
Not a user?
<a href="index1.php">Sign Up</a>
</p>
</form>
</body>
</html>
