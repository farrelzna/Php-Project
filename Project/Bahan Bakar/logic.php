<?php
$currentDate = date('l, F j, Y');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    class BahanBakar
    {
        protected $tipe, $harga, $ppn, $jumlah;

        public function __construct($tipe, $harga, $jumlah)
        {
            $this->tipe = $tipe;
            $this->harga = $harga;
            $this->jumlah = $jumlah;
            $this->ppn = 10;
        }

        public function getTipe()
        {
            return $this->tipe;
        }

        public function getHarga()
        {
            return $this->harga;
        }

        public function getJumlah()
        {
            return $this->jumlah;
        }

        public function getPpn()
        {
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
            $date3 = date('dmy');
            echo "<p><strong>$date1</strong>Petugas</p>";
            echo "<p><strong>$date2</strong>Kasir</p>";
            echo "<p><strong>$date3" . "$this->jumlah</strong></p>";
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

}
