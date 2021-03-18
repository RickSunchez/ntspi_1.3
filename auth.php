<meta charset="utf-8">
<?php
	$error = [];
	if (isset($_POST["sbm"])) {
		include "db_link.php";

		$mail  = $_POST["email"];
		$pass  = $_POST["pass"];

		$sql = "SELECT * 
				FROM `users` 
				WHERE `email` = '$mail'";

		$res = mysqli_query($db_link, $sql);
		$data = mysqli_fetch_assoc($res);

		if ($data == NULL) {
			$error[] = "Неверный email";
		} else {
			$p = $data["pass"];

			if ($p == $pass) {
				session_start();
				$_SESSION["onAuth"] = $data["user_id"];
				header("Location: index.php");
			} else {
				$error[] = "Неверный пароль";
			}
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
	Email
	<input type="text" name="email">
	Pass
	<input type="password" name="pass">
	<input type="submit" name="sbm" value="go">
	<a href="reg.php">Зарегистрироваться</a>
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