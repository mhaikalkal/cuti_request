<?php

class Data_model extends CI_model
{
    public function getAllDivisi()
    {
        return $this->db->get('divisi');

    }

    // Dependent select box from divisi
    public function getAllJabatan($id_divisi)
    {
        return $this->db->get_where('jabatan', ['id_divisi' => $id_divisi])->result();

    }

    public function getAllLevel()
    {
        return $this->db->get('level');

    }



}