<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Produk</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('produk/simpan') ?>" method="post">
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input type="text" name="kode" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <a href="<?= site_url('produk') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>