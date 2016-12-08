<?php
/**
*
*/
class C_akses_bidan extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
    $this->load->library('session','form_validation');
    $this->load->model('M_bidan');
  }

  public function index(){
    $this->load->view('login_bidan');
  }

  public function login_bidan(){
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Masukkan username dan password anda!</div></div>");
          redirect('C_akses_bidan');
      } else {
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $status = $this->input->post('status');
          $cek = $this->M_bidan->cek_bidan($email,$password,$status);
          if (count($cek) == 1) {
              foreach ($cek as $cek) {
                  $id_ktp = $cek['id_ktp'];
              }
              $this->session->set_userdata(array(
                  'isLogin' => TRUE,
                  'email' => $email,
                  'id_ktp' => $id_ktp
              ));
              redirect('C_bidan_homepage');
          } else {
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Username atau password anda kurang tapat!</div></div>");
              redirect('C_akses_bidan');
          }
      }
  }
}
