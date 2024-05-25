<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="font.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Bootstrap Example</title>
    </head>
    <body>
        <div class="container2">
            <h2>Form Hitung Luas dan keliling Persegi Panjang Dengan PHP</h2>
            <form method="POST">
                <label for="panjang">Nilai Panjang :</label>
                    <input type="number" name="panjang" required placeholder="Masukan Nilai">
                <label for="lebar">nilai Lebar :</label>
                    <input type="number" name="lebar" id="lebar" required placeholder="Masukan Nilai">
                <input type="submit" value="Hitung luas dan keliling Persegi Panjang">
            </form><br>
            <div class="container3">
                <p style='font-size:20px;'>Hasil hitung luas dan keliling persegi panjang adalah sebagai berikut :</p>
                <p class='informasi'>Masukan nilai terlebih dahulu!</p>
                <?php
                    if (isset($_POST['panjang']) && isset($_POST['lebar'])) {
                        $panjang = $_POST['panjang'];
                        $lebar = $_POST['lebar'];
                    // menghitung luas persegi panjang
                    $luas_persegi_panjang = $panjang*$lebar;            
                    // menghitung keliling persegi panjang
                    $keliling_persegi_panjang = 2*($panjang+$lebar);
                    
                    echo "<p>Hasil hitung luas persegi panjang adalah sebagai berikut:<br />
                            Diketahui ;<br />
                            Panjang = $panjang<br />
                            Lebar   = $lebar<br /><br />
                            Maka luas persegi panjang sama dengan [ $panjang x $lebar ] = $luas_persegi_panjang<br />
                            Maka keliling persegi panjang sama dengan [ 2 x ($panjang + $lebar) ] = $keliling_persegi_panjang
                        ";
                    }
                ?>
            </div>
        </div>
    </body>
</html>