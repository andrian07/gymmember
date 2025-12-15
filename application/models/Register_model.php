<?php

class register_model extends CI_Model {


    public function check_phone_number($phone)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_phone', $phone);
        $query = $this->db->get();
        return $query;
    }

    public function check_email($email)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_email', $email);
        $query = $this->db->get();
        return $query;
    }


    public function last_member_code()
    {
        $this->db->select('member_code');
        $this->db->from('ms_member');
        $this->db->where('member_type', 'Normal');
        $this->db->order_by('member_id', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query;
    }

    public function save_member($insert)
    {
        $this->db->insert('ms_member', $insert);
    }
}

?>