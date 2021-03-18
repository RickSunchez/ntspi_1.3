<?php
	include "check.php";
	include "db_link.php";

	if (isset($_GET["delete"])) {
		$vid = $_GET["id"];

		$sql = "DELETE FROM `videos` WHERE `id`=$vid";

		mysqli_query($db_link, $sql);

		header("Location: read_from.php");
	}

	if (isset($_GET["like"])) {
		$id = $_GET["id"];

		$sql = "UPDATE 
					`videos` 
				SET `likes`=`likes`+1
				WHERE `id`=$id";

		mysqli_query($db_link, $sql);

		header("Location: read_from.php");
	}

	if (isset($_GET["dlike"])) {
		$id = $_GET["id"];

		$sql = "UPDATE 
					`videos` 
				SET `dislikes`=`dislikes`+1
				WHERE `id`=$id";

		mysqli_query($db_link, $sql);

		header("Location: read_from.php");
	}


	session_start();
	$uid = $_SESSION["onAuth"];

	$sql = "SELECT * FROM `videos` WHERE `user_id`=$uid";
	$data = mysqli_query($db_link, $sql);

	while ($res = mysqli_fetch_assoc($data)) {
		$id = $res["id"];
		$file = "videos/" . trim($res["file"]);
		$date = $res["date"];
		$l = $res["likes"];
		$d = $res["dislikes"];

		?>
			<div class="video">
				<div class="file_name">
					<?=$file;?>
				</div>
				<video controls="controls" width="300" height="300">
					<source src="<?=$file;?>">
				</video>
				
				<div class="stat">
					<?=$l;?> / <?=$d;?>
					<form>
						<input 
							type="hidden" 
							name="id"
							value="<?=$id;?>">
						<input type="submit" name="like" value="+">
						<input type="submit" name="dlike" value="-">
					</form>
				</div>
				<div class="controls">
					<a href="read_from.php?delete=1&id=<?=$id;?>">X</a>
				</div>
			</div>
		<?php
	}
?>

<?php include "nav.html";?>