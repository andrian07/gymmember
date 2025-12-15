<?php

class global_model extends CI_Model {


    public function check_cookies($user_id)
    {
        $this->db->select('member_cookies');
        $this->db->from('ms_member');
        $this->db->where('member_id', $user_id);
        $query = $this->db->get();
        return $query;
    }

}

?>