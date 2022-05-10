<?php
include_once("db_connect.php");
session_start();
$currentUser = $_SESSION['user_id'];
?>

<head>
	<title> Account Information </title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%:
			color: #588c7e:
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		}
		th {
			background-color: #588c7e;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		tr:nth-child(odd) {
			background-color:gray;
		}
	</style>
	<link rel="stylesheet" type= "text/css" href="style.css?v=2">
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
		</div>
		<center><h2>Account Information</h2><center><br>
		<table>
			<tr>
				<th> User ID &nbsp </th>
				<th> Username &nbsp </th>
				<th> Email &nbsp </th>
				<th> Password &nbsp </th>
				<th> Zip &nbsp </th>
                <th> Balance ($) &nbsp</th>
                <th> Balance (€) &nbsp</th>
                <th> Balance (¥) &nbsp</th>
                <th> Balance (₿) &nbsp</th>
			</tr>
			<?php
			include_once("db_connect.php");
            $sql = "SELECT * from users where id = '$currentUser'";
            $result = $conn-> query($sql);
                
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()) {
                    $euro = $row['balance']*0.94;
                    $yen = $row['balance']*129.18;
                    $bitcoin = $row['balance']*.000025;
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["user"] ."</td><td>". $row["email"] ."</td><td>". $row["pass"] ."</td><td>"
                        . $row["zip"] ."</td><td>". $row["balance"] ."</td><td>". $euro ."</td><td>". $yen ."</td><td>". $bitcoin ."</td><td>";
                }
            } else {
                echo "0 results";
            }
			?>
			</table>	
	</section>
</body>