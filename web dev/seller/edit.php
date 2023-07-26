<?php include('header.php'); ?>
<?php
$i=2;
if (isset($_POST['update'])) {
    $pid =$_GET['pid'];
    $email = $_SESSION['email'];
    $name = $_POST['pname'];
    $price= $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $actual_name = $_FILES['image']['name'];
    $temp_path = $_FILES['image']['tmp_name'];
    $move_path = "..//images//$actual_name";
    move_uploaded_file($temp_path,$move_path);
    $conn = new mysqli("localhost", "root", "", "eshop");
    $query="select uid from accinfo where email='$email'";
    $sql_result = mysqli_query($conn, $query);
$id= $sql_result->fetch_row()[0];
    $query1= "update products set name='$name',price='$price',description='$description',source='$move_path',category='$category' where pid=$pid";
    $sql_status=mysqli_query($conn, $query1);
    if ($sql_status) {
        $i = 1;
    } else {
        $i = 0;
    }
} else {
    $pid = $_GET['pid'];
    $conn = new mysqli("localhost", "root", "", "eshop");
    $query = "select * from products where pid=$pid";
    $sql_result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($sql_result)) {
        $name = $row['name'];
        $price = $row['price'];
        $description =$row['description'];
        $category=$row['category'];
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>products upload</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<section class="container-fluid">
        <div class="form login" style="margin-top:-100px;">
<div class="form-content">
    <h2 class="forgot">Edit Product</h2>
<form enctype="multipart/form-data" action="edit.php?pid=<?php echo $pid ?>" method="POST">
    <?php
    if ($i == 1) {
    ?>
      <div class="alert alert-success text-center" style="text-align: center; display: block;">
    <?php
        echo "Edit Success";
    ?>
    </div>
    <?php
    } else if ($i == 0) {
    ?>
    <div class="alert alert-danger text-center" style="text-align: center; display: block;">
        <?php
        echo "Edit Failed";
        ?>
    </div>
        <?php

    }
        ?>
    <div class="field input-field">
        <input type="text" placeholder="Product Name" name="pname" required
        value="<?php
        echo $name;?>"
        >
        </div>
        <div class="field input-field">
<input type="number" placeholder="Product Price" name="price"required
value="<?php 
        echo $price;
   ?>"
>
</div>
<textarea class="form-control mb-2" placeholder="Product Description" cols="20" rows="5" name="description" required>
<?php 
        echo $description;
  ?>
</textarea>
<div class="field input-field">
<input type="file" name="image" accept=".jpg" required>
    </div>
<label>Category</label>  
<select name="category">  
<option value="Shoes">shoes
</option>  
<option value = "Camera"> camera
</option>  
<option value = "Watch">watch
</option>  
<option value = "shirt">shirt
</option>  
<option selected="echo <?php$cat?>"><?php 
        echo $category;
    ?>
</option>  
</select>  
    <div class="field-button">
    <button type="submit" name="update" class="field-button" value="upload">Update</button>
   </div>
</form>
</div>
</div>
 </section>
</body>
</html>

