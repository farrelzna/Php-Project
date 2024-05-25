<?php
session_start();

if(isset($_POST['hapus'])){
    if(isset($_POST['hapus_key'])){
        $key = $_POST['hapus_key']; // Mengambil kunci dari form
        unset($_SESSION['dataSiswa'][$key]); // Menghapus data sesuai kunci
        header('Location: ' . $_SERVER['PHP_SELF']); // Redirect kembali ke halaman ini setelah penghapusan
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <div id="container"></div>
            <div id="section1">
                <h2>Masukan Data</h2>
                    <hr>
                <form action="" method="post">  
                    <div class="nama" id="form-control">
                        <input class="input input-alt" placeholder="Nama" required="" type="text" name="nama" id="nama">
                            <span class="input-border input-border-alt"></span>
                    </div>
                        <br><br>
                    <div class="nis" id="form-control">
                        <input class="input input-alt" placeholder="Nis" required="" type="number" name="nis" id="nis">
                            <span class="input-border input-border-alt"></span>
                    </div>
                        <br><br>
                    <div class="rayon" id="form-control">
                        <input class="input input-alt" placeholder="Rayon" required="" type="text" name="rayon" id="rayon">
                    </div>
                        <br><br>
                    <button type="submit" name="tmb">Submit</button>
                </form>
            </div>
                <br><br>
            <div id="section2">
                <h2>Daftar Siswa</h2>
                    <hr>
                <div class="siswa-list">
                    
                    <?php
                    
                        if(!isset($_SESSION['dataSiswa'])){
                            $_SESSION['dataSiswa'] = array();
                        }

                        if(isset($_POST['tmb'])){
                            if($_POST["nama"] == "" || $_POST["nis"] == "" || $_POST['rayon'] == ""){
                                echo "Data kosong";
                            }else{
                                $siswa = array(
                                    "nama" => $_POST['nama'],
                                    "nis" => $_POST['nis'],
                                    "rayon" => $_POST['rayon']
                                );
                                array_push($_SESSION['dataSiswa'], $siswa);
                            }
                        }
                                    
                    ?>
                    <?php if (!empty($_SESSION['dataSiswa'])): ?>
                    <?php foreach ($_SESSION['dataSiswa'] as $key => $value): ?>
                        <div class="section">
                            <p><?php echo htmlspecialchars($value['nama']); ?> - <?php echo htmlspecialchars($value['nis']); ?> - <?php echo htmlspecialchars($value['rayon']); ?></p>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="hapus_key" value="<?php echo $key; ?>">
                                <button class="button2" type="submit" name="hapus">Hapus</button>
                            </form>
                            <form method="get" action="updata.php" style="display:inline;">
                                <input type="hidden" name="key" value="<?php echo $key; ?>">
                                <button class="button2" type="submit" class="ubah-button">Ubah</button>
                            </form>
                        </div>
                            <br>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p>Tidak ada data siswa.</p>
                    <?php endif;?>

            </div>
        </div>
    </body>
</html>