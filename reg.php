<?php
	$error = [];
	if (isset($_POST["sbm"])) {
		$name  = $_POST["name"];
		$mail  = $_POST["email"];
		$pass  = $_POST["pass"];
		$pass2 = $_POST["pass2"];

		if ($pass == $pass2) {
			include "db_link.php";

			$sql = "INSERT INTO 
						`users`(
							`user_id`, 
							`name`, 
							`email`, 
							`pass`
						) 
					VALUES (
						NULL,
						'$name',
						'$mail',
						'$pass'
					)";

			mysqli_query($db_link, $sql);

			header("Location: auth.php");
		} else {
			$error[] = "Пароли не совпадают";
		}
	}
?>
<form method="POST">
	<div class="error">
		<?php
			foreach ($error as $err) {
				echo $err;
			}
		?>
	</div>
	Ник
	<input type="text" name="name">
	Email
	<input type="text" name="email">
	Pass
	<input type="password" name="pass">
	Pass2
	<input type="password" name="pass2">
	<input type="submit" name="sbm" value="go">
	<a href="auth.php">Авторизация</a>
</form>






<style type="text/css">
	body {
		margin: 0px;
		padding: 0px;
		width: 100%;
		height: 100vh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	form {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background: grey;
		padding: 20px;
	}
	form input {
		margin: 10px;
	}
</style>