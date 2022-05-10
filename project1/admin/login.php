x`<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Trang đăng nhập</title>
</head>

<body>
    <?php
	if(isset($_POST["sbm"])){

		$user = $_POST["user"];
		$pass = $_POST["pass"];

		$sql = "SELECT * FROM user
				WHERE user = '$user'
				AND pass = '$pass'";

		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query) > 0){

			$_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;

			header("location: index.php");

		}
		else{
			$error = '<p class="alert">Tài khoản không hợp lệ !</p>';
		}
	}
	?>

    <div class="login-page">
        <form class="form" method="post">
            <input name="user" autofocus placeholder="username" />
            <input name="pass" type="password" value="" placeholder="password" />
            <button type="submit" name="sbm">login</button>
            
            <?php if(isset($error)){echo $error;}?>
        </form>
    </div>
</body>

</html>