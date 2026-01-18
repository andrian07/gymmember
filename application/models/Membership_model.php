<?php

class membership_model extends CI_Model {


    public function gym_package_member()
    {
        $this->db->select("
        ms_gym_package_id,
        ms_gym_package_name,
        ms_gym_package_type,
        ms_gym_package_image,
        CASE 
            WHEN ms_gym_package_type = 'Bulan' THEN ms_gym_package_month_price
            WHEN ms_gym_package_type = 'Hari'  THEN ms_gym_package_day_price
            WHEN ms_gym_package_type = 'Tahun' THEN ms_gym_package_year_price
        END AS package_price
    ", false);
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