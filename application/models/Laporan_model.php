<?php
class Laporan_model extends CI_Model {
    public function get_laporan($filter) {
        $this->db->select('sales_order.kode_order, sales_order.tanggal, sales_order.total, sales_order.status, pelanggan.nama as nama_pelanggan, users.nama as nama_sales, produk.nama as nama_produk, detail_order.jumlah, detail_order.harga_satuan, detail_order.subtotal');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.pelanggan_id');
        $this->db->join('users', 'users.id = sales_order.user_id');
        $this->db->join('detail_order', 'detail_order.order_id = sales_order.id');
        $this->db->join('produk', 'produk.id = detail_order.produk_id');

        if(!empty($filter['sales_id'])) {
            $this->db->where('sales_order.user_id', $filter['sales_id']);
        }
        if(!empty($filter['produk_id'])) {
            $this->db->where('detail_order.produk_id', $filter['produk_id']);
        }
        if(!empty($filter['dari'])) {
            $this->db->where('sales_order.tanggal >=', $filter['dari']);
        }
        if(!empty($filter['sampai'])) {
            $this->db->where('sales_order.tanggal <=', $filter['sampai']);
        }

        return $this->db->get()->result();
    }
}