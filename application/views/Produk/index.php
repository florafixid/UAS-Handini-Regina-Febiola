<div class="container-fluid px-4">
    <h1 class="mt-4">Data Produk</h1>
    <a href="<?= site_url('produk/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($produk as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->kode ?></td>
                        <td><?= $p->nama ?></td>
                        <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                        <td><?= $p->stok ?></td>
                        <td>
                            <a href="<?= site_url('produk/edit/'.$p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('produk/hapus/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>