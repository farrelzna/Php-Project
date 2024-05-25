<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rental Motor</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="container">
            <div class="section1">
                <div class="wrap">
                    <img src="https://ik.imagekit.io/tvlk/blog/2020/01/traveloka-godwit-1.png?tr=dpr-1.5,h-32,w-32" alt="Logo">
                    <h2 class="Traveloka">Traveloka</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" required>
                        <br><br>
                    <label for="waktu">Waktu / Hari :</label>
                    <input type="number" id="waktu" name="waktu" required>
                        <br><br>
                    <label for="tipemotor">Jenis Motor :</label>
                    <select id="tipemotor" name="tipe" required>
                        <option value="Motor Matic">Motor Matic</option>
                        <option value="Motor Gigi">Motor Gigi</option>
                        <option value="Motor Kopling">Motor Kopling</option>
                        <option value="Motor Sport">Motor Sport</option>
                    </select>
                        <br><br><br>
                    <button class="button-82-pushable" type="submit">
                        <span class="button-82-shadow"></span>
                        <span class="button-82-edge"></span>
                        <span class="button-82-front text">Beli
                    </button>  
                </form>
            </div>
            <div class="section2">

                <?php
                    $currentDate = date('l, F j, Y');

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $motor_rental = new MotorRental($_POST['nama'], $_POST['waktu'], $_POST['tipe']);
                        $motor_rental->displayOutput();
                    }

                        class MotorRental {

                            private $nama, $waktu, $tipe, $diskon, $harga, $pajak;
                
                            public function __construct($nama, $waktu, $tipe) {
                                $this->nama = $nama;
                                $this->waktu = $waktu;
                                $this->tipe = $tipe;
                                $this->harga = 50000.00;
                                $this->diskon = 0;
                                $this->pajak = 5000;
                
                                if ($nama == 'WSSK') {
                                    $this->diskon = 0.05;
                                }
                            }
                
                            public function calculateTotal() {
                                $total = ($this->waktu * $this->harga) - (($this->waktu * $this->harga) * $this->diskon);
                                return $total + $this->pajak;
                            }
                
                            public function displayOutput() {

                                echo "<div class='bukti-transaksi'>";
                                echo "<h2>Traveloka-<span>AyoRental</span></h2>";
                                echo "<h5>Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146
                                </h5>";
                                    echo "<hr>";
                                $date1 = date('d-m-y');
                                $date2 = date('h-i-s');
                                echo "<p><strong>$date1</strong>Petugas</p>";
                                echo "<p><strong>$date2</strong>Kasir</p>";
                                echo "<p><strong>No 0-1</strong></p>";
                                    echo "<hr>";
                                echo "<p><strong>Nama :</strong> " . "<p>$this->nama</p>" . "</p>";
                                echo "<p><strong>Waktu / Hari :</strong> " . "<p>$this->waktu</p>" . "</p>";
                                echo "<p><strong>Jenis Motor :</strong> " . "<p>$this->tipe</p>" . "</p>";
                                    echo "<hr>";
                                echo "<p><strong>Total :</strong> Rp" . number_format($this->calculateTotal(), 2) . "</p>";
                                echo "<h3>Link Kritik dan Saran</h3>";
                                echo "<h6>https://www.traveloka.com/id-id/car-rental</h6>";
                                echo "<button onclick='window.print()' class='button-82-pushable'>
                                        <span class='button-82-shadow'></span>
                                        <span class='button-82-edge'></span>
                                        <span class='button-82-front text'>Cetak
                                    </button>";
                                    echo "<br><br>";
                                echo "</div>";
                            }
                            
                        }

                ?>
            </div>
        </div>
    </body>
</html>