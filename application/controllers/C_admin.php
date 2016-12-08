<?php
/**
*
*/
class C_admin extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
    $this->load->model('M_admin');
  }

  public function index(){
      $data['data_bidan'] = $this->M_admin->data_bidan();
      $this->load->view('daftar_bidan', $data);
  }

  public function konfirmasi($id_bidan) {
      $setStatus = 1;
      $data = array('status' => $setStatus);
      $where = array('id_ktp' => $id_bidan);
      $this->M_admin->konfirmasi_data($where, $data);
      redirect('C_admin');
  }

  public function hapus($id_bidan) {
      $where = array('id_ktp' => $id_bidan);
      $this->M_admin->hapus_bidan($where, 'data_bidan');
      redirect('C_admin');
  }
}
