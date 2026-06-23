<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Pelanggan</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('pelanggan/update/'.$pelanggan->id) ?>" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $pelanggan->nama ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= $pelanggan->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $pelanggan->telepon ?>" required>
                </div>
                <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>