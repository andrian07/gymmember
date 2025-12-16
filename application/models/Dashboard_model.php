<?php

class dashboard_model extends CI_Model {


    public function banner_data($username, $password)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_phone', $username);
        $this->db->where('member_pass', $password);
        $this->db->where('member_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function class_data()
    {
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->where('class_image not like "default.png"');
        $this->db->where('class_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function pt_data($username, $password)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_phone', $username);
        $this->db->where('member_pass', $password);
        $this->db->where('member_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

}

?>