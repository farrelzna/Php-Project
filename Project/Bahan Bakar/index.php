<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Bahan Bakar</title>
</head>

<body>
    <div id="container">
        <div class="section1">
            <div class="wrap">
                <img class="Logo1" src="asset/shell.png" alt="Logo">
                <h2>Powered by <span>Shell</span></h2>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="tipe">Jenis Bahan Bakar</label>
                <select id="tipe" name="tipe">
                    <option value="Shell Super">Shell Super</option>
                    <option value="Shell V-Power">Shell V-Power</option>
                    <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                    <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                </select>
                <br><br>
                <label for="jumlah">Jumlah Liter</label>
                <input type="number" id="jumlah" name="jumlah" min="0" step="1">
                <br><br>
                <label for="Metode pembayaran">Metode Pembayaran</label>
                <select id="Metode Pembayaran" name="Metode Pembayaran">
                    <option value="Tunai">Cash</option>
                    <option value="Visa">Visa</option>
                    <option value="Mastercard">MasterCard</option>
                    <option value="AmericanExpress">AmericanExpress</option>
                    <option value="discoverNetworks">DiscoverNetworks</option>
                    <option value="Bri">Bri</option>
                    <option value="Bca">Bca</option>
                    <option value="Dana">Dana</option>
                    <option value="Gopay">Gopay</option>
                </select>
                <br><br><br>
                <div class="wrap2">
                    <button id="beli" name="beli" class="button-82-pushable" type="submit">
                        <span class="button-82-shadow"></span>
                        <span class="button-82-edge"></span>
                        <span class="button-82-front text">Beli
                    </button>
                    <button class="button-82-pushable" type="submit" onclick="refreshPage()">
                        <span class="button-82-shadow"></span>
                        <span class="button-82-edge"></span>
                        <span class="button-82-front text">Reload
                    </button>
                </div>
            </form>
            <br>
            <div class="Grup" namespace id="Grup">
                <h2 class="h2">Payment Method</h2>
                <br>
                <div class="Payment">
                    <img class="Logo2" id="move" src="https://www.mastercard.co.id/content/dam/public/mastercardcom/id/id/logos/mc-logo-52.svg" alt="Payment">
                    <img class="Logo2" id="move" src="https://www.discoverglobalnetwork.com/content/dam/discover/en_us/dgn/images/global/logos/discover-global-network-logo.svg  " alt="Payment">
                    <img class="Logo2" id="move" src="https://www.aexp-static.com/cdaas/one/statics/axp-static-assets/1.8.0/package/dist/img/logos/dls-logo-bluebox-solid.svg" alt="Payment">
                    <img class="Logo2" id="move" src="https://cdn.visa.com/v2/assets/images/logos/visa/blue/logo.png" alt="Payment" style="width:60px; height:30px;">
                </div>
                <br>
                <h2 class="h2">Our Social Media</h2>
                <br>
                <div class="Social">
                    <ul class="wrapper">
                        <a class="icon facebook">
                            <span class="span"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a class="icon youtube">
                            <span class="span"><i class="fab fa-youtube"></i></span>
                        </a>
                        <a class="icon tiktok">
                            <span class="span"><i class="fab fa-tiktok"></i></span>
                        </a>
                        <a href="https://www.instagram.com/shell_indonesia/" class="icon instagram">
                            <span class="span"><i class="fab fa-instagram"></i></span>
                        </a>
                    </ul>
                </div>
                <br>
                <div class="footer">
                    <h6>Designed by Farrelzna</h6>
                </div>
            </div>
        </div>
        <div class="section2">
            <?php
            require "logic.php";

            if (isset($_POST['beli'])) {
                $harga = $hargaBahanBakar[$tipe];
                $beli = new beli($tipe, $harga, $jumlah, $metodePembayaran);
                if ($jumlah < 0) {
                    echo
                    "<div class='card'>
                        <div class='header'>
                            <div class='image'><svg aria-hidden='true' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' fill='none'>
                                <path d='M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z' stroke-linejoin='round' stroke-linecap='round'></path>
                                    </svg>
                            </div>
                            <div class='content'>
                                <span class='title'>Value Tidak Valid</span>
                                <h6 class='message'>Apakah Kamu Sudah Mengisi Jumlah Liter Yang Diinginkan?</h6>
                            </div>
                        </div>
                    </div>";
                } else {
                    $beli->buktiTransaksi();
                }
            }
            ?>
        </div>
    </div>
    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
</body>

</html>