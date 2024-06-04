
<?php
require "logic/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="asset/style.css">
        <title>Halaman Awal</title>
    </head>
        <div class="container">
            <div class="section1">
                <div class="card__content"></div>
                <h1>Sederhana Mart</h1>
                <h3>Input Value</h3>
                    <br>
                <form class="form" action="" method="post">
                    <div class="barang">
                        <input type="text" name="barang" placeholder="Masukan Barang" required>
                    </div>
                        <br><br>
                    <div class="harga">
                        <input type="number" name="harga" placeholder="Harga" required>
                    </div>
                        <br><br>
                    <div class="jumlah">
                        <input type="number" name="jumlah" placeholder="Jumlah" required>
                    </div>
                        <br><br>
                    <div class="btn_tambah">
                        <button type="submit" name="tambah">Add</button>
                    </div>
                    <div class="footer">
                        <h6>Designed by Farrelzna</h6>
                    </div>
                </form>
            </div>
            <div class="section2">
                <table border="1" cellpadding="6" cellspacing="6">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                    <?php
                    $i = 1;
                    $total_belanja = 0;
                    $item_exists = false;
                    foreach ($_SESSION['pembelajaan'] as $belan => $b) :
                        $total_belanja += $b['harga'] * $b['jumlah'];
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= htmlspecialchars($b['barang']) ?></td>
                        <td><?= "Rp." . number_format($b['harga'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($b['jumlah']) ?></td>
                        <td><?= number_format($b['harga'] * $b['jumlah'], 0, ',', '.') ?></td>
                        <td cellpadding="5">
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="hapus_key" value="<?= $belan ?>">
                                <button type="submit" name="hapus">Remove</button>
                            </form>    
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    <tr>
                        <td colspan="5"> Total Barang</td>
                        <td><?= count($_SESSION['pembelajaan']) ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">Total Belanja</td>
                        <td><?= "Rp." . number_format($total_belanja, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <form class="table-button" action="" method="post">
                                <button class="button" type="submit" name="bayar" method="post">Pay</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
