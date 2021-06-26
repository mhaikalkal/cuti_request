<?php

class Auth_model extends CI_model
{
    public function user_validation($username, $password)
    {
        $data = 
        [
            'username' => $username,
            'password' => sha1($password),
        ];
        
        return $this->db->get_where('user', $data);
    }

}