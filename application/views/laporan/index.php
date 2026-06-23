<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan Penjualan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?= site_url('laporan') ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label>Filter Sales</label>
                        <select name="sales_id" class="form-control">
                            <option value="">-- Semua Sales --</option>
                            <?php foreach($sales as $s): ?>
                            <option value="<?= $s->id ?>" <?= $filter['sales_id']==$s->id?'selected':'' ?>><?= $s->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Filter Produk</label>
                        <select name="produk_id" class="form-control">
                            <option value="">-- Semua Produk --</option>
                            <?php foreach($produk as $p): ?>
                            <option value="<?= $p->id ?>" <?= $filter['produk_id']==$p->id?'selected':'' ?>><?= $p->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control" value="<?= $filter['dari'] ?>">
                    </div>
                    <div class="col-md-2">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control" value="<?= $filter['sampai'] ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary mr-1">Filter</button>
                        <a href="<?= site_url('laporan') ?>" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <a href="<?= site_url('laporan/cetak_pdf?'.http_build_query($filter)) ?>" target="_blank" class="btn btn-danger mb-3">Export PDF</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
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
                        <td>Rp <?= number_format($l->harga_satuan, 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($l->subtotal, 0, ',', '.') ?></td>
                        <td><?= $l->status ?></td>
                    </tr>
                    <?php $grandtotal += $l->subtotal; endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8" class="text-right">Grand Total</th>
                        <th colspan="2">Rp <?= number_format($grandtotal, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>