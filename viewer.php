<?php

// mengambil data blog post dari database
// contoh data yang diambil dari database
$title = "Perahu Kertas";
$author = "Dewi Lestari";
$published_date = "2009-03-16 00:00:00";
$content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae commodo lorem. Duis aliquam, sapien vel faucibus suscipit, massa massa aliquam libero, vitae commodo ex risus eu risus. Ut tristique nunc nec sapien lacinia, vitae feugiat felis dignissim. Donec porttitor massa id commodo iaculis. Morbi luctus orci vel elit vehicula consequat. Maecenas lobortis mauris dolor, ac aliquet justo blandit eget. Maecenas dictum, lorem sed eleifend fermentum, enim nibh eleifend libero, in imperdiet ex diam id lacus. Aenean malesuada ligula nec nunc rutrum, eu venenatis libero luctus. Sed malesuada augue vel dapibus convallis. Pellentesque ut enim euismod, laoreet nibh quis, dictum felis. Sed euismod euismod sagittis.";

// menampilkan judul blog post
echo "<h1>" . $title . "</h1>";

// menampilkan author dan tanggal publish
echo "<p>By " . $author . " on " . date('d M Y', strtotime($published_date)) . "</p>";

// menampilkan isi konten blog post
echo "<p>" . $content . "</p>";

?>
