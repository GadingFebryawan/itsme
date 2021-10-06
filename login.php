<?php 
  $aksi = $_GET['aksi'];

  switch ($aksi){
      case 'login';
        login();
      break;
      case 'register';
        register();
      break;

      default:
         #code...
         break;
  }
  function login() 
  {
   // buka database   
    $bukaDb = mysqli_connect('localhost' , 'root' , '', 'phpcamp');

    // ambil data dari file json yang dikirim oleh flutter
    $json = file_get_contents('php://input');

    //  json_decode utk mengubah file json menjadi object/array
    $obj = json_decode($json,true);

    // buat variable untuk mnegambil username &password dari objek/array diatas
    $username = $obj['username'];
    $password = md5 ($obj['password']);

    // buat query untuk membuka table login
    $qLogin = "SELECT * FROM login WHERE((username = '$username') && (password = '$password'))";

    // buka table login
    $login = mysqli_query ( $bukaDb , $qLogin);
 
    // mysqli_num_rows => menghitung jumlah baris
    $rows = mysqli_num_rows($login);

    // mysqli_num_rows
    if ($rows > 0){
        echo json_encode('berhasil login');
    } else {
        echo json_encode('gagal masuk');
    }

}
function register() 
{
 // buka database   
  $bukaDb = mysqli_connect('localhost' , 'root' , '', 'phpcamp');

  // ambil data dari file json yang dikirim oleh flutter
  $json = file_get_contents('php://input');

  //  json_decode utk mengubah file json menjadi object/array
  $obj = json_decode($json,true);

  // buat variable untuk mnegambil username &password dari objek/array diatas
  $username = $obj['username'];
  $password = md5 ($obj['password']);

  //membuat query untuk registere
  $qregister = "INSERT INTO login VALUES ('$username', '$password')";

  //memasukan data registration ke database
  $register = mysqli_query($bukaDb,$qregister);
  
  //panggil perintah query
  if ($register) {
    echo json_encode('berhasil mendaftar');
  } else {
    echo json_encode('gagal mendaftar');
  }
  
}
?>