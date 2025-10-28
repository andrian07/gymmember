<?php

class global_model extends CI_Model {


    public function get_class_list()
    {
        $this->db->select('ms_class.class_id, class_name, schedule_time_start');
        $this->db->from('ms_class');
        $this->db->join('schedule_class', 'ms_class.class_id = schedule_class.class_id');
        $this->db->where('class_active', 'y');
        $query = $this->db->get();
        return $query;
    }

    public function get_class_price($id)
    {
        $this->db->select('class_price');
        $this->db->from('ms_class');
        $this->db->where('class_id', $id);
        $query = $this->db->get();
        return $query;
    }
}

?>