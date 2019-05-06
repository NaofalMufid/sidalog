<?php
include_once("../system/konek.php");
$stmt = $kon->prepare("SELECT * FROM santri ORDER BY nama");
$stmt->execute(); // melakukan eksekusi
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil Santri</title>
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
            <a class="navbar-brand" href="#">Ndopokbae</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="">Info</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Profile</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <div class="container">
        
        <div class="col-xs-12 col-sm-12 col-md-8">
            
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Profil Santri</div>
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($profil = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                            <tr>
                                <td><?=$profil['nama']?></td>
                                <td><?=$profil['tmp_lahir']?>, <?=$profil['tgl_lahir']?></td>
                                <td><?=$profil['jenis_kelamin']?></td>
                                <td><?=$profil['alamat']?></td>
                                <td><?=$profil['kontak']?></td>
                                <td>
                                    <a href="edit_santri.php?edit?&id=<?=$profil['id_santri']?>" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
            </div>
            
        </div>
        
    </div>
            
    </div>
<script src="asset/jss/bootstrap.min.js"></script>        
</body>
</html>