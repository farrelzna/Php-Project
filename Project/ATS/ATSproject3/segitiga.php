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
    </head>
    <body>
        <div class="container2">
            <h2>Form Hitung Luas dan keliling Segitiga Dengan PHP</h2>
            <form method="POST" >
                <label for="alas">Nilai Alas :</label>
                    <input type="number" name="alas" id="alas" required placeholder="Masukan Nilai"><br>
                <label for="tinggi">Nilai Tinggi :</label>
                    <input type="number" name="tinggi" id="tinggi" required placeholder="Masukan Nilai"><br>
                <input type="submit" value="Hitung Luas dan keliling Segitiga">
            </form><br>
            
            <div class="container3">
                <p style='font-size:20px;'>Hasil hitung luas dan keliling segitiga adalah sebagai berikut :</p>
                <p class='informasi'>Masukan nilai terlebih dahulu!</p>
                <?php
                    if(isset($_POST['alas']) && isset($_POST['tinggi'])){
                        $alas=$_POST['alas'];
                        $tinggi=$_POST['tinggi'];
                        
                        // menghitung luas segitiga
                        $luas_segitiga = 1/2 * $alas * $tinggi;
                        //mencari sisi c
                        $C = (pow($alas, 2)) + (pow($tinggi, 2));
                        $C = $hasilpangkat;
                        $hasilpangkat = round(sqrt($C));
                        //mencari keliling segitiga
                        $keliling_segitiga = $hasilpangkat + $alas + $tinggi;
                        
                        
                        echo "<p>
                        Diketahui;<br />
                        Alas Segitiga = $alas<br />
                        Tinggi Segitiga = $tinggi<br /><br />
                        Maka luas segitiga sama dengan 1/2 ($alas x $tinggi) = $luas_segitiga<br />
                        Maka keliling segitiga sama dengan $alas + $tinggi + $hasilpangkat = $keliling_segitiga
                        </p>";
                    }   
                ?>
            </div>
        </div>
    </body>
</html>