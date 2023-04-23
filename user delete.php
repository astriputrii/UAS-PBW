public static function delete($author_id)
{
    $sql = "DELETE FROM authors WHERE author_id = ?";
    $params = array($author_id);
    return self::executeQuery($sql, $params);
}

<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
</head>
<body>
	<h1>Delete User</h1>
	<?php
	// ambil id user yang akan dihapus dari URL
	$id = $_GET['id'];

	// menghapus data user dari database
	$servername = "localhost";
	$username = "username";
	$password_db = "password";
	$dbname = "user_database";

	// membuat koneksi ke database
	$conn = mysqli_connect($servername, $username, $password_db, $dbname);

	// cek koneksi
	if (!$conn) {
		die("Koneksi gagal: " . mysqli_connect_error());
	}

	// query untuk menghapus data user dari database
	$sql = "DELETE FROM users WHERE id=$id";

	if (mysqli_query($conn, $sql)) {
		echo "Data user berhasil dihapus";
	} else {
		echo "Terjadi kesalahan: " . mysqli_error($conn);
	}

	// tutup koneksi
	mysqli_close($conn);
	?>
</body>
</html>
