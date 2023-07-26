<?php
session_start();
$errors=array();
  use PHPMailer\PHPMailer\PHPMailer; 
  require 'phpmailer/src/Exception.php'; 
  require 'phpmailer/src/PHPMailer.php'; 
  require 'phpmailer/src/SMTP.php';
if (isset($_POST['reset'])) {
  $email=$_POST['email'];
$_SESSION['emailotp'] = $email;
if($email=="")
{
    echo "Email cannot be Empty";
    die;
}
$conn = new mysqli("localhost", "root", "","eshop");
$quer="select * from accinfo where email='$email'";
$sql_result=mysqli_query($conn,$quer);
$row=mysqli_num_rows($sql_result);
    if ($row > 0) {
        $otp = rand(100000, 999999);
        $query = "update accinfo set otp='$otp' where email='$email'";
        echo '<script>click();</script>';
        $sql_result = mysqli_query($conn, $query);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ryzengamer00@gmail.com';
        $mail->Password = 'vlurqatpnaanfgce';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ryzengamer00@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Otp for password reset';
        $mail->Body = $otp;
        $mail->send();
        $errors['email'] = "";
        $_SESSION['info'] = "We have send an otp to your email";
echo '<script>window.open("forgot1.php","_Self")</script>';
    } 
    else {
        $errors['email'] = "This email address does not exist!";
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
    <div class="container-fluid">
        <div class="form login">
<div class="form-content">
    <h2 class="forgot">Forgot Password</h2>   
    
<form action="forgot.php" method="POST" id="form">
<?php
    if(count($errors)>0)
    {
    ?>
    <div class="alert alert-danger text-center" style="text-align: center; display: block;">
    <?php
    echo $errors['email'];
    ?>
    </div>
    <?php
        }
        ?>
    <div class="field input-field" style="display:block">
        <input type="email" placeholder="Email" class="email" name="email" required>
        </div>
        
    <div class="field-button">
        <button type="submit" name="reset" class="field-button" value="Reset Password">Reset password</button>
    </div>
</form>
</div>
</div>
    </div>
    </section>
</body>
</html>