<?php
defined('BASEPATH') OR exit('No direct script access allowed');

public function get_by_username_or_email($input)
{
    $this->db->where('nama', $input);
    $this->db->or_where('email', $input);
    $query = $this->db->get('tb_user');

    echo $this->db->last_query(); // tampilkan query
    print_r($query->row_array()); // tampilkan hasil
    exit;
}
