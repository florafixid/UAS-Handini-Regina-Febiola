<div class="container-fluid px-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Sales</h1>
        <span class="text-muted small">Selamat datang, <strong><?= $this->session->userdata('username') ?></strong> | <?= date('d F Y') ?></span>
    </div>

    <div class="row">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order Saya</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_order ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="<?= site_url('salesorder') ?>" class="text-primary small">Lihat Order Saya →</a>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Order Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $user_id = $this->session->userdata('id_user');
                                echo $this->db->where('user_id', $user_id)->where('status', 'selesai')->count_all_results('sales_order');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <span class="text-success small">Order yang sudah selesai</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Order Terbaru Milik Sales -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Order Terbaru Saya</h6>
                    <a href="<?= site_url('salesorder/tambah') ?>" class="btn btn-sm btn-primary">+ Buat Order</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode Order</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $this->session->userdata('id_user');
                            $orders = $this->db->select('sales_order.kode_order, pelanggan.nama as nama_pelanggan, sales_order.tanggal, sales_order.total, sales_order.status')
                                ->from('sales_order')
                                ->join('pelanggan', 'pelanggan.id = sales_order.pelanggan_id')
                                ->where('sales_order.user_id', $user_id)
                                ->order_by('sales_order.id', 'DESC')
                                ->limit(5)
                                ->get()->result();
                            foreach($orders as $o): ?>
                            <tr>
                                <td><?= $o->kode_order ?></td>
                                <td><?= $o->nama_pelanggan ?></td>
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>