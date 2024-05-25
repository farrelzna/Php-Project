<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
    .mid{
        display: flex;
        justify-content: center;
    }
    .judul{
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        margin-top: 50px;
    }
    h2{
        font-size: 40px;
    }
    p{
        font-size: 18px;
        
    }
    input[type="number"]{
        width: 430px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px ;
        transition: 0.5s;
        font-size: 15px;
    }
    input[type="number"]:hover{
        background-color: whitesmoke;
        border: 1px solid blue;
    }
    .masukan{
        margin-bottom: 5px;
    }
    .pember{
        margin-bottom: 5px;
    }
    .echo{
        color: red;
        font-style: italic;
    }
    button{
        width: 430px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px ;
        margin-top: 10px ;
        transition: 0.5s;
        color:#525CEB;
        background-color: #BFCFE7;
    }
    button:hover{
        border: 1px solid green;
        background-color: #525CEB ;
        color:#BFCFE7;
    }
    a:link, a:visited {
        
        background-color:#525CEB ;
        color: white;
        width: 430px;
        height: 30px;
        border-radius: 5px;
        /* padding: 14px 25px; */
        text-align: center;
        text-decoration: none;
        display: inline-block;
}

a:hover, a:active {
    background-color: red;
}
    
            
    </style>
</head>
<body>
    <div class="mid">

        <div class="tengah">
            <div class="judul">
                <h2>Bayar Sekarang</h2>
            </div>
            <div class="masukan">
                <p>Masukan Nominal Uang</p>
            </div>
            <form action="" method="post">
                <div class="bayar">
                    <input type="number" name="bayar" placeholder="Pastikan uang yang Anda masukan cukup" required>
                </div>
                <div class="pember">

                <h3>Uang yang harus Anda bayarkan adalah <?= "Rp." . number_format($total_belanja, 0, ',', '.'); ?></h3>
                </div>
                <?php 
                        if (isset($_POST['cash'])) {
                            $uang = $_POST['bayar'];
                            $bayar = $uang - $total_belanja;
                            if ($bayar < 0) {
                                echo "<p class='echo'>Uang anda kurang Rp.  $bayar !!</p>" ;
                            } else {
                                $_SESSION['kembalian'] = $bayar;
                                $_SESSION['bayar'] = $uang;
                                header("Location: bon.php");
                                exit();
                            }
                        }
                    ?>
                <div class="tbn_bayar">
                  
                    <button type="submit" name="cash">Bayar</button>
                </div>
                <a href="index.php">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>