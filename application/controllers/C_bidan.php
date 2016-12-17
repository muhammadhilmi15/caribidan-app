<?php
/**
*
*/
class C_bidan extends CI_Controller {
    public function __construct() //konstraktor untuk meload library, helper dan model
    {
        parent::__construct();
        $this->load->helper(array('form','file','url'));
        $this->load->model('M_bidan');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('register_bidan');
    }

    public function tambah_bidan() {
        //form validation
        $this->load->helper(array('form', 'file', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->form_validation->set_rules('id_ktp', 'ID KTP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat', 'Harga', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $nmfile = "file_" . time();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '50000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nmfile;

        // $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE and empty($_FILES['userfile']['name'])) {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Silahkan pilih gambar dan lengkapi data anda!</div></div>");
            redirect('C_bidan');
        } elseif ($this->form_validation->run() == TRUE and empty($_FILES['userfile']['name'])) {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Pilih gambar untuk diupload!</div></div>");
            redirect('C_bidan');
        } elseif ($this->form_validation->run() == FALSE and ! empty($_FILES['userfile']['name'])) {
            $this->upload->data();
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Silahkan lengkapi data anda!</div></div>");
            redirect('C_bidan');
        } elseif ($this->form_validation->run() == TRUE and ! empty($_FILES['userfile']['name'])) {
            if ($this->upload->do_upload('userfile')) {
                //post
                $foto = $this->upload->data();
                $id_ktp = $this->input->post('id_ktp');
                $nama = $this->input->post('nama');
                $tempat = $this->input->post('tempat');
                $alamat = $this->input->post('alamat');
                $tgl = $this->input->post('tanggal');
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $tgl_lahir = $tahun.'-'.$bulan.'-'.$tgl;
                $agama = $this->input->post('agama');
                $nohp = $this->input->post('nohp');
                $jk = $this->input->post('jk');
                $email = $this->input->post('email');
                $pass = $this->input->post('password');
                $status = $this->input->post('status');
                $lat = $this->input->post('lat');
                $lng = $this->input->post('lng');
                $data_bidan = array(
                    'id_ktp' => $id_ktp,
                    'nama' => $nama,
                    'tempat' => $tempat,
                    'lat' => $lat,
                    'lng' => $lng,
                    'alamat' => $alamat,
                    'tgl_lahir' => $tgl_lahir,
                    'agama' => $agama,
                    'no_hp' => $nohp,
                    'jenis_kelamin' => $jk,
                    'email' => $email,
                    'password' => $pass,
                    'status' => $status,
                    'foto' => $foto['file_name']
                );
                $this->M_bidan->input_data_bidan($data_bidan);
                //resize foto
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                $config2['maintain_ratio'] = TRUE;
                $config2['new_image'] = './assets/uploads/thumb';
                $config2['width'] = 200;
                $config2['height'] = 200;
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
                }
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Input data diri berhasil!</div></div>");
                redirect('C_bidan');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Input data diri gagal!</div></div>");
                // $this->session->set_flashdata('error',$error['error']);
                redirect('C_bidan');
            }
        }
    }

    public function tambah_berkas_bidan() {
        //form validation
        $this->load->helper(array('form', 'file', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '50000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nmfile;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $foto = $this->upload->data();
            $id_ktp = $this->input->post('id_ktp');
            $berkas_bidan = array(
                'id_ktp' => $id_ktp,
                'ijazah' => $foto['file_name']
            );
            $this->M_bidan->input_berkas_bidan($berkas_bidan);
            //resize foto
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = $this->upload->upload_path . $this->upload->file_name;
            $config2['maintain_ratio'] = TRUE;
            $config2['new_image'] = './assets/uploads/thumb';
            $config2['width'] = 200;
            $config2['height'] = 200;
            $this->image_lib->clear();
            $this->image_lib->initialize($config2);
            if (!$this->image_lib->resize()) {
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
            }
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Input data diri berhasil!</div></div>");
            redirect('C_bidan');
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Input data diri gagal!</div></div>");
            // $this->session->set_flashdata('error',$error['error']);
            redirect('C_bidan');
        }
    }

    function get_lokasi($lat, $lng){
        $address_details = $this->geocoder->reverse_geocode($lat, $long);
        //print_r($address_details); // This will show you relevant address details.

        //variable untuk menyimpan hasil reverse
        $alamat = $address_details['address'];
        $kota = $address_details['city'];
        $zip = $address_details['zip_code'];
        $daerah = $address_details['county'];
        $negara = $address_details['country'];

        $ket = "<b>Kota :</b> ".$kota.", <b>ZIP Code : </b>".$zip.", <b>Wilayah : </b>".$daerah.", <b>Negara :</b> ".$negara;

        //fungsi uutk menyimpan lokasi
        $simpanlokasi = array('nama_lokasi' => $alamat ,
        'long' => $long,
        'lat' => $lat ,
        'Keterangan' => $ket );

        $this->m_gmap->simpan_data($simpanlokasi);
        redirect('c_gmap/lihatdata');
    }

    //fungsi untuk melihat data
    function lihatdata(){
        //variable untu button
        $data['kemapnya'] = '<button type="button" class="btn btn-success">'.anchor('c_gmap/index','Kembali ke Laman Awal').'</button>
        </br>';

        //untuk menampilkan semua data di database
        $hasil = $this->m_gmap->tampilan_semua_data()->result();
        $data['datanya'] =  $hasil;

        //meload view untuk menampilkan data
        $this->load->view('v_lihatdata', $data);

    }
}
