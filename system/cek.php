<?php
include_once("konek.php");

$nama = $_POST['nama'];
$sandi = $_POST['sandi'];

$stmt = $kon->prepare("SELECT id_santri,nama,sandi  FROM santri WHERE nama=:nama");
$stmt->bindParam(":nama",$nama);
$stmt->execute();
$ada = $stmt->fetch(PDO::FETCH_ASSOC);    

if($stmt->rowCount() == 1){
	if(password_verify($sandi, $ada['sandi'])){
session_start();
$_SESSION['id'] = $ada['id_santri'];
$_SESSION['uname'] = $ada['nama'];
header("location:../santri/santri.php  ");
	}else{
		header("location:../login.html");
	}
}else{
	header("location:../login.html");
}
/**
 * File : kulgram/system/cek.php
 */