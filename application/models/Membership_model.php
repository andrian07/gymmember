<?php

class membership_model extends CI_Model {


    public function gym_package_member()
    {
        $this->db->select('*');
        $this->db->from('ms_gym_package');
        $this->db->where('ms_gym_package_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    
    public function my_package()
    {
        $this->db->select('*');
        $this->db->from('member_gym');
        $this->db->where('member_gym_package_active', 'Y');
        $query = $this->db->get();
        return $query;
    }




}

?>