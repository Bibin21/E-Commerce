<html>
<link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</html>
<?php
include('header.php');
$conn = new mysqli("localhost", "root", "","eshop");
$email=$_SESSION['email'];
$query="select uid from accinfo where email='$email'";
$sql_result=mysqli_query($conn,$query);
$id= $sql_result->fetch_row()[0];
$query1="select * from products where sid=$id";
$sql_result1=mysqli_query($conn,$query1);
?>
<h2 style=" color: black;; font-size:30px;">View And Edit uploaded Products </h2>
<?php

while ($row = mysqli_fetch_assoc($sql_result1)) {
    $pid = $row['pid'];
    $pname = $row['name'];
    $price = $row['price'];
    $desc = $row['description'];
    $imsource = $row['source'];
        echo "<div class='pdt-container'>
        <div class='pdt'>
      <img src='$imsource' class='pdt-img' >
      <div class='footer'>
    <div class='pdt-name'>$pname</div>
    <div class='pdt-price'>
      $price
    </div>
    <div class='pdt-details'>$desc</div>
    </div>
    </div>
    <div class='buttons'>
    <a href='edit.php?pid=$pid'><button>Edit</button></a>
    <a href='delete.php?pid=$pid'><button>Delete</button></a>
    </div>
  </div>";
?>
<?php
}

?>