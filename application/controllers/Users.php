<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('login')) redirect('login');
        if($this->session->userdata('role') != 'admin') redirect('dashboard');
        $this->load->model('Users_model');
    }
    public function index() {
        $data['users'] = $this->Users_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('users/tambah');
        $this->load->view('templates/footer');
    }
    public function simpan() {
        $data = [
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => MD5($this->input->post('password')),
            'role'     => $this->input->post('role'),
        ];
        $this->Users_model->insert($data);
        redirect('users');
    }
    public function edit($id) {
        $data['user'] = $this->Users_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update($id) {
        $data = [
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'role'     => $this->input->post('role'),
        ];
        if($this->input->post('password') != '') {
            $data['password'] = MD5($this->input->post('password'));
        }
        $this->Users_model->update($id, $data);
        redirect('users');
    }
    public function hapus($id) {
        $this->Users_model->delete($id);
        redirect('users');
    }
}