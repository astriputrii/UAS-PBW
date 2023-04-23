<!DOCTYPE html>
<html>
<head>
	<title>Tambah User</title>
</head>
<body>
	<h1>Tambah User</h1>
	<?php
	// cek apakah form telah di-submit
	if ($_SERVER['REQUEST_METHOD'] === 'user') {
		// mengambil data dari form
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];

		// lakukan validasi form disini

		// menyimpan data ke database
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

		// query untuk menyimpan data ke database
		$sql = "INSERT INTO users (nama, email, password, alamat) VALUES ('$nama', '$email', '$password', '$alamat')";

		if (mysqli_query($conn, $sql)) {
			echo "Data user berhasil ditambahkan";
		} else {
			echo "Terjadi kesalahan: " . mysqli_error($conn);
		}

		// tutup koneksi
		mysqli_close($conn);
	}
	?>

	<form method="POST">
		<label for="nama">Nama:</label><br>
		<input type="text" name="nama" required><br>

		<label for="email">Email:</label><br>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label><br>
		<input type="password" name="password" required><br>

		<label for="alamat">alamat:</label><br>
		<textarea name="alamat"></textarea><br>

		<input type="submit" value="Simpan">
	</form>
</body>
</html>
