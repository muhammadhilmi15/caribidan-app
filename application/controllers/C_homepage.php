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
}
