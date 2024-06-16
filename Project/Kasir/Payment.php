<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
}

if (isset($_POST['cash'])) {
    $uang = $_POST['bayar'];
    $bayar = $uang - $total_belanja;
    if ($bayar < 0) {
        echo
        '<div class="alert alert-danger position-absolute" role="alert" style="bottom: 0; right: 0;  margin-right: 10px;">
                UANG KAMU KURANG!
            </div>';
    } else {
        $_SESSION['kembalian'] = $bayar;
        $_SESSION['bayar'] = $uang;
        header("Location: Struke.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pembayaran</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400");

        body,
        html {
            font-family: "Source Sans Pro", sans-serif;
            background: #c82444;
            padding: 0;
            margin: 0;
        }

        .contain {
            margin: 50px auto;
            background-color: #2c3338;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            padding: 20px;
            border-radius: 8px;
            display: flex;
        }

        .container {
            margin: 0 auto;
            text-align: center;
            background: white;
            border-radius: 9px;
            border-top: 10px solid white;
            border-bottom: 10px solid white;
            width: 400px;
            height: 500px;
        }

        .box h4 {
            font-family: "Source Sans Pro", sans-serif;
            color: #3b4148;
            font-size: 20px;
            margin-top: 20px;
        }

        .box h4 span {
            color: #dfdeee;
            font-weight: lighter;
        }

        .box h5 {
            font-family: "Source Sans Pro", sans-serif;
            font-size: 13px;
            color: #696c72;
            letter-spacing: 1.5px;
            margin-top: -5px;
            margin-bottom: 45px;
        }

        .box input[type="number"] {
            display: block;
            margin: 20px auto;
            background-color: #dbdbdb;
            border: 0;
            border-radius: 5px;
            padding: 14px 10px;
            width: 320px;
            outline: 0;
            color: #a9a9a9;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
        }

        ::-webkit-input-placeholder {
            color: #565f79;
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            border: 1px solid #79a6fe;
        }

        .btn1 {
            border: 0;
            background: #c82444;
            color: #dfdeee;
            border-radius: 7px;
            width: 340px;
            height: 49px;
            font-size: 16px;
            transition: 0.3s;
            cursor: pointer;
            margin-top: 15%;
        }

        .btn1:hover {
            background: #a1a4ad;
        }

        a {
            color: #a1a4ad;
            text-decoration: none;
        }

        .forgetpass {
            position: relative;
            float: right;
            right: 28px;
            display: flex;
            align-items: center;
        }

        .label-text {
            font-size: 16px;
            color: #a1a4ad;
        }

        .checkbox-wrapper input[type="checkbox"] {
            display: none;
        }

        .checkbox-wrapper .terms-label {
            cursor: pointer;
            display: flex;
            align-items: center;
            position: absolute;
            margin-left: 25px;
        }

        .checkbox-wrapper .terms-label .label-text {
            margin-left: 10px;
        }

        .checkbox-wrapper .checkbox-svg {
            width: 30px;
            height: 30px;
        }

        .checkbox-wrapper .checkbox-box {
            fill: rgba(207, 205, 205, 0.425);
            stroke: #8c00ff;
            stroke-dasharray: 800;
            stroke-dashoffset: 800;
            transition: stroke-dashoffset 0.6s ease-in;
        }

        .checkbox-wrapper .checkbox-tick {
            stroke: #8c00ff;
            stroke-dasharray: 172;
            stroke-dashoffset: 172;
            transition: stroke-dashoffset 0.6s ease-in;
        }

        .checkbox-wrapper input[type="checkbox"]:checked+.terms-label .checkbox-box,
        .checkbox-wrapper input[type="checkbox"]:checked+.terms-label .checkbox-tick {
            stroke-dashoffset: 0;
        }
    </style>
</head>

<body style="display: flex; justify-content:center ; align-items: center;height: 100vh;overflow: hidden;">
    <div class="contain">
        <div class="container">
            <form name="form1" class="box" method="post">
                <h4>Pembayaran</span></h4>
                <br>
                <h5>Masukan Nominal Uang</h5>
                <input type="number" name="bayar" placeholder="Pastikan uang yang Anda masukan cukup" autocomplete="off" required />
                <br>
                <h5>Uang yang harus Anda bayarkan adalah :<br><br><?= "Rp." . number_format($total_belanja, 0, ',', '.'); ?></h5>
                <button type="submit" value="Sign in" class="btn1" name="cash">Bayar</button>
                <br><br>
                <div class="checkbox-wrapper">
                    <input id="terms-checkbox-37" name="checkbox" type="checkbox">
                    <label class="terms-label" for="terms-checkbox-37">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200" class="checkbox-svg">
                            <mask fill="white" id="path-1-inside-1_476_5-37">
                                <rect height="200" width="200"></rect>
                            </mask>
                            <rect mask="url(#path-1-inside-1_476_5-37)" stroke-width="40" class="checkbox-box" height="200" width="200"></rect>
                            <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick"></path>
                        </svg>
                        <span class="label-text">Kirim Di Tempat</span>
                    </label>
                </div>
                <a class="forgetpass" href="index.php">Halaman awal</a>
            </form>
        </div>
    </div>
</body>

</html>