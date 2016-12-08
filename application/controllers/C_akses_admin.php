<?php
/**
*
*/
class C_akses_admin extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
    $this->load->library('session','form_validation');
    $this->load->model('M_admin');
  }

  public function index(){
    $this->load->view('login_admin');
  }

  public function login_admin(){
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Masukkan username dan password anda!</div></div>");
          redirect('C_akses_admin');
      } else {
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $cek = $this->M_admin->cek_admin($username,$password);
          if (count($cek) == 1) {
              foreach ($cek as $cek) {
                  $id_bidan = $cek['id_admin'];
              }
              $this->session->set_userdata(array(
                  'isLogin' => TRUE,
                  'username' => $username,
                  'id_ktp' => $id_ktp,
              ));
              redirect('C_admin');
          } else {
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Username atau password anda kurang tapat!</div></div>");
              redirect('C_akses_admin');
          }
      }
  }
}
