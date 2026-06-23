<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Sales Order</h1>
    <a href="<?= site_url('salesorder') ?>" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr><th width="150">Kode Order</th><td>: <?= $order->kode_order ?></td></tr>
                <tr><th>Pelanggan</th><td>: <?= $order->nama_pelanggan ?></td></tr>
                <tr><th>Sales</th><td>: <?= $order->nama_sales ?></td></tr>
                <tr><th>Tanggal</th><td>: <?= $order->tanggal ?></td></tr>
                <tr><th>Status</th><td>: <span class="badge badge-info"><?= $order->status ?></span></td></tr>
                <tr><th>Total</th><td>: <strong>Rp <?= number_format($order->total, 0, ',', '.') ?></strong></td></tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Detail Produk</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($detail as $d): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->nama_produk ?></td>
                        <td>Rp <?= number_format($d->harga_satuan, 0, ',', '.') ?></td>
                        <td><?= $d->jumlah ?></td>
                        <td>Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>Rp <?= number_format($order->total, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>