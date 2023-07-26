<?php
$pid = $_GET['pid'];
$uid = $_GET['uid'];
$conn = new mysqli("localhost", "root", "", "eshop");
$query = "select * from cart where pid=$pid and uid=$uid";
$sql_result = mysqli_query($conn, $query);
if (mysqli_num_rows($sql_result) > 0) {
    echo '<script>alert("product is already in cart");window.open("home.php","_Self");</script> ';


} else {
    $quer = "insert into cart(pid,uid) values($pid,$uid)";
    $sql_status = mysqli_query($conn, $quer);
    if ($sql_status) {
        echo '<script>alert("Successfully Added To cart"); window.open("home.php","_self");</script>';

    } else {
        echo '<script>alert("Failed adding to cart") </script>';
    }
}
?>