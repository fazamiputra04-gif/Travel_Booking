<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function get_by_username_or_email($input)
    {
        $this->db->where('nama', $input);
        $this->db->or_where('email', $input);
        $query = $this->db->get('tb_user');
        return $query->row_array(); // ✅ kembalikan hasilnya
    }

}
