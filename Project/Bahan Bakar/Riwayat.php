<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Riwayat</title>
</head>

<body>
    <div class="container">
        <div class="section2">
            <h1>Riwayat Belanja</h1>
            <?php
                $logic->JenisYangDipilih = $_POST['jenis'];
                $logic->TotalPerLiter = $_POST['liter'];
                $logic->totalharga();
                $logic->cetakbukti();
            
            ?>
        </div>
    </div>
</body>

</html>