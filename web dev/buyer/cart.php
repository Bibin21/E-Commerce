<?php include('header.php');
?>

<html>
<link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <h2 style="font-size: 30px; margin: 10px;">Cart</h2>
</html>
<?php
$totalprice=0;
$conn = new mysqli("localhost", "root", "","eshop");
$uid=$_GET['uid'];
$query="select * from products where pid in (select pid from cart where uid=$uid)";
$sql_result=mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($sql_result)) {
    $pid = $row['pid'];
    $pname = $row['name'];
    $price = $row['price'];
  $totalprice = $totalprice + $price;
    $desc = $row['description'];
    $imsource = $row['source'];
    ?>
    <html>
<body  class="cart-container" style="align-items:flex;">
  
    <?php
    echo "<div class='pdt-container'>
        <div class='im-conatiner'>
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
    <a href='delete.php?pid=$pid&uid=$uid'><button>Delete from cart</button></a>
    </div>
  </div>";}
  echo "<form action='checkout.php?uid=$uid' method='POST' class='cart-info'>
  <h2 style='font-size:20px'>Total Price=$totalprice</h2>
  <button type='submit' name='checkout' class='field-button'>Checkout</button>
  </form>";
  ?>
  </body>
  </html>