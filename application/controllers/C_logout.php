<?php

class C_logout extends CI_Controller {

    public function index() {
        $this->session->sess_destroy();
        redirect('C_homepage');
    }
}
