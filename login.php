<?php 
ob_start();
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: login.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."' and pass = '".$password."'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['user'];		
		header("Location: welcome.php");
	} else {
		echo "Invalid login. Please try again!!";
	}
}
?>

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
        <br><br><br><h2>Login Below To Gain Access</h2>
        <div class="input">
            <h3>Please Enter Your Email and Password</h3>
            <form method="post" action="login.php">
                <div class="input-group">
                    <label>Email:</label>
                    <input type="text" name="email">
                </div>
                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="login">Login</button>
                </div>
                <p>
				  <br>Not yet a member? <a href="register.php">Sign Up</a>
			    </p>
            </form>
        </div>
    </section>
</body>
</html>