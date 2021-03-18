<?php
	include "check.php";
	$upload_dir = "./videos/";

	if (isset($_POST["sbm"])) {
		$upload_name = $_FILES["file"]["name"];
		$ext = pathinfo($upload_name, PATHINFO_EXTENSION);
		$filename = time() . rand(999,10000) . ".$ext";

		move_uploaded_file(
			$_FILES["file"]["tmp_name"], 
			$upload_dir . $filename
		);

		include "db_link.php";
		$date = date("Y-m-d");

		session_start();
		$uid = $_SESSION["onAuth"];

		$sql = "INSERT INTO 
					`videos`
				VALUES (
					NULL,
					' $filename',
					'$date',
					$uid,
					0,
					0
				)";

		mysqli_query($db_link, $sql);
	}
?>

<meta charset="utf-8">
<?php include "nav.html";?>
<form method="POST" enctype="multipart/form-data">
	<!-- Указываем размер файла в байтах -->
	<input 
		type="hidden" 
		name="MAX_FILE_SIZE" 
		value="999999999999" 
	/>
	<input type="file" name="file">
	<input type="submit" name="sbm" value="Load!">
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