<?php
include_once("db_connect.php");
session_start();
$currentUser = $_SESSION['user_id'];

if (isset($_POST['deposit'])) {
	$amount = mysqli_real_escape_string($conn, $_POST['amount']);

	$sql = "SELECT balance FROM users WHERE id = '$currentUser'";
    $result = $conn-> query($sql);

    if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()) {
            $balance = $row['balance'];
            if ($amount > 0) {
                $sum = $balance + $amount;
                $result2= mysqli_query($conn, "UPDATE users Set balance = '$sum' where id = '$currentUser'");
                echo "Transaction succesful!";
            } else {
                echo "Cannot deposit negative amount";
            }
        }
    } else {
        echo "0 results";
    }
}
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css?v=2">
</head>
<body>
<section class="header">
		<nav>
			<a href=""><img src="images/logo.png"></a>
			<div class="links">
				<ul>
                <li><a href="welcome.php" title="Back"> Back </a></li>
                    <li><a href="logout.php" title="Logout"> Logout </a></li>
            	</ul>
			</div>
		</nav>
	<div class = "input">
        <h2>Make a deposit below!</h2>
		<form method="post" action="deposit.php">
            <div class="input-group">
                <label>Amount:</label>
                <input type="int" name="amount">
            </div>   
            <div class="input-group">
                <button type="withdraw" class="btn" name="deposit">deposit</button>
            </div>
  		</form>
	</div>
</section>
</body>
</html>