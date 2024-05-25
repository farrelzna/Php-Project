<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencari Luas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="container bg-body rounded-2" style="max-width:600px; height: auto;" action="" method="post">
        <div class="row">
            <p class="fs-5 fw-bold mb-3 mt-3">Menghitung Luas dan Keliling Segitiga</p>
            <div class="col">
                <label class="form-label fw-semibold" for="alas">Nilai Alas</label>
                <input type="number" class="form-control" name="alas" id="alas" placeholder="Alas">
            </div>
            <div class="col">
                <label for="tinggi" class="form-label fw-medium">Nilai Tinggi</label>
                <input type="number" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-lg mb-3 mt-3" style="width: 300px; margin-left: 12px;" name="submit">Kirim</button>
            </div>
        </div>
    </form>
    <?php
    if (isset ($_POST['submit'])) {
        if ($_POST['alas'] == '' || $_POST['tinggi'] == '') {
            echo "<p class='container text-center fw-bold fs-5 bg-body rounded-2 mt-3' style='max-width:600px;'>MASUKAN NILAI !</p>";
        } else {
            //mencari luas segitiga
            $alas = $_POST['alas'];
            $tinggi = $_POST['tinggi'];
            $luas = 0.5 * $alas * $tinggi;

            //mencari keliling segitiga
            $C = (pow($alas, 2)) + (pow($tinggi, 2));
            $C = $hasilpangkat;
            $hasilpangkat = round(sqrt($C));
            $keliling_segitiga = $hasilpangkat + $alas + $tinggi;
            
            echo "<p class='container text-center fw-bold fs-5 bg-body rounded-2 mt-3' style='max-width:600px;'>Luas : 1/2 x $alas x $tinggi = $luas</p>";
            echo "<p class='container text-center fw-bold fs-5 bg-body rounded-2 mt-3' style='max-width:600px;'>Keliling : $hasilpangkat + $alas + $tinggi = $keliling_segitiga</p>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>