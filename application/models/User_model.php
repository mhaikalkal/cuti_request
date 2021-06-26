<?php

class User_model extends CI_model
{
    // User
    public function getAllUsers()
    {
        return $this->db->get('user');

    }

    public function getUser($id) 
    {
        return $this->db->get_where('user', ['id' => $id]);

    }

    public function getUserByUsername($user) 
    {
        return $this->db->get_where('user', ['username' => $user]);

    }

    // Dashboard Admin
    public function jumlahAkun()
    {
        return $this->db->get('user')->num_rows();

    }

    public function jumlahAdmin()
    {
        $this->db->where('level', '1');
        return $this->db->get('user')->num_rows();

    }

    public function jumlahHR()
    {
        $this->db->where('level', '2');
        return $this->db->get('user')->num_rows();

    }

    public function jumlahStaff()
    {
        $this->db->where('level', '3');
        return $this->db->get('user')->num_rows();

    }

    // Data Navbar atau User Login
    public function User($id)
    {
        $query = $this->db->query(
            "SELECT DISTINCT
            `user`.id,
            `user`.username,
            `user`.`password`,
            `level`.`level`,
            user_profile.nip,
            user_profile.nama,
            user_profile.kelamin,
            divisi.id AS `div`,
            jabatan.id AS pos,
            divisi.divisi,
            jabatan.jabatan,
            user_profile.email,
            user_profile.telp,
            user_profile.tgl_masuk 
        FROM
            `user`
            INNER JOIN `level` ON `user`.`level` = `level`.id
            INNER JOIN user_profile ON `user`.id = user_profile.id
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi 
        WHERE
            `user`.id = $id"
            
        );

        return $query;

    }

    // User Action
    public function tambahUser()
    {
        $data = 
        [
            'id' => $this->input->post('id', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => SHA1($this->input->post('password', TRUE)),
            'level' => $this->input->post('level', TRUE),
        ];

        $this->db->insert('user', $data);

    }

    public function ubahPassword()
    {
        $data = [
            "id" => $this->input->post('id', TRUE),
            "password" => SHA1($this->input->post('new_password', TRUE)),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);

    }
    
    public function ubahLevel($id)
    {
        $data = [
            "id" => $this->input->post('id', TRUE),
            'username' => $this->input->post('username', TRUE),
            "level" => $this->input->post('level', TRUE),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);

    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

    }

    // SHOW TABKE USER
    public function showUsers()
    {
        $query = $this->db->query(
            "SELECT
            `user`.id,
            `user`.username,
            `user`.`password`,
            `level`.`level` 
        FROM
            `user`
            INNER JOIN `level` ON `user`.`level` = `level`.id"
        );

        return $query;

    }

    public function pickUser($id)
    {
        $query = $this->db->query(
            "SELECT
            `user`.id,
            `user`.username,
            user_profile.nama,
            `user`.`password`,
            `level`.`level` 
        FROM
            `user`
            INNER JOIN `level` ON `user`.`level` = `level`.id
            INNER JOIN user_profile ON `user`.id = user_profile.id
        WHERE `user`.id = $id"
        );

        return $query;
        
    }
    
}