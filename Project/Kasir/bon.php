<?php
    session_start();
    $total_belanja = 0;
    foreach($_SESSION['pembelajaan'] as $belan => $b){
        $total_belanja += $b['harga'] * $b['jumlah'];
        $bayar = $_SESSION['bayar'] - $total_belanja;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .mid{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            
        }
        .midd{
            display: flex;
            justify-content: center;
        }
       
        h1{
            font-weight: 300;
        }
        .judul{
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        .random{
            margin-bottom: 40px;
        }
        .rand{
            margin-bottom: 10px;
        }
        .nama {
            display: flex;
            justify-content: space-between;
        }
        .total{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .oh{
            margin-left: 200px;
        }
        .ref{
            display: flex;
            justify-content: space-between;
        }
        a:link, a:visited {
            background-color: aqua;
        color: #525CEB;
        width: 230px;
        height: 30px;
        border-radius: 5px;
        /* padding: 14px 25px; */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        }

    </style>
</head>
<body>
    <div class="midd">
        <div class="mid">
            <div class="container">
                <div class="judul">
                    <h1>Bukti Pembayaran</h1>
                </div>
                <div class="random">
                    <div class="rand">

                        <h4>No.Transaksi#<?= rand() ?></h4> 
                    </div>
                    <div class="alon">
                        <h4>Bulan, Tanggal# <?= date("l jS \of F Y A") ?></h4>
                    </div>
                </div>
                <hr>
                <?php 
                    foreach($_SESSION['pembelajaan'] as $belan => $b) :
                        ?>
                <div class="nama">
                    <p><?= $b['barang'] ?></p>
                    <div class="harga">
                        <p><?= $b['harga'] ?></p>
                        <div class="jumlah">
                            <p><b> x<?= $b['jumlah'] ?></b</p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <hr>
                <div class="total">
                    <p>uang yang di bayarkan adalah </p>
                        <div class="uang">
                        <p>Rp. <?= $_SESSION['bayar'] ?></p>
                        </div>
                </div>
                <div class="total">
                    <p>total yang harga   </p>
                        <div class="uang">
                        <p>Rp. <?= number_format($total_belanja, 0, ',', '.') ?></p>
                        </div>
                </div>
                <div class="total">
                    <p>kembalian nya adalah </p>
                        <div class="uang">
                            <p>Rp. <?= $bayar?></p>
                        </div>
                </div>
                <div class="ref">
                        <p>Terrimakasih telah belanjan di toko <b>Makmur sejahtera</b></p>
                            <a href="index.php" <?php session_destroy() ?>>kembali</a>
                        
                </div>
            </div>
        </div>
    </div>
</body>
</html>