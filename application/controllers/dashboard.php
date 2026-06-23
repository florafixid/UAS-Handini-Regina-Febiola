<?php
class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('login')) redirect('login');
    }

    public function index() {
        $role = $this->session->userdata('role');

        if($role == 'admin') {
            $data['total_produk']    = $this->db->count_all('produk');
            $data['total_pelanggan'] = $this->db->count_all('pelanggan');
            $data['total_order']     = $this->db->count_all('sales_order');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/admin', $data);
            $this->load->view('templates/footer');

        } elseif($role == 'sales') {
            $user_id = $this->session->userdata('id_user');
            $data['total_order'] = $this->db->where('user_id', $user_id)->count_all_results('sales_order');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/sales', $data);
            $this->load->view('templates/footer');

        } elseif($role == 'manager') {
            $data['total_order']     = $this->db->count_all('sales_order');
            $data['total_pelanggan'] = $this->db->count_all('pelanggan');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/manager', $data);
            $this->load->view('templates/footer');
        }
    }
}