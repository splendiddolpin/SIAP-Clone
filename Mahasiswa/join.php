<?php
$data = mysqli_query($koneksi, "SELECT * FROM user
JOIN mahasiswa
ON mahasiswa.username = user.username
JOIN khs
ON khs.NIM = mahasiswa.NIM
JOIN pkl
ON pkl.NIM = khs.NIM
JOIN skripsi
ON skripsi.NIM = pkl.NIM; ");
?>
<?php
while($arr_data = mysqli_fetch_array($data)):
?>