<?php
session_start();
include_once("../system/konek.php");
// cek apakah sudah benar-benar login
if(empty($_SESSION['uname'])) // cek apakah yang mengakses sudah login
{
    header("location:login.html");
}

// mendapatkan data santri yang login berdasarkan id_santri == id session
$id = $_SESSION['id'];
$stmt = $kon->prepare("SELECT * FROM santri WHERE id_santri=?");
$stmt->bindParam(1,$id,PDO::PARAM_STR); // mencegah SQL Injection
$stmt->execute(); // melakukan eksekusi
$profil = $stmt->fetch(PDO::FETCH_ASSOC); // membuat array yang bisa dipanggil dengan nama colom
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil <?=$profil['nama']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../asset/css/bootstrap.min.css" />
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?=$profil['nama']?></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="">Info</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Profile</a></li>
                <li><a href="../system/proses.php?aksi=keluar">Keluar</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <div class="container">
        
        <div class="col-xs-12 col-sm-4 col-md-6">
            
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Profil Santri</div>
                    <div class="panel-body">
                        <p>Sekilas profil santri</p>
                    </div>
                    
                    <!-- Table -->
                    <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?=$profil['nama']?></td>
                            </tr>    
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?=$profil['tgl_lahir']?></td>
                            </tr>    
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?=$profil['tmp_lahir']?></td>
                            </tr>    
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?=$profil['jenis_kelamin']?></td>
                            </tr>    
                            <tr>
                                <th>Alamat</th>
                                <td><?=$profil['alamat']?></td>
                            </tr>    
                            <tr>
                                <th>Kontak</th>
                                <td><?=$profil['kontak']?></td>
                            </tr>    
                            <tr colspan="2">
                                <td>
                                    <a href="edit_santri.php?edit?&id=<?=$_SESSION['id']?>" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                    </table>
            </div>
            
        </div>
        
    </div>
            
    </div>
<script src="asset/jss/bootstrap.min.js"></script>        
</body>
</html>