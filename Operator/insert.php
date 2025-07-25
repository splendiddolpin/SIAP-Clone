<html>
  <body>
    <?php


      $conn = mysqli_connect('localhost','root','','kel10ppl');

      if($conn === false){
        die("ERROR".mysqli_connect_error());
      }

      $nim = $_REQUEST['nim'];
      $role = $_REQUEST['role'];

      $check="SELECT username FROM user";

      // if($check = $nim){
      //   echo "<script>window.location.href = 'data_mahasiswa.php'
      //         alert('Data sudah ada di database!')</script>";
      // }else{
        $sql="INSERT INTO user VALUES('$nim','$nim','$role')";

        if(mysqli_query($conn, $sql)){
         echo "<script>window.location.href = 'data_mahasiswa.php'; 
         alert('Data sudah tersimpan di database!');</script>";
        }else{
          echo"ERROR".mysqli_error($conn);
        } 
      // }  
      mysqli_close($conn);

 
    ?>
  </body>
</html>