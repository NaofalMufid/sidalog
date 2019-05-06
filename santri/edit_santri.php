<?php
include_once("../system/konek.php");
    $id = $_GET['id'];
    $stmt = $kon->prepare("SELECT * FROM santri WHERE id_santri=?");
    $stmt->bindParam(1,$id,PDO::PARAM_STR);
    $stmt->execute();
    $profil = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ngedit Santri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../asset/css/login.css" />
</head>
<body>
    <div class="container">

            <form class="form-signin" action="../system/proses.php?aksi=update" method="POST">
                <input type="hidden" name="id" value="<?=$profil['id_santri']?>">
                <h3 class="form-signin-heading">Form Ngedit Santri</h3>
                <label for="nama" class="sr-only">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?=$profil['nama']?>" required="" autofocus="">
                <br>

                <label for="sandi" class="sr-only">Password</label>
                <input type="password" name="sandi" class="form-control" value="<?=$profil['sandi']?>" required="">
                <br>
                
                <label for="tgl_lahir" class="sr-only">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="<?=$profil['tgl_lahir']?>" required="">
                <br>
                
                <label for="tmp_lahir" class="sr-only">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" class="form-control" value="<?=$profil['tmp_lahir']?>" required="">
                <br>
                
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="jenkel" value="L">Laki-laki
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                            <input type="radio" name="jenkel" value="P">Perempuan
                    </label>
                </div>
                <br>
                
                <label for="alamat" class="sr-only">Alamat</label>
                <textarea name="alamat" class="form-control" required=""><?=$profil['alamat']?></textarea>
                <br>

                <div class="input-group">
                    <label for="kontak" class="sr-only">Kontak</label>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i>62</span>
                    <input type="text" name="kontak" class="form-control" value="<?=$profil['kontak']?>" required="">
                </div>
                <br>
                
                <button class="btn btn-primary btn-block" type="submit">Update</button>
            </form>
        
    </div>
<script src="asset/jss/bootstrap.min.js"></script>
</body>
</html>