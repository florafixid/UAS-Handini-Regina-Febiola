<div class="container-fluid px-4">
    <h1 class="mt-4">Buat Sales Order</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('salesorder/simpan') ?>" method="post">
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php foreach($pelanggan as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
                <h5>Detail Produk</h5>
                <div id="produk-list">
                    <div class="row mb-2 produk-item">
                        <div class="col-md-6">
                            <select name="produk_id[]" class="form-control" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach($produk as $p): ?>
                                <option value="<?= $p->id ?>"><?= $p->nama ?> - Rp <?= number_format($p->harga, 0, ',', '.') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" required>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger" onclick="hapusBaris(this)">Hapus</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary mb-3" onclick="tambahBaris()">+ Tambah Produk</button>

                <br>
                <a href="<?= site_url('salesorder') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Order</button>
            </form>
        </div>
    </div>
</div>

<script>
function tambahBaris() {
    var list = document.getElementById('produk-list');
    var item = list.querySelector('.produk-item').cloneNode(true);
    item.querySelectorAll('select, input').forEach(function(el){ el.value = ''; });
    list.appendChild(item);
}
function hapusBaris(btn) {
    var items = document.querySelectorAll('.produk-item');
    if(items.length > 1) btn.closest('.produk-item').remove();
}
</script>