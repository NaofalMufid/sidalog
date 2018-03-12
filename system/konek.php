<?php

// Menentukan value dari konfigurasi untuk konek ke server/database
$host = "localhost";
$user = "root";
$pass = "pikul";
$dbnm = "ponpes";

// variabel yg akan menjadi instance dari obje PDO
$kon = null;

try
{
    $kon = new PDO("mysql:host=$host;dbname=$dbnm","$user","$pass");
}
catch(PDOException $err)
{
    var_dump($err->getMessage());    
}
/**
 * Cek error 
 */
//$stmt = $kon->prepare("select * from santri");
//$stmt->execute();
//$result = $stmt->fetchAll(PDO::FETCH_NUM);
//$error = $stmt->errorInfo();
//var_dump($error);
//var_dump($kon);

/**
 * File : kulgram/system/konek.php
 */