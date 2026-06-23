<div class="container-fluid px-4">
    <h1 class="mt-4">Data Users</h1>
    <a href="<?= site_url('users/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($users as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->id ?></td>
                        <td><?= $u->nama ?></td>
                        <td><?= $u->username ?></td>
                        <td><span class="badge badge-info"><?= $u->role ?></span></td>
                        <td>
                            <a href="<?= site_url('users/edit/'.$u->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('users/hapus/'.$u->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>