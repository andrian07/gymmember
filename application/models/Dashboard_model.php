<?php

class dashboard_model extends CI_Model {


    public function banner_data()
    {
        $this->db->select('*');
        $this->db->from('ms_banner');
        $this->db->where('banner_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function class_data()
    {
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->where('class_active', 'Y');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query;
    }

    public function pt_data()
    {
        $this->db->select('*');
        $this->db->from('ms_coach');
        $this->db->where('coach_type', 'PT');        
        $this->db->where('coach_active', 'Y');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query;
    }

    public function class_data_all()
    {
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->where('class_active', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function pt_data_all()
    {
        $this->db->select('*');
        $this->db->from('ms_coach');
        $this->db->where('coach_type', 'PT');        
        $this->db->where('coach_active', 'Y');
        $query = $this->db->get();
        return $query;
    }
    public function coach_data_all()
    {
        $this->db->select('*');
        $this->db->from('ms_coach');
        $this->db->join('ms_pt_price', 'ms_coach.coach_lvl = ms_pt_price.ms_pt_price_id', 'left');  
        $this->db->where('coach_active', 'Y');
        $this->db->order_by('coach_type', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function today_class_data()
    {   
        date_default_timezone_set('Asia/Jakarta');
        $date =  date('l');
        if($date == 'Sunday'){
            $date = 'Minggu';
        }else if($date == 'Monday'){
            $date = 'Senin';
        }
        else if($date == 'Tuesday'){
            $date = 'Selasa';
        }
        else if($date == 'Wednesday'){
            $date = 'Rabu';
        }
        else if($date == 'Thursday'){
            $date = 'Kamis';
        }
        else if($date == 'Friday'){
            $date = 'Jumat';
        }
        else if($date == 'Saturday'){
            $date = 'Sabtu';
        }
        $this->db->select('*');
        $this->db->from('ms_class');
        $this->db->join('schedule_class', 'ms_class.class_id  = schedule_class.class_id');
        $this->db->join('ms_coach', 'schedule_class.coach_id  = ms_coach.coach_id');
        $this->db->where('schedule_day', $date);        
        $this->db->where('class_active', 'Y');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query;
    }

}

?>