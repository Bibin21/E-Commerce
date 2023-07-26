<?php
$email=$_POST['email'];
$pass=$_POST['pass'];
$repass=$_POST['pass'];
if($pass!=$repass)
{
    echo "password and retype password must be same";
    die;
}

$conn = new mysqli("localhost", "root", "","eshop");
$quer="select * from accinfo where email='$email'";
$sql_result=mysqli_query($conn,$quer);
$row=mysqli_num_rows($sql_result);
if($row > 0)
{
    echo '<script>alert("Account already exist for this email try loggin in");window.open("login.php","_self")</script>';
    die;
}
$securepass = md5($pass);
$query="insert into accinfo(email,password,type) values('$email','$securepass','s')";

$sql_status=mysqli_query($conn,$query);

if($sql_status)
{
    echo '<script>alert("Signup Success redirecting to login page");window.open("login.php","_self")</script>';
}
else
{
echo "signup failed try again";
}
?>