<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <label for="tipe">Jenis Bahan Bakar</label>
                    <select id="tipe" name="tipe" required>
                        <option value="Shell Super">Shell Super</option>
                        <option value="Shell V-Power">Shell V-Power</option>
                        <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                        <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                    </select>   
                        <br><br>
                    <label for="jumlah">Jumlah Liter</label>
                    <input type="number" id="jumlah" name="jumlah" min="0" step="1" required>
                        <br><br>
                    <label for="metode pembayaran">Metode Pembayaran</label>
                    <select id="Metode Pembayaran" name="Metode Pembayaran" required>
                        <option value="Tunai">Cash</option>
                        <option value="Visa" >Visa</option>
                        <option value="Mastercard" >MasterCard</option>
                        <option value="AmericanExpress" >AmericanExpress</option>
                        <option value="discoverNetworks" >DiscoverNetworks</option>
                        <option value="Bri" >Bri</option>
                        <option value="Bca" >Bca</option>
                        <option value="Dana" >Dana</option>
                        <option value="Gopay" >Gopay</option>
                    </select>
                        <br><br><br>
                    <div class="wrap2">
                        <button onclick="Hide()" id="kirim" class="button-82-pushable" type="submit">
                            <span class="button-82-shadow"></span>
                            <span class="button-82-edge"></span>
                            <span class="button-82-front text">Beli
                        </button>  
                        <button name="Riwayat" class="button-82-pushable" type="submit">
                            <span class="button-82-shadow"></span>
                            <span class="button-82-edge"></span>
                            <span class="button-82-front text">Riwayat
                        </button>  
                    </div>
                </form>  
                    <br>
                <div class="Grup" id="Grup" style="display:none;">
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
                    $currentDate = date('l, F j, Y');
                    

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        class BahanBakar {
                            protected $tipe, $harga, $ppn, $jumlah;
                            
                            public function __construct ($tipe, $harga, $jumlah) {
                                $this->tipe = $tipe;
                                $this->harga = $harga;
                                $this->jumlah = $jumlah;
                                $this->ppn = 10;
                            }
                            
                            public function getTipe() {
                                return $this->tipe;
                            }
                            
                            public function getHarga() {
                                return $this->harga;
                            }
                            
                            public function getJumlah() {
                                return $this->jumlah;
                            }
                            
                            public function getPpn() {
                                return $this->ppn;
                            }
                        }
                        
                        class Beli extends BahanBakar
                        {
                            private $metodePembayaran;

                            public function __construct($tipe, $harga, $jumlah, $metodePembayaran)
                            {
                                parent::__construct($tipe, $harga, $jumlah);
                                $this->metodePembayaran = $metodePembayaran;
                            }
                            
                            public function hitungTotal()
                            {
                                $total = $this->harga * $this->jumlah;
                                $total += $total * $this->ppn / 100;
                                
                                return $total;
                            }
                            
                            public function buktiTransaksi()
                            {
                                $total = $this->hitungTotal();
                                echo "<div class='bukti-transaksi'>";
                                echo "<h2>Powered By <span>Shell</span></h2>";
                                    echo "<h5>Puncak Rd KP. PARUNG J No.10, Bendungan, Ciawi, Bogor Regency, West Java 16720l</h5>";
                                        echo "<hr>";
                                    $date1 = date('d-m-y');
                                    $date2 = date('h-i-s');
                                    echo "<p><strong>$date1</strong>Petugas</p>";
                                    echo "<p><strong>$date2</strong>Kasir</p>";
                                    echo "<p><strong>No 0-1</strong></p>";
                                        echo "<hr>";
                                    echo "<p><strong>Jenis Bahan Bakar :</strong> " . "<p>$this->tipe</p>" . "</p>";
                                    echo "<p><strong>Jumlah / Liter :</strong> " . "<p>$this->jumlah L</p>";
                                    echo "<p><strong>Metode Pembayaran :</strong> " . "<p>$this->metodePembayaran</p>" . "</p>";
                                        echo "<hr>";
                                    echo "<p><strong>Total :</strong> Rp " . number_format($total, 2, ',', '.') . "</p>";
                                        echo "<br><br>";
                                    echo "<h3>Link Kritik dan Saran</h3>";
                                    echo "<h6>https://www.shell.com/who-we-are/contact-us.html</h6>";
                                    echo "<br>";
                                    echo "<button onclick='window.print()' class='button-82-pushable'>
                                            <span class='button-82-shadow'></span>
                                            <span class='button-82-edge'></span>
                                            <span class='button-82-front text'>Cetak
                                        </button>";
                                    echo "<br><br>";
                                echo "</div>";
                            }
                        }

                        $hargaBahanBakar = 
                        [
                            "Shell Super" => 15420.00,
                            "Shell V-Power" => 16130.00,
                            "Shell V-Power Diesel" => 18310.00,
                            "Shell V-Power Nitro" => 16510.00,
                        ];
                        
                        $tipe = $_POST["tipe"];
                        $jumlah = $_POST["jumlah"];
                        $metodePembayaran = $_POST["Metode_Pembayaran"];
                        
                        if (array_key_exists($tipe, $hargaBahanBakar)) {
                            $harga = $hargaBahanBakar[$tipe];
                            $beli = new Beli($tipe, $harga, $jumlah, $metodePembayaran);
                            $beli->buktiTransaksi();
                        } else {
                            echo "<p style='text-align: center;'>Jenis bahan bakar tidak valid.</p>";
                        }
                    }
                ?>
            </div>
        </div>
        <script src="Grup.js"></script>
    </body>
</html>