<?php
// memanggil file konek yang berisi instance objek PDO
include_once("konek.php");

// menampung data hasil dari form login ke variable
$nama = $_POST['nama'];
$sandi = $_POST['sandi'];

// membuat query dengan method PDO yang akan memfilter nama dan sandi yang cocok 
// dengan yag dikirmakan dari halaman login apakah sesuai
// dengan yang ada diatabase
$stmt = $kon->prepare("SELECT id_santri,nama,sandi  FROM santri WHERE nama=? AND sandi=?");
$stmt->bindParam(1,$nama,PDO::PARAM_STR); // berguna untuk menangani SQL Injection
$stmt->bindParam(2,$sandi,PDO::PARAM_STR);
$stmt->execute();
$ada = $stmt->fetch(PDO::FETCH_ASSOC);    
    
    //$error = $stmt->errorInfo();
    //var_dump($error);             //untuk uji apakah sudah sesuai dengan perintah yang diinginkan 
    //var_dump($ada);

if($stmt->rowCount() == 1) // bilamana ditemukan 1 data yang sama sesuai yg dikirim dari form login 
{
    session_start(); // muali session
    $_SESSION['id'] = $ada['id_santri']; // buatkan session dengan nama id, yg isinya id_santri
    $_SESSION['uname'] = $ada['nama']; // buatkan session dengan nama uname, yg isinya nama santri
    header("location:../santri/santri.php  "); // redirect ke halaman santri
}
else // jika data tidak cocok atau tidak ada maka kembali ke halaman login
{
    header("location:../login.html");
}
    
/**
 * File : kulgram/system/cek.php
 */