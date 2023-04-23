<!DOCTYPE html>
<html>
<head>
	<title>Delete Post</title>
</head>
<body>
	<h1>Delete Post</h1>

	<?php
	// ambil id post dari URL
	$id = $_GET["id"];

	// membuat koneksi ke database
	$servername = "localhost";
	$username = "username";
	$password_db = "password";
	$dbname = "posts_database";
	$conn = mysqli_connect($servername, $username, $password_db, $dbname);

	// cek koneksi
	if (!$conn) {
		die("Koneksi gagal: " . mysqli_connect_error());
	}

	// query untuk menghapus data post dari database
	$sql = "DELETE FROM posts WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		echo "Data post berhasil dihapus";
	} else {
		echo "Terjadi kesalahan: " . mysqli_error($conn);
	}

	// tutup koneksi
	mysqli_close($conn);
	?>
</body>
</html>
