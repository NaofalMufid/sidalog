<?php

// Menentukan value dari konfigurasi untuk konek ke server/database
$host = "ndopokserver.database.windows.net";
$user = "biyunge";
$pass = "bapake2019-";
$dbnm = "gojeh";

// variabel yg akan menjadi instance dari obje PDO
$kon = null;

try
{
    $kon = new PDO("sqlsrv:server=$host;Database=$dbnm",$user,$pass);
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