<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pelanggan</h1>
    <a href="<?= site_url('pelanggan/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($pelanggan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama ?></td>
                        <td><?= $p->alamat ?></td>
                        <td><?= $p->telepon ?></td>
                        <td>
                            <a href="<?= site_url('pelanggan/edit/'.$p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('pelanggan/hapus/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>