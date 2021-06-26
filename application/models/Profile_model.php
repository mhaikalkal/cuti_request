<?php

class Profile_model extends CI_model
{
    // Fetch Profile
    public function getAllProfile()
    {
        return $this->db->get('user_profile');

    }

    public function getProfile($id) 
    {
        return $this->db->get_where('user_profile', ['id' => $id]);

    }

    public function showProfile($id)
    {
        $query = $this->db->query(
            "SELECT
            user_profile.id,
            user_profile.nip,
            user_profile.nama,
            user_profile.kelamin,
            divisi.divisi,
            jabatan.jabatan,
            user_profile.email,
            user_profile.telp,
            user_profile.tgl_masuk 
        FROM
            divisi
            INNER JOIN jabatan ON divisi.id = jabatan.id_divisi
            INNER JOIN user_profile ON divisi.id = user_profile.divisi 
            AND jabatan.id = user_profile.jabatan 
        WHERE
            user_profile.id = $id"
        );

        return $query;

    }

    // Profile Action
    public function tambahProfile()
    {
        $data = 
        [
            'id' => $this->input->post('id', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'kelamin' => $this->input->post('kelamin', TRUE),
            'divisi' => $this->input->post('divisi', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'email' => $this->input->post('email', TRUE),
            'telp' => $this->input->post('telp', TRUE),
            'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
        ];

        $this->db->insert('user_profile', $data);

    }
    
    public function ubahProfile()
    {
        $data = 
        [
            'id' => $this->input->post('id', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'kelamin' => $this->input->post('kelamin', TRUE),
            'divisi' => $this->input->post('divisi', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'email' => $this->input->post('email', TRUE),
            'telp' => $this->input->post('telp', TRUE),
            'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->replace('user_profile', $data);

    }




}