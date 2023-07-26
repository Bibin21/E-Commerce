<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</html>
<?php
$uid=$_GET['uid'];
$pid=$_GET['pid'];
$conn = new mysqli("localhost", "root", "","eshop");
$query = "delete from cart where pid=$pid";
$sql_status=mysqli_query($conn,$query);
if ($sql_status) {

    header("location:cart.php?uid=$uid");
}
?>