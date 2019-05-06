<?php
include_once"konek.php";
//menampung paramter aksi isinya apa
$aksi = $_GET['aksi'];

// membuat fungsi untuk mendapat id santri yang acak
function acakId($panjang)
{
    $karakter = "QWERTYUIOPASDFGHJKLZXCVBNM0987654321";
    $string = "";

    for($i=0;$i<$panjang;$i++)
    {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
    }
    return $string;
}

// menampung data yang dikirm baik itu dari form / link
$id_santri = acakId(5);
$id = $_POST['id'];
$nama = $_POST['nama'];
$sandi = password_hash($_POST['sandi'], PASSWORD_DEFAULT);
$tgl_lahir = $_POST['tgl_lahir'];
$tmp_lahir = $_POST['tmp_lahir'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];

// dilakukan pengecekan parameter apa isinya
// jika daftar berarti mendaftar/menambah data ke database
if($aksi == "daftar")
{
    $stmt = $kon->prepare("INSERT INTO santri(id_santri,nama,sandi,tgl_lahir,tmp_lahir,jenis_kelamin,alamat,kontak) 
                            VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$id_santri,PDO::PARAM_STR);
    $stmt->bindParam(2,$nama,PDO::PARAM_STR);
    $stmt->bindParam(3,$sandi,PDO::PARAM_STR);
    $stmt->bindParam(4,$tgl_lahir);
    $stmt->bindParam(5,$tmp_lahir,PDO::PARAM_STR);
    $stmt->bindParam(6,$jenkel,PDO::PARAM_STR);
    $stmt->bindParam(7,$alamat,PDO::PARAM_STR);
    $stmt->bindParam(8,$kontak,PDO::PARAM_STR);
    $stmt->execute();
    //$error = $stmt->errorInfo();
    //var_dump($error);
    //var_dump($stmt);
    header("location:../login.html  ");

// jika edit berarti merubah data ke database
}
elseif($aksi == "update")
{
    $stmt = $kon->prepare("UPDATE santri SET nama=?,
                                            sandi=?,
                                            tgl_lahir=?,
                                            tmp_lahir=?,
                                            jenis_kelamin=?,
                                            alamat=?,
                                            kontak=?
                                            WHERE id_santri=?");
    $stmt->bindParam(1,$nama,PDO::PARAM_STR);
    $stmt->bindParam(2,$sandi,PDO::PARAM_STR);
    $stmt->bindParam(3,$tgl_lahir);
    $stmt->bindParam(4,$tmp_lahir,PDO::PARAM_STR);
    $stmt->bindParam(5,$jenkel,PDO::PARAM_STR);
    $stmt->bindParam(6,$alamat,PDO::PARAM_STR);
    $stmt->bindParam(7,$kontak,PDO::PARAM_STR);
    $stmt->bindParam(8,$id,PDO::PARAM_STR);
    $stmt->execute();
    //$error = $stmt->errorInfo();
    //var_dump($error);
    //var_dump($stmt);
    header("location:../santri/santri.php  ");
}
elseif($aksi == "keluar") // mengecek jika ada paramter aksi yang berniali keluar
{   
    session_start(); 
    session_destroy(); // menghapus session yang ada
    header("location:../login.html  "); // redirect ke halaman login lagi
}


/**
 * File : kulgram/system/proses.php
 */