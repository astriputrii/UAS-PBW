<!DOCTYPE html>
<html>
<head>
	<title>Update Post</title>
</head>
<body>
	<h1>Update Post</h1>

	<?php
	// ambil id post dari URL
	$id = $_GET["id"];

	// membuat koneksi ke database
	$servername = "localhost";
	$username = "username";
	$password_db = "password";
	$dbname = "nama_database";
	$conn = mysqli_connect($servername, $username, $password_db, $dbname);

	// cek koneksi
	if (!$conn) {
		die("Koneksi gagal: " . mysqli_connect_error());
	}

	// query untuk mengambil data post dari database
	$sql = "SELECT * FROM posts WHERE id='$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// ambil data post dari database
		$row = mysqli_fetch_assoc($result);
		$title = $row["title"];
		$content = $row["content"];
		$author = $row["author"];

		// cek apakah form telah disubmit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// ambil data post dari form
			$title = $_POST["title"];
			$content = $_POST["content"];
			$author = $_POST["author"];

			// query untuk memperbaharui data post di database
			$sql = "UPDATE posts SET title='$title', content='$content', author='$author', updated_at=NOW() WHERE id='$id'";

			if (mysqli_query($conn, $sql)) {
				echo "Data post berhasil diperbaharui";
			} else {
				echo "Terjadi kesalahan: " . mysqli_error($conn);
			}
		}
	} else {
		echo "Data post tidak ditemukan";
	}

	// tutup koneksi
	mysqli_close($conn);
	?>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
		<label for="title">Title:</label>
		<input type="text" name="title" value="<?php echo $title; ?>"><br><br>

		<label for="content">Content:</label>
		<textarea name="content" rows="5" cols="40"><?php echo $content; ?></textarea><br><br>

		<label for="author">Author:</label>
		<input type="text" name="author" value="<?php echo $author; ?>"><br><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
