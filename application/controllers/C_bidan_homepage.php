<?php
/**
*
*/
class C_bidan_homepage extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
    if ($this->session->userdata('id_ktp') == "") {
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Maaf akun anda belum log out!</div></div>");
        redirect('C_akses_bidan');
    }
    $this->load->model('M_bidan');
  }

  public function index(){
      $where = $this->session->userdata('id_ktp');
      $data['data_bidan'] = $this->M_bidan->get_data($where);
      $this->load->view('main_page_bidan', $data);
  }
}
