<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</html>
<?php
$pid=$_GET['pid'];
$conn = new mysqli("localhost", "root", "","eshop");
$query = "delete from products where pid=$pid";
$sql_status=mysqli_query($conn,$query);
if ($sql_status) {

    echo'<div class="alert alert-success text-center" style=" align-items:center; text-align:center; display: block;">
    </div>';
    echo '<script>window.open("view.php","_self")</script>';
}
?>