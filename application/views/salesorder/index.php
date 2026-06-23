<div class="container-fluid px-4">
    <h1 class="mt-4">Data Sales Order</h1>
    <?php if($this->session->userdata('role') != 'manager'): ?>
    <a href="<?= site_url('salesorder/tambah') ?>" class="btn btn-primary mb-3">Buat Order</a>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Pelanggan</th>
                        <th>Sales</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($orders as $o): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $o->kode_order ?></td>
                        <td><?= $o->nama_pelanggan ?></td>
                        <td><?= $o->nama_sales ?></td>
                        <td><?= $o->tanggal ?></td>
                        <td>Rp <?= number_format($o->total, 0, ',', '.') ?></td>
                        <td>
                            <span class="badge badge-<?= 
                                $o->status == 'draft' ? 'secondary' : 
                                ($o->status == 'dikirim' ? 'primary' : 
                                ($o->status == 'selesai' ? 'success' : 'danger')) ?>">
                                <?= $o->status ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= site_url('salesorder/detail/'.$o->id) ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if($this->session->userdata('role') == 'admin'): ?>
                            <form action="<?= site_url('salesorder/ubah_status/'.$o->id) ?>" method="post" style="display:inline">
                                <select name="status" class="form-control-sm" onchange="this.form.submit()">
                                    <option value="draft" <?= $o->status=='draft'?'selected':'' ?>>Draft</option>
                                    <option value="dikirim" <?= $o->status=='dikirim'?'selected':'' ?>>Dikirim</option>
                                    <option value="selesai" <?= $o->status=='selesai'?'selected':'' ?>>Selesai</option>
                                    <option value="dibatalkan" <?= $o->status=='dibatalkan'?'selected':'' ?>>Dibatalkan</option>
                                </select>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>