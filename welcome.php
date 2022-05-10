<?php
include_once("db_connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href=""><img src="images/logo.png"></a>
            <div class="links">
                <ul>
                    <li><a href="logout.php" title="Logout">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="input">
            <h2>
            <?php
            if(!isset($_SESSION['user_id'])) {
                echo "You are not logged in!";
                echo " Select logout and sign back in!";
            } else {
                echo "Welcome ";
                echo $_SESSION['user_name'];
            }
            ?>
            </h2>
            <h2>Please select from the following options</h2>
            <div class="options">
                <ul>
                    <li><a href="viewaccount.php" title="update"> View Account </a></li>
                    <li><a href="deposit.php" title="view stock"> Deposit </a></li>
                    <li><a href="withdraw.php" title="donate"> Withdraw </a></li>
                </ul>
            </div>
            
        </div>
    </section>
</body>
</html>