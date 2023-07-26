<?php
session_start();
$errors = array();
if (isset($_POST['confirm'])) {
    $email = $_SESSION['emailotp'];
    $npass = $_POST['newpass'];
    $npass1 = $_POST['newpass1'];
    session_abort();
    if ($npass == "") {
        $errors['confirm'] = "password must not be empty";
    } else {
        if ($npass != $npass1) {
            $errors['confirm'] = "New Password and Retype password must be same";
        } else {
            $securepass = md5($npass);
            $conn = new mysqli("localhost", "root", "", "eshop");
            $query = "update accinfo set password='$securepass' where email='$email'";
            $sql_status = mysqli_query($conn, $query);
            $errors['confirm'] = "";
            echo '<script>alert("Password Changed");window.open("login.php","_self")</script>';
           
        }
    }
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
    <h2 class="forgot">New Password</h2>
<form action="newpass.php" method="POST" id="form1">
<?php
    if(count($errors)>0)
    {
    ?>
      <div class="alert alert-danger text-center" style="text-align: center; display: block;">
    <?php
    echo $errors['confirm'];
    ?>
    </div>
    <?php
    }
    ?>
    <div class="field input-field-1" >
        <input type="input" placeholder="New Password" class="otp" name="newpass" required>
        </div>
        <div class="field input-field-1" >
        <input type="input" placeholder="Retype New pass" class="otp" name="newpass1" required>
        </div>
        <div class="field-button" style="display:block">
        <button type="submit" name="confirm" class="field-button" value="confirm">Confirm</button>
    </div>
      </form>
</div>
</div>
 </section>
</body>
</html>

