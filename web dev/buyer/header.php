<html>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
  ?>
  <div class="alert alert-danger text-center" style="text-align: center; display: block;">
  <?php
  echo  "ERROR :  Invalid Access Login and Continue";
  ?>
  </div>
  <?php
  die();
} else {
  $email = $_SESSION['email'];
  $conn = new mysqli("localhost", "root", "", "eshop");
$query = "select uid from accinfo where email='$email'";
$sql_result = mysqli_query($conn,$query);
$uid=$sql_result->fetch_row()[0];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> E-Shop Header </title>
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <header>E-SHOP</header>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php?i=1" style="color: white;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="upload.php" style="color: white;">Upload Products  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php" style="color: white;">View and Edit Uploads</a>
            </li>
          </ul>
          <form class=sortby action="home.php" method="POST">  
<label style="color: white;"> Sort by</label>  
<select>  
<option value = "Price low"> Price low-high
</option>  
<option value = "Price high"> Price high-low
</option>  
<option value = "Name">Name 
</option>  
<option value = "Category"> Category
</option>  
<option selected = "None"> None  
</option>  
</select>  
</form> 
<form class="form-inline my-2 my-lg-0" action="home.php" method="POST">
    <input class="form-control mr-sm-2" type="search" name="searchval" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
  </form>
</div>
<div id="user" style="margin-left:5px;">
<?php echo "<a href='cart.php?uid=$uid' style='margin-left:10px;'>cart<i class='fas fa-shopping-cart addedToCart'></i></a>";?>
    <a href=""style="margin-left:10px;"><?php echo $email; ?><i class="fas fa-user-circle userIcon"></i> </a>
    <a href="logout.php" style="margin-left:10px;">Logout</a>
</div>
</nav>
</body>
</html>
<?php
}