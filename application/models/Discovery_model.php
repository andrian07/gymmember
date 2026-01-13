<?php

class discovery_model extends CI_Model {
    //discovery

    public function header_class($class_id)
    {
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->where('ms_class.class_id', $class_id);
        $this->db->where('ms_class.class_active', 'Y');
        $query = $this->db->get();
        return $query;
    }
    public function detail_class($class_id)
    {
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->join('schedule_class', 'ms_class.class_id = schedule_class.class_id');
        $this->db->join('ms_coach', 'schedule_class.coach_id = ms_coach.coach_id');
        $this->db->where('ms_class.class_id', $class_id);
        $this->db->where('ms_class.class_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function class_data_detail_all()
    {
        $this->db->select('ms_class.*, GROUP_CONCAT(schedule_class.schedule_day SEPARATOR ", ") as schedule_days');
        $this->db->from('ms_class');
        $this->db->join('schedule_class', 'ms_class.class_id = schedule_class.class_id');
        $this->db->where('class_active', 'Y');
        $this->db->group_by('ms_class.class_id');
        $query = $this->db->get();
        return $query;
    }

    public function coach_data_pt()
    {
        $this->db->select('*');
        $this->db->from('ms_coach');
        $this->db->join('ms_pt_price', 'ms_coach.coach_lvl = ms_pt_price.ms_pt_price_id', 'left');  
        $this->db->where('coach_type', 'PT');
        $this->db->where('coach_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function class_package_by_id($class_id)
    {
        $this->db->select('p.*');
        $this->db->from('ms_class_package p');
        $this->db->join('ms_class_package_detail d', 'p.ms_class_package_id = d.ms_class_package_id');
        $this->db->group_by('p.ms_class_package_id');
        $this->db->having('SUM(CASE WHEN d.class_id != 1 THEN 1 ELSE 0 END) = 0', null, false);
        $this->db->having('SUM(CASE WHEN d.class_id = 1 THEN 1 ELSE 0 END) > 0', null, false);
        $query = $this->db->get();
        return $query;
    }
    public function get_package_price($package_id)
    {
        $this->db->select("
        ms_class_package_id,
        ms_class_package_name,
        ms_class_package_type,
        CASE 
            WHEN ms_class_package_type = 'Bulan' THEN ms_class_package_month_price
            WHEN ms_class_package_type = 'Hari'  THEN ms_class_package_day_price
            WHEN ms_class_package_type = 'Tahun' THEN ms_class_package_year_price
        END AS package_price
    ", false);
    $this->db->from('ms_class_package');
    $this->db->where('ms_class_package_id', $package_id);
    $this->db->where('ms_class_package_active', 'Y');
    $query = $this->db->get();
    return $query;
    }
    public function pt_information($coach_id)
    {
        $this->db->select('*');
        $this->db->from('ms_coach');
        $this->db->join('ms_pt_price', 'ms_coach.coach_lvl = ms_pt_price.ms_pt_price_id', 'left');  
        $this->db->where('ms_coach.coach_id', $coach_id);
        $this->db->where('ms_coach.coach_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

}