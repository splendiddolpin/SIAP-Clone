  <?php 
  include("../Login/lib/db_login.php")
  // mengambil data dari database
  $query = " UPDATE dosen SET nama = $_GET['nama'], NIP = $_GET['NIP'], email_undip = $_GET['email_undip'], email_pribadi = $_GET['email_pribadi'], no_telp = $_GET['no_telp'] WHERE NIP=$NIP;";
  $result = $koneksi->query( $query );
  ?>