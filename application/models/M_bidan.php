<?php
/**
*
*/
class M_bidan extends CI_Model
{
    function _construct()
    {
        parent:: _construct();
    }

    public function login_bidan()
    {
        $email = set_value('email');
        $password = set_value('password');
        $status = set_value('status');
        $hasil = $this->db->where('email', $email)
                ->where('password', $password)
                ->where('status', $status)
                ->limit(1)
                ->get('data_bidan');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function cek_bidan($email = "", $password = "", $status = "")
    {
        $query = $this->db->get_where('data_bidan', array('email' => $email, 'password' => $password, 'status' => $status));
        $hasil = $query->result_array();
        return $hasil;
    }

    public function input_data_bidan($data_bidan) {
        $this->db->insert('data_bidan', $data_bidan);
        return TRUE;
    }

    public function get_data($where) {
        $query = "SELECT * FROM data_bidan WHERE id_ktp='" . $where . "'";
        $hasil = $this->db->query($query);
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function get_semua_bidan() {
        $query = "SELECT * FROM data_bidan";
        $hasil = $this->db->query($query);
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

}

?>
