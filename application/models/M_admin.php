<?php
/**
*
*/
class M_admin extends CI_Model
{
    public function data_bidan()
    {
        $query = "SELECT * FROM data_bidan,lampiran WHERE data_bidan.id_ktp = lampiran.id_ktp";
        $hasil = $this->db->query($query);
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function login_admin()
    {
        $username = set_value('username');
        $password = set_value('password');
        $hasil = $this->db->where('username', $username)
                ->where('password', $password)
                ->limit(1)
                ->get('super_admin');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function cek_admin($username = "", $password = "")
    {
        $query = $this->db->get_where('super_admin', array('username' => $username, 'password' => $password));
        $hasil = $query->result_array();
        return $hasil;
    }

    public function konfirmasi_data($where, $data) {
        $this->db->update('data_bidan', $data, $where);
        return $this->db->affected_rows();
    }

    public function hapus_bidan($where, $table) {
        $this->db->delete($table, $where);
    }
}

?>
