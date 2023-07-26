<?php
$uid=$_GET['uid'];
$conn = new mysqli("localhost", "root", "","eshop");
$query = "delete from cart where uid=$uid";
$sql_status=mysqli_query($conn,$query);
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div style="text-align:center;">
<i class="fa fa-check-circle" style="font-size:100px; color:rgb(29, 143, 23);"></i>
<h2 style="font-size: 40px; color: rgb(29, 143, 23);">order placed Successfully</h2>
<a href="home.php">Click here to return to Homepage</a>
</div>
</html>
