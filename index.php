<?php
	session_start();
	if (isset($_POST["logout"])) {
		session_destroy();
	}

	include "check.php";
?>

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
	.hi {
		font-size: 70px;
	}
</style>
<div class="hi">
	WELCOME!
	<?php echo $mail;?>
	<?php include "nav.html";?>
</div>
<form method="POST">
	<input type="submit" name="logout" value="logout">
</form>