<!DOCTYPE html>
<html>
<head>
	<title>Blog Posts</title>
</head>
<body>
	<h1>Blog Posts</h1>

	<?php
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
	$sql = "SELECT * FROM posts";
	$result = mysqli_query($conn, $sql);

	// cek apakah data post ada
	if (mysqli_num_rows($result) > 0) {
		// tampilkan data post dalam bentuk tabel
		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Title</th>";
		echo "<th>Content</th>";
		echo "<th>Author</th>";
		echo "<th>Created</th>";
		echo "<th>Updated</th>";
		echo "<th>Action</th>";
		echo "</tr>";

		// output data post dari setiap baris hasil query
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['content'] . "</td>";
			echo "<td>" . $row['author'] . "</td>";
			echo "<td>" . $row['created_at'] . "</td>";
			echo "<td>" . $row['updated_at'] . "</td>";
			echo "<td><a href='posts_edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='posts_delete.php?id=" . $row['id'] . "'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";
	} else {
		echo "Tidak ada data post yang ditemukan.";
	}

	// tutup koneksi
	mysqli_close($conn);
	?>

	<br>
	<a href="posts_create.php">Tambah Post Baru</a>
</body>
</html>
