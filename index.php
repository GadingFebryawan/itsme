<?php 
   // buka database   
    $bukaDb = mysqli_connect('localhost' , 'u662152941_gadingdb' , 'Gading111', 'u662152941_data') or die("gagal");

    if ( isset($_POST['simpan']) ) {

      $nama = $_POST['pembeli'];
      $barang = $_POST['barang'];
      
      $qInsert = "INSERT INTO konsumen (nama, produk) VALUES ('$nama', '$barang' )";
      $insert = mysqli_query($bukaDb, $qInsert);

    } elseif ( isset($_DEL['hapus']) ) {
      $id = $_DEL['delitem'];
      $qDrop = "DELETE FROM konsumen WHERE id_pembeli = $id ";
      $drop = mysqli_query($bukaDb, $qDrop,);
    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Konsumen</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha512-rO2SXEKBSICa/AfyhEK5ZqWFCOok1rcgPYfGOqtX35OyiraBg6Xa4NnBJwXgpIRoXeWjcAmcQniMhp22htDc6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="index.php" method="post">
          <label > Masukan Data Pembeli : </label>
        <input type="text" name="pembeli" class="form-control" placeholder="Masukan Nama Pembeli">
        <label > Masukan Nama Barang : </label>
        <input type="text" name="barang" class="form-control" placeholder="Masukan Nama Barang">
        <br>
        <input type="submit" value="Submit" name="simpan" class="btn btn-success">
        </form>
        <br>  
        <form action="index.php" method="delete">
          <label > Masukan Data yang Ingin Dihapus : </label>
          <input type="text" name="delitem" class="form-control" placeholder="Masukan ID Barang">
          <br>
          <input type="submit" value="Delete" name="hapus" class="btn btn-danger">
        </form>      
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nama Pembeli</td>
              <td>Nama Barang</td>
            </tr>
          </thead>
          <tbody>
              <?php
                $qBuka = "SELECT * FROM konsumen";
                $buka = mysqli_query($bukaDb, $qBuka);

                while ( $row = mysqli_fetch_assoc($buka) ) {
              ?>

              <tr>
                <td><?php echo $row['id_pembeli'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['produk'] ?></td>
              </tr>

              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>