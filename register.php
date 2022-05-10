<?php 
ob_start();
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: welcome.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['user']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);
	$acctype = mysqli_real_escape_string($conn, $_POST['acctype']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);

	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password don't match";
	}
    
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(user, email, pass, balance, acctype, zip) VALUES ('" . $name . "', '" . $email . "', '" . $password . "','" . $balance . "','" . $acctype . "','" . $zip . "')")) {
			echo "Successfully Registered!";
		} else {
			echo "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href=""><img src="images/logo.png"></a>
            <div class="links">
                <ul>
                    <li><a href="index.html" title="Home">Home</a></li>
                    <li><a href="login.php" title="Login">Login</a></li>
                    <li><a href="register.php" title="Register">Register</a></li>
                </ul>
            </div>
        </nav>

        <div class="input">
        <br><br><br><h2>Register Below!</h2>
            <form method="post" action="register.php">
                <div class="input-group">
                    <label>Balance:</label>
                    <input type="decimal" name="balance">
                </div>
                <div class="input-group">
                    <label for = "acctype">Account type:</label>
                    <select id="acctype">
                        <option value="customer"> Customer</option>
                        <option value="employee"> Employee</option>
                        <option value="admin"> Admin</option>
                    </select>
                </div>
                <br><br>
                <div class="input-group">
                    <label>Name:</label>
                    <input type="text" name="user">
                </div>
                <div class="input-group">
                    <label>Email:</label>
                    <input type="text" name="email">
                </div>
                <div class="input-group">
                    <label>Zip code:</label>
                    <input type="text" name="zip">
                </div>
                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="pass">
                </div>
                <div class="input-group">
                    <label>Confirm password:</label>
                    <input type="password" name="cpass">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="signup">register</button>
                </div>
                <p>
                    <br>already registered? <a href="login.php">Sign In</a>
                </p>
            </form>
            <center><span style = "color: red"><?php if (isset($password_error)) echo $password_error; ?></span>
            <span style = "color: red"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span></center>
        </div>
    </section>
</body>
</html>