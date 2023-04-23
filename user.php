<?php

// mengambil data user dari database
// contoh data yang diambil dari database
$users = [
  ["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com" ],
  ["id" => 2, "name" => "Jane Doe", "email" => "janedoe@gmail.com" ],
  
];

// menampilkan data user dalam bentuk tabel
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($users as $user) {
  echo "<tr>";
  echo "<td>" . $user["id"] . "</td>";
  echo "<td>" . $user["name"] . "</td>";
  echo "<td>" . $user["email"] . "</td>";
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
