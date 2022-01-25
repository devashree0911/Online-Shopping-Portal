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
<form method="post" action="index1.php">
<div class="demo1">
<label>First Name</label>
<input type="text" name="f_name" placeholder="Ex. Tushar">
</div>
<div class="demo1">
<label>Middle Name</label>
<input type="text" name="m_name">
</div> 
<div class="demo1">
<label>Last Name</label>
<input type="text" name="l_name" placeholder="Ex. Sharma">
</div>
<div class="demo1">
<label>Mobile No.</label>
<input type="text" name="mobile" placeholder="Phone Number">
</div>
<div class="demo1">
<label>Address #1</label>
<input type="text" name="address1" placeholder="Address 1">
</div>
<div class="demo1">
<label>Address #2</label>
<input type="text" name="address2" placeholder="Address 2">
</div>
<div class="demo1">
<label>Email ID</label>
<input type="email" name="email" placeholder="Email">
</div>
<div class="demo1">
<label>Address #2</label>
<input type="text" name="address2" placeholder="Address 2">
</div>
<div class="demo1">
<label>Password</label>
<input type="password" name="password" placeholder="Password">
</div>
<br>
<div >
<input type="submit" class="btn" value="Sign up" name="signup">
</div>
<br>
<p>
Already a user?
<a href="index.php">Sign In</a>
</p>
</form>
</body>
</html>
