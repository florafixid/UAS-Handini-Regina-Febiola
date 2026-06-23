<?php
class SalesOrder_model extends CI_Model {
    private $table = 'sales_order';

    public function get_all() {
        $this->db->select('sales_order.*, pelanggan.nama as nama_pelanggan, users.nama as nama_sales');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.pelanggan_id');
        $this->db->join('users', 'users.id = sales_order.user_id');
        return $this->db->get()->result();
    }
    public function get_by_user($user_id) {
    $this->db->select('sales_order.*, pelanggan.nama as nama_pelanggan, users.nama as nama_sales');
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id = sales_order.pelanggan_id');
    $this->db->join('users', 'users.id = sales_order.user_id');
    $this->db->where('sales_order.user_id', $user_id);
    return $this->db->get()->result();
}
    public function get_by_id($id) {
        $this->db->select('sales_order.*, pelanggan.nama as nama_pelanggan, users.nama as nama_sales');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'pelanggan.id = sales_order.pelanggan_id');
        $this->db->join('users', 'users.id = sales_order.user_id');
        $this->db->where('sales_order.id', $id);
        return $this->db->get()->row();
    }
    public function get_detail($order_id) {
        $this->db->select('detail_order.*, produk.nama as nama_produk');
        $this->db->from('detail_order');
        $this->db->join('produk', 'produk.id = detail_order.produk_id');
        $this->db->where('order_id', $order_id);
        return $this->db->get()->result();
    }
    public function insert_order($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update_total($id, $total) {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['total' => $total]);
    }
    public function update_status($id, $status) {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => $status]);
    }
}