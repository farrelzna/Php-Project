<?php
session_start();
if(!isset($_GET['key'])){
    header('Location: index.php');
    exit();
}

$key = $_GET['key'];

if(!isset($_SESSION['dataSiswa'][$key])){
    header('Location: index.php');
    exit();
}

$siswa = $_SESSION['dataSiswa'][$key];

if (isset($_POST['tmb'])) {
    if ($_POST["nama"] != "" && $_POST["nis"] != "" && $_POST['rayon'] != "") {
        $_SESSION['dataSiswa'][$key] = array(
            "nama" => $_POST['nama'],
            "nis" => $_POST['nis'],
            "rayon" => $_POST['rayon']
        );
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
            document.location.href = 'updata.php?key=$key';
        </script>
        ";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <div id="container">
            <h2>Masukan Data</h2>
            <form class="form" method="post">  
                <div id="form-control">
                    <input class="input input-alt" placeholder="Nama" required="    " type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($siswa['nama']); ?>">
                        <span class="input-border input-border-alt"></span>
                </div>
                    <br><br>
                <div id="form-control">
                    <input class="input input-alt" placeholder="Nis" required="" type="number" name="nis" id="nis" value="<?php echo htmlspecialchars($siswa['nis']); ?>">
                        <span class="input-border input-border-alt"></span>
                </div>
                    <br><br>
                <div id="form-control">
                    <input class="input input-alt" placeholder="Rayon" required="" type="text" name="rayon" id="rayon" value="<?php echo htmlspecialchars($siswa['rayon']); ?>">
                </div>
                    <br><br>
                <button type="submit" name="tmb">Submit</button>
            </form>
        </div>
    </body>
</html>