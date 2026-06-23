<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
        .text-right { text-align: right; }
    </style>
</head>
<body onload="window.print()">
    <h2>Laporan Penjualan</h2>
    <p>Dicetak pada: <?= date('d-m-Y H:i') ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Order</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Sales</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; $grandtotal = 0; foreach($laporan as $l): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $l->kode_order ?></td>
                <td><?= $l->tanggal ?></td>
                <td><?= $l->nama_pelanggan ?></td>
                <td><?= $l->nama_sales ?></td>
                <td><?= $l->nama_produk ?></td>
                <td><?= $l->jumlah ?></td>
                <td>Rp <?= number_format($l->subtotal, 0, ',', '.') ?></td>
                <td><?= $l->status ?></td>
            </tr>
            <?php $grandtotal += $l->subtotal; endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7" class="text-right">Grand Total</th>
                <th colspan="2">Rp <?= number_format($grandtotal, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>