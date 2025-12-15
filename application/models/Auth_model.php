<?php

class auth_model extends CI_Model {


        //login
    public function get_login_data($username, $password)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_phone', $username);
        $this->db->where('member_pass', $password);
        $this->db->where('member_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function insert_login($insert_login)
    {
        $this->db->insert('history_login', $insert_login);
    }

    public function update_cookies($cookies_data, $username)
    {
        $this->db->set($cookies_data);
        $this->db->where('member_phone', $username);
        $this->db->update('ms_member');
    }
    //end login

}

?>