<?php
class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('login')) redirect('login');
        if(!in_array($this->session->userdata('role'), ['admin','manager'])) redirect('dashboard');
        $this->load->model('Laporan_model');
    }
    public function index() {
        $filter = [
            'sales_id'  => $this->input->get('sales_id'),
            'produk_id' => $this->input->get('produk_id'),
            'dari'      => $this->input->get('dari'),
            'sampai'    => $this->input->get('sampai'),
        ];
        $data['laporan']  = $this->Laporan_model->get_laporan($filter);
        $data['sales']    = $this->db->get('users')->result();
        $data['produk']   = $this->db->get('produk')->result();
        $data['filter']   = $filter;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function cetak_pdf() {
        $filter = [
            'sales_id'  => $this->input->get('sales_id'),
            'produk_id' => $this->input->get('produk_id'),
            'dari'      => $this->input->get('dari'),
            'sampai'    => $this->input->get('sampai'),
        ];
        $data['laporan'] = $this->Laporan_model->get_laporan($filter);
        $data['filter']  = $filter;
        $this->load->view('laporan/cetak_pdf', $data);
    }
}