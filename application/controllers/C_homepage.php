<?php
/**
*
*/
class C_homepage extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('main_page.php');
  }

  public function kritikdansaran() {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $nohp = $this->input->post('nohp');
      $pesan = $this->input->post('pesan');
      $kritikdansaran = array (
          'nama' => $nama,
          'email' => $email,
          'no_telp' => $nohp,
          'pesan' => $pesan
      );
      $this->load->model('M_bidan');
      $this->M_bidan->kritikdansaran($kritikdansaran);
      redirect('C_homepage');
  }

}
