<?php

session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    header('Location: login.php');
}
else {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="img/ww.png" />

		<title>Home page</title>

		<!-- CSS -->
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<div class="main-container">
			<nav>
				<ul>
					<li>
						<a href="index.php"><img src="img/home.png" /></a>
					</li>
                    <li>
						<a href="logout.php"><img src="img/logout.png" /></a>
					</li>
					<li>
						<a href="myaccount.php"><img src="img/user.png" /></a>
					</li>
					<li>
						<form
							id="search"
							class="form"
							action="search.php"
							method="post"
							autocomplete="on"
						>
							<span class="form-control">
								<input
									type="search"
									placeholder="Search"
									id="search"
									name="search"
								/>
							</span>
						</form>
					</li>
				</ul>
			</nav>
            <content>
                <h1>Welcome!</h1>
            </content>
            
		</div>
	</body>
</html>
<?php
}

?>