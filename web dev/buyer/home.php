<?php include('header.php'); ?>
<?php
$email = $_SESSION['email'];
$conn=new mysqli("localhost", "root", "", "eshop");
$query1="select uid from accinfo where email='$email'";
$sql_result1=mysqli_query($conn,$query1);
$uid = $sql_result1->fetch_row()[0];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-SHOP</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div id="mainContainer">
        <h2 class="products" style="margin-top:5px; margin-left:5px; margin-bottom:-5px;">Products</h2>
            <?php
            if (isset($_POST['search'])) {
              $search = $_POST['searchval'];
              $query = "select * from products where name like '%$search%'";
              $sql_result1 = mysqli_query($conn, $query);
            } else {
              $query1 = "select * from products";
              $sql_result1 = mysqli_query($conn, $query1);
            }
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
    <a href='addtocart.php?pid=$pid&uid=$uid'><button>Add to Cart</button></a>
    </div>
  </div>";
    }  ?>
</div>
</body>
<script src="content.js"></script>
</html>

