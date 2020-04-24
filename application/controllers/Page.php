<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	private function checkLogin() {
        if (!$this->session->userdata('user')) {
            redirect('page/login');
        }
    }

	public function index() {
        redirect('page/home');
    }
    public function addregister(){
         $data = [
            'nama' => $this->input->post('name'),
            'nomorhp' => $this->input->post('username'),
            'email' => $this->input->post('nomorhp'),
            'sandi' => $this->input->post('sandi'),
            'alamat' => $this->input->post('alamat'),
            'tanggal' => $this->input->post('tanggal'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
        ];
        $this->UserModel->addUser($data);

        $this->session->set_flashdata('message', 'Register success');
        redirect('page/home');
    }
    
    public function login() {
        $this->load->view('form_login');
    }

    public function register() {
        $this->load->view('form_registrasi');
    }

    public function home() {
        $this->checkLogin();
        // $data = [
        //     'books' => $this->BookModel->getAllBooks()->result_array(),
        // ];
        $this->load->view('HomeView');
    }
}

