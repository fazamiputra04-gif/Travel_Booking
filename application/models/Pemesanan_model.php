<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('tb_pemesanan', $data);
    }

    public function get_by_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->join('tb_paket', 'tb_pemesanan.id_paket = tb_paket.id_paket');
        return $this->db->get('tb_pemesanan')->result_array();
    }
}
