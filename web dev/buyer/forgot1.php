<?php
session_start();
$errors = array();
if (isset($_POST['verify'])) {
    $email = $_SESSION['emailotp'];
    $otpen = $_POST['otp'];
    $conn = new mysqli("localhost", "root", "", "eshop");
    $quer = "select otp from accinfo where email='$email'";
    $sql_result = mysqli_query($conn, $quer);
    $value = $sql_result->fetch_row()[0];
    if ($value == $otpen) {
        $errors['verify'] = "";
        header('location:newpass.php');
    } else
        $errors['verify'] = "Incorrect OTP";
}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<title>Forgot</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="container-fluid">
        <div class="form login">
<div class="form-content">
    <h2 class="forgot">Enter OTP</h2>
<form action="forgot1.php" method="POST" id="form1">
<?php
    if(count($errors)>0)
    {
    ?>
      <div class="alert alert-danger text-center" style="text-align: center; display: block;">
    <?php
    echo $errors['verify'];
    ?>
    </div>
    <?php
            } else {
        if (isset($_SESSION['info'])) {
            ?>
              <div class="alert alert-success text-center" style="text-align: center; display: block;">
            <?php
            echo $_SESSION['info'];
            ?>
            </div>
            <?php
        }
    }
        ?>
   
    <div class="field input-field-1" >
        <input type="input" placeholder=" otp" class="otp" name="otp" required>
        </div>
        <div class="field-button" style="display:block">
        <button type="submit" name="verify" class="field-button" value="Verify">Verify</button>
    </div>
      </form>
</div>
</div>
 </section>
</body>
</html>

