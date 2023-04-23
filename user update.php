<?php
include('templates/header.php');
include_once('db/authors_db.php');

// Kita tambahkan null coalescing operator untuk menghindari error
$author_id = $_GET['author_id'] ?? '';
$author = AuthorsDB::get($author_id);
?>

<?php if (isset($author)) : ?>

    <section class="py-1 text-center container">
        <div class="row">
            <h2 class="col-lg-6 col-md-8 mt-2 mx-auto">
                Edit Authors
            </h2>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <form action="" method="POST">
                <input type="hidden" name="author_id" 
                value="<?= $author->getAuthorId() ?>" />

                <div class="mb-3">
                    <label for="inp_author_name" class="form-label">Author Name</label>
                    <input type="text" class="form-control" id="inp_author_name" 
                    name="author_name" value="<?= $author->getAuthorName() ?>" />
                </div>
                <div class="mb-3">
                    <label for="inp_dob">Start</label>
                    <input type="date" class="form-control" id="inp_dob" 
                    name="date_of_birth" value="<?= $author->getDateOfBirth() ?>" />
                </div>
                <div class="mb-3">
                    <label for="inp_location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="inp_location" 
                    name="location" value="<?= $author->getLocation() ?>" />
                </div>
                <button type="submit" class="btn btn-primary">Update Author</button>
            </form>
        </div>
    </div>

<?php else : ?>

    <div class="container">
        <div class="row">
            <h2>Author not found</h2>
        </div>
    </div>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
</head>
<body>
	<h1>Update User</h1>
	<?php
	// ambil id user yang akan diupdate dari URL
	$id = $_GET['id'];

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

		// query untuk memperbarui data di database
		$sql = "UPDATE users SET nama='$nama', email='$email', password='$password', alamat='$alamat' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
			echo "Data user berhasil diperbarui";
		} else {
			echo "Terjadi kesalahan: " . mysqli_error($conn);
		}

		// tutup koneksi
		mysqli_close($conn);
	} else {
		// ambil data user dari database
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

		// query untuk mengambil data user dari database
		$sql = "SELECT * FROM users WHERE id=$id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// ambil data user dan masukkan ke dalam form
			$row = mysqli_fetch_assoc($result);
			$nama = $row['nama'];
			$email = $row['email'];
			$password = $row['password'];
			$alamat = $row['alamat'];
		} else {
			echo "Data user tidak ditemukan";
			exit();
		}

		// tutup koneksi
		mysqli_close($conn);
	}
	?>

	<form method="user">
		<label for="nama">Nama:</label><br>
		<input type="text" name="nama" value="<?php echo $nama; ?>" required><br>

		<label for="email">Email:</label><br>
		<input type="email" name="email" value="<?php echo $email; ?>" required><br>

		<label for="password">Password:</label><br>
		<input type="password" name="password" value="<?php echo $password; ?>" required><br>

		<label for="alamat">Alamat:</label><br>
		<textarea name="alamat"><?php echo $alamat; ?></textarea
