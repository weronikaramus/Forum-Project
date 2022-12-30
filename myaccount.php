<?php
session_start();
include 'auth.php';

// echo "$_SESSION['email']";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="img/ww.png" />

		<title>My account</title>

		<!-- CSS -->
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<div class="main-container">
			<a href="index.php" class="back-button">BACK</a>
			<p class="site-title">Account info</p>
			<div class="account-info">
				<table>
					<tbody>
						<tr>
							<td>Active from</td>
							<td>
								<?php
								echo $_SESSION['date'];
                            	?>
							</td>
						</tr>
						<tr>
							<td>Role</td>
							<td>
                                <?php
                                echo $_SESSION['role'];
                                ?>
                            </td>
						</tr>
						<tr>
							<td>Username</td>
							<td>
								<?php
								echo $_SESSION['username'];
                            	?>
							</td>
                            <td><button class="change-button">Change</button></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>
								<?php
								echo $_SESSION['email'];
                            	?>
							</td>
                            <td><button class="change-button">Change</button></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>********</td>
                            <td><button class="change-button">Change</button></td>
						</tr>
					</tbody>
				</table>
				<button class="delete-account-button">Delete account</button>
			</div>
		</div>
	</body>
</html>
