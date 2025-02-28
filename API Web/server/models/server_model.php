<?php defined('BASEPATH') or exit('No direct script access allowed');

class Server_model extends CI_Model
{
    public function __contruct()
    {
        // setup apapun disini

        // jika setup database lain
        $this->db1 = $this->load->database('nama_db_satu', true);
        $this->db2 = $this->load->database('nama_db_dua', true);

        // jika mengambil data akun login
        $this->username =  $this->session->userdata('username');
    }

    public function model_versi_satu($id, $name)
    {
        // ------------------ insert ------------------------
        $arr = [
            'id'        => $id,
            'name'      => $name,
            'input_by'  => $this->username,
            'input_at'  => date('Y-m-d H:i:s'),
        ];


        // jika pakai database bawaan CI
        $this->db->insert('nama_table', $arr);

        // atau

        // jika pakai database setup baru
        $this->db1->insert('nama_table', $arr);
        $this->db2->insert('nama_table', $arr);


        // ------------------ update ------------------------
        $arr = [
            'name'  => $name,
            'input_by'  => $this->username,
            'input_at'  => date('Y-m-d H:i:s'),
        ];


        // jika pakai database bawaan CI
        $this->db->update('nama_table', $arr, ['id' => $id]);

        // atau

        // jika pakai database setup baru
        $this->db1->update('nama_table', $arr, ['id' => $id]);
        $this->db2->update('nama_table', $arr, ['id' => $id]);
    }

    public function model_versi_dua($id, $name)
    {
        // ------------------ insert ------------------------
        $arr = [
            'id'        => $id,
            'name'      => $name,
            'input_by'  => $this->username,
            'input_at'  => date('Y-m-d H:i:s'),
        ];


        // jika pakai database bawaan CI
        $this->db->insert('nama_table', $arr);

        // atau

        // jika pakai database setup baru
        $this->db1->insert('nama_table', $arr);
        $this->db2->insert('nama_table', $arr);


        // ------------------ update ------------------------
        $arr = [
            'name'  => $name,
            'input_by'  => $this->username,
            'input_at'  => date('Y-m-d H:i:s'),
        ];


        // jika pakai database bawaan CI
        $this->db->update('nama_table', $arr, ['id' => $id]);

        // atau

        // jika pakai database setup baru
        $this->db1->update('nama_table', $arr, ['id' => $id]);
        $this->db2->update('nama_table', $arr, ['id' => $id]);
    }
}
