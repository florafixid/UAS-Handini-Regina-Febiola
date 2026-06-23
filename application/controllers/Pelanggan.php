<?php
class Pelanggan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('login')) redirect('login');
        $this->load->model('Pelanggan_model');
    }
    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/tambah');
        $this->load->view('templates/footer');
    }
    public function simpan() {
        $data = [
            'nama'     => $this->input->post('nama'),
            'alamat'   => $this->input->post('alamat'),
            'telepon'  => $this->input->post('telepon'),
        ];
        $this->Pelanggan_model->insert($data);
        redirect('pelanggan');
    }
    public function edit($id) {
        $data['pelanggan'] = $this->Pelanggan_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update($id) {
        $data = [
            'nama'     => $this->input->post('nama'),
            'alamat'   => $this->input->post('alamat'),
            'telepon'  => $this->input->post('telepon'),
        ];
        $this->Pelanggan_model->update($id, $data);
        redirect('pelanggan');
    }
    public function hapus($id) {
        $this->Pelanggan_model->delete($id);
        redirect('pelanggan');
    }
}