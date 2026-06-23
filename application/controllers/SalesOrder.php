<?php
class SalesOrder extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('login')) redirect('login');
        $this->load->model('SalesOrder_model');
    }
    public function index() {
        $role = $this->session->userdata('role');
        if($role == 'admin') {
            $data['orders'] = $this->SalesOrder_model->get_all();
        } else {
            $data['orders'] = $this->SalesOrder_model->get_by_user($this->session->userdata('id_user'));
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('salesorder/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah() {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $data['produk']    = $this->db->get('produk')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('salesorder/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function simpan() {
        $order = [
            'kode_order'    => uniqid('SO-'),
            'pelanggan_id'  => $this->input->post('pelanggan_id'),
            'user_id'       => $this->session->userdata('id_user'),
            'tanggal'       => date('Y-m-d'),
            'status'        => 'draft',
            'total'         => 0,
        ];
        $order_id = $this->SalesOrder_model->insert_order($order);

        $produk_ids = $this->input->post('produk_id');
        $jumlahs    = $this->input->post('jumlah');
        $total      = 0;

        foreach($produk_ids as $i => $produk_id) {
            $produk = $this->db->get_where('produk', ['id' => $produk_id])->row();
            $subtotal = $produk->harga * $jumlahs[$i];
            $total += $subtotal;

            $detail = [
                'order_id'      => $order_id,
                'produk_id'     => $produk_id,
                'jumlah'        => $jumlahs[$i],
                'harga_satuan'  => $produk->harga,
                'subtotal'      => $subtotal,
            ];
            $this->db->insert('detail_order', $detail);
        }

        $this->SalesOrder_model->update_total($order_id, $total);
        redirect('salesorder');
    }
    public function ubah_status($id) {
        $status = $this->input->post('status');
        $this->SalesOrder_model->update_status($id, $status);
        redirect('salesorder');
    }
    public function detail($id) {
        $data['order']  = $this->SalesOrder_model->get_by_id($id);
        $data['detail'] = $this->SalesOrder_model->get_detail($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('salesorder/detail', $data);
        $this->load->view('templates/footer');
    }
}