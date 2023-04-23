<?php
include('templates/header.php');
?>

<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">BT Library</h1>
      <p class="lead text-muted">Unlimited Reading at Your Fingertips: Explore Our Vast Collection of eBooks Today!</p>
    </div>
  </div>
</section>

<?php include('templates/footer.php'); ?>


<?php

// mengambil data blog post dari database
// contoh data yang diambil dari database
$image_url = "https://www.google.com/search?q=judul+cover+buku&tbm=isch&ved=2ahUKEwj5ovrqybb-AhWSS3wKHSQLDuMQ2-cCegQIABAA&oq=judul+cover+buku&gs_lcp=CgNpbWcQAzIFCAAQgAQ6BAgjECc6BggAEAcQHjoICAAQCBAHEB5QvAxYpXNgyHZoAHAAeACAAdgBiAGWDJIBBTYuNi4xmAEAoAEBqgELZ3dzLXdpei1pbWfAAQE&sclient=img&ei=NTNAZLm0DJKX8QOklriYDg&bih=625&biw=1366#imgrc=tHNm77PMowvDWM/image.jpg";
$title = "Cover-Buku-Novel-Perahu-Kertas.webp";
$published_date = "2023-04-20 10:30:00";

// menampilkan gambar dari image_url
echo "<img src='" . $image_url . "' alt='Gambar Blog Post'>";

// menampilkan judul blog post dari title
echo "<h1>" . $title . "</h1>";

// menampilkan tanggal dan waktu publish blog post dari published_date
echo "<p>Published on " . date('d M Y H:i:s', strtotime($published_date)) . "</p>";

// menampilkan tombol untuk menampilkan blog post ke halaman viewer.php
echo "<a href='viewer.php?id=1'>View Post</a>";

?>
