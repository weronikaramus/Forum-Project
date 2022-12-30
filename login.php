<?php
session_start();
include 'auth.php';


// *** TU USTAWIAMY ŻEBY NIE DAŁO SIĘ WEJŚĆ NA LOGOWANIE JAK JUŻ JESTEŚMY ZALOGOWANI, ALE DO TESTÓW WYŁĄCZAM
if ((isset($_SESSION['logged']) && $_SESSION['logged']==true)){
    header('Location: index.php');
    exit();
}

if (!isset($_POST['email']) && !isset($_POST['passwd'])){

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="images/ww.png" />

		<title>Log in page</title>

		<link href="css/style.css" rel="stylesheet" />

		<meta />
	</head>
	<body>
		<div class="login-form">
			<p class="form-title">Log in</p>
			<form
				id="form"
				class="form"
				action="login.php"
				method="post"
				autocomplete="on"
			>
				<div class="form-control">
					<label for="email">Email</label>
					<input
						type="email"
						placeholder="example@mail.com"
						id="email"
						name="email"
					/>
					<!-- <small>Incorrect input!</small> -->
				</div>
				<div class="form-control">
					<label for="passwd">Password</label>
					<input
						type="password"
						placeholder="********"
						id="passwd"
						name="passwd"
					/>
					<!-- <small>Incorrect input!</small> -->
				</div>
                <?php
                    if(isset($_SESSION['error']))echo $_SESSION['error'];

                ?>
				<button type="submit">Submit</button>
			</form>
			<a href="register.html" class="form-signup-link"
				>Don't have an account? Sign up!</a
			>
		</div>
	</body>
</html>
<?php
}
    else{
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['passwd'] = md5($_POST['passwd']);

    $_SESSION['email'] = htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8");
    $_SESSION['passwd'] = htmlentities($_SESSION['passwd'], ENT_QUOTES, "UTF-8");


    // $result = mysqli_query($conn, "SELECT 'Users.username', 'Passwords.passwd' FROM `Users` JOIN Passwords ON Users.id_user = Passwords.id_user WHERE Users.email = $email;");
    
    // $sql = "SELECT * FROM Users WHERE email='$email' AND passwd='$passwd'";

    // $sql = "SELECT 'Users.username', 'Passwords.passwd' FROM `Users` JOIN Passwords ON Users.id_user = Passwords.id_user WHERE Users.email = '".$_SESSION['email']."'";

    if($result = $conn->query(sprintf("SELECT 'Users.username', 'Passwords.passwd' FROM `Users` JOIN Passwords ON Users.id_user = Passwords.id_user WHERE Users.email = '".mysqli_real_escape_string($conn, $_SESSION['email'])."'"))){



        $nousers = $result->num_rows;
        if($nousers==1){
            $_SESSION['logged'] = true;
            $result = mysqli_query($conn, "SELECT username, date, is_admin FROM `Users` WHERE Users.email = '".$_SESSION['email']."';");
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['date'] = $row['date'];
            if(!$row['is_admin']) $_SESSION['role'] = "user";
            else $_SESSION['role'] = "admin";

            unset($_SESSION['error']);

            
            header('Location: index.php');
        } else {

            $_SESSION['error'] = '<p class="login-error">Wrong email or password!<p>';
            
            // echo $_SESSION;

            header('Location: login.php');
            // echo "wrong email or pass";
        }
    }


	

}

?>