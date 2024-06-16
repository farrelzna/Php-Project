<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $belan => $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
    $bayar = $_SESSION['bayar'] - $total_belanja;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struke</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400");

        body,
        html {
            font-family: "Source Sans Pro", sans-serif;
            background: #c82333;
            padding: 0;
            margin: 0;
            color: #9392a0;
        }

        .contain {
            width: 50%;
            margin: 50px auto;
            background-color: #2c3338;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            padding: 20px;
            border-radius: 8px;
            display: flex;
        }

        .container {
            margin-left: 10px;
        }

        .terminal_toolbar {
            display: flex;
            height: 30px;
            align-items: center;
            padding: 0 8px;
            box-sizing: border-box;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            background: #212121;
            justify-content: space-between;
        }

        .butt {
            display: flex;
            align-items: center;
        }

        .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin-right: 5px;
            font-size: 8px;
            height: 12px;
            width: 12px;
            box-sizing: border-box;
            border: none;
            border-radius: 100%;
            background: linear-gradient(#7d7871 0%, #595953 100%);
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2);
            box-shadow: 0px 0px 1px 0px #41403A, 0px 1px 1px 0px #474642;
        }

        .btn-color {
            background: #ee411a;
        }

        .btn:hover {
            cursor: pointer;
        }

        .btn:focus {
            outline: none;
        }

        .butt--exit {
            background: linear-gradient(#f37458 0%, #de4c12 100%);
        }

        .add_tab {
            border: 1px solid #fff;
            color: #fff;
            padding: 0 6px;
            border-radius: 4px 4px 0 0;
            border-bottom: none;
            cursor: pointer;
        }

        .user {
            color: #d5d0ce;
            margin-left: 6px;
            font-size: 14px;
            line-height: 15px;
        }

        .terminal_body {
            background: rgba(0, 0, 0, 0.6);
            height: calc(100% - 30px);
            padding-top: 2px;
            margin-top: -1px;
            font-size: 12px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 20px;
        }

        .terminal_promt span {
            margin-left: 4px;
        }

        .terminal_user {
            color: #1eff8e;
        }

        .terminal_location {
            color: #4878c0;
        }

        .terminal_bling {
            color: #dddddd;
        }

        .terminal_cursor {
            display: block;
            height: 14px;
            width: 5px;
            margin-left: 10px;
            animation: curbl 1200ms linear infinite;
        }

        @keyframes curbl {

            0% {
                background: #ffffff;
            }

            49% {
                background: #ffffff;
            }

            60% {
                background: transparent;
            }

            99% {
                background: transparent;
            }

            100% {
                background: #ffffff;
            }
        }

        h4 {
            font-family: "Source Sans Pro", sans-serif;
            color: #9392a0;
            margin-top: 20px;
        }

        .section2 {
            display: flex;
        }

        .header {
            display: flex;
        }

        .Grup {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        a {
            color: #a1a4ad;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 25px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .forgetpass {
            float: right;
        }

        .card {
            width: 100%;
            padding: 30px;
            margin: 0 auto;
            background-color: #F8FBFE;
            border-radius: 8px;
            z-index: 1;
        }

        .tools {
            display: flex;
            align-items: center;
            padding: 9px;
        }

        .circle {
            padding: 0 4px;
        }

        .box {
            display: inline-block;
            align-items: center;
            width: 10px;
            height: 10px;
            padding: 1px;
            border-radius: 50%;
        }

        .red {
            background-color: #ff605c;
        }

        .yellow {
            background-color: #ffbd44;
        }

        .green {
            background-color: #00ca4e;
        }

        @media print {
            .contain {
                display: block;
                background-color: #fff;
                box-shadow: none;
            }

            .container {
                background-color: none;
            }

            a {
                display: none;
            }

            table {
                width: 50%;
                border-collapse: collapse;
            }

            .Grup {
                margin-top: 0;
            }

            .terminal_toolbar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="contain">
        <div class="card">
            <div class="tools">
                <div class="circle">
                    <span class="red box"></span>
                </div>
                <div class="circle">
                    <span class="yellow box"></span>
                </div>
                <div class="circle">
                    <span class="green box"></span>
                </div>
            </div>
            <div class="card__content">
            </div>
            <div class="section1">
                <h4>Bukti Pembayaran</h4>
                <div class="rand">
                    <h4>No.Transaksi #<br><?= uniqid() ?></h4>
                </div>
                <div class="Date">
                    <h4>Date #<br><?= date("l jS \of F Y") ?></h4>
                </div>
            </div>
            <div class="section2">
                <table border="1" cellpadding="6" cellspacing="6">
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <?php
                    $i = 1;
                    $total_belanja = 0;
                    $item_exists = false;
                    foreach ($_SESSION['pembelajaan'] as $belan => $b) :
                        $total_belanja += $b['harga'] * $b['jumlah'];
                    ?>
                        <tr>
                            <td><?= $b['barang'] ?></td>
                            <td><?= $b['jumlah'] ?></td>
                            <td><?= $b['harga'] ?></td>
                        </tr>
                        <br>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <br>
        <div class="section3">
            <div class="container">
                <div class="terminal_toolbar">
                    <div class="butt">
                        <button class="btn btn-color"></button>
                        <button class="btn"></button>
                        <button class="btn"></button>
                    </div>
                    <p class="user">Sederhana Mart: ~</p>
                    <div class="add_tab">
                    </div>
                </div>
                <div class="terminal_body">
                    <div class="terminal_promt">
                        <span class="terminal_user">Output@admin:</span>
                        <span class="terminal_location">~</span>
                        <span class="terminal_bling"></span>
                        <div class="Grup">
                            <p>Total</p>
                            <div class="uang">
                                <p>Rp. <?= number_format($total_belanja, 0, ',', '.') ?></p>
                            </div>
                        </div>
                        <div class="Grup">
                            <p>Uang Yang Dibayar</p>
                            <div class="uang">
                                <p> Rp. <?= $_SESSION['bayar'] ?></p>
                            </div>
                        </div>
                        <div class="Grup">
                            <p>Kembalian</p>
                            <div class="uang">
                                <p> Rp. <?= $bayar ?></p>
                            </div>
                        </div>
                        <br>
                        <div class="Grup">
                            <p>Terima Kasih Sudah Mengunjungi Di Toko Kami</p>
                        </div>
                        <span class="terminal_cursor"></span>
                    </div>
                </div>
                <br>
                <a class="forgetpass" href="index.php" onclick="return confirm('Apakah kamu ingin kembali ke halaman utama?')">Halaman Utama</a>
                <a href="" onclick="window.print()">Print</a>
                <br>
            </div>
        </div>
    </div>
</body>

</html>