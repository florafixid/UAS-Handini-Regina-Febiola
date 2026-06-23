<div class="container-fluid px-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Manager</h1>
        <span class="text-muted small">Selamat datang, <strong><?= $this->session->userdata('username') ?></strong> | <?= date('d F Y') ?></span>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Order</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_order ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="<?= site_url('laporan') ?>" class="text-primary small">Lihat Laporan →</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelanggan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <span class="text-success small">Total pelanggan terdaftar</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Order Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->where('status', 'selesai')->count_all_results('sales_order') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <span class="text-warning small">Order yang sudah selesai</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Order Dibatalkan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->where('status', 'dibatalkan')->count_all_results('sales_order') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <span class="text-danger small">Order yang dibatalkan</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Rekap Per Sales -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Penjualan Per Sales</h6>
                    <a href="<?= site_url('laporan') ?>" class="btn btn-sm btn-primary">Lihat Laporan Lengkap</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Sales</th>
                                <th>Total Order</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rekap = $this->db->select('users.nama, COUNT(sales_order.id) as total_order, SUM(sales_order.total) as total_penjualan')
                                ->from('sales_order')
                                ->join('users', 'users.id = sales_order.user_id')
                                ->group_by('sales_order.user_id')
                                ->get()->result();
                            foreach($rekap as $r): ?>
                            <tr>
                                <td><?= $r->nama ?></td>
                                <td><?= $r->total_order ?> order</td>
                                <td>Rp <?= number_format($r->total_penjualan, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>