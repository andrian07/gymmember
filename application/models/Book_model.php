<?php

class book_model extends CI_Model {
    //booking class daily
    public function book_class($data)
    {
        $this->db->trans_start();
        $this->db->insert('transaction_register', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }

    public function book_daily_class($data_daily)
    {
        $this->db->trans_start();
        $this->db->insert('transaction_register_daily', $data_daily);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    public function last_book()
    {
        $this->db->select('transaction_register_inv');
        $this->db->from('transaction_register');
        $this->db->order_by('transaction_register_id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query;
    }
    public function get_price_by_class_id($class_id)
    {
        $this->db->select('class_price_day');
        $this->db->from('ms_class');
        $this->db->where('class_id', $class_id);
        $query = $this->db->get();
        return $query;
    }

    public function check_register_today($user_id, $class_id)
    {
        $this->db->select('transaction_register_id');
        $this->db->from('transaction_register');
        $this->db->where('member_id', $user_id);
        $this->db->where('transaction_class_id', $class_id);
        $this->db->where('transaction_register_date', date('Y/m/d'));
        $query = $this->db->get();
        return $query;
    }
    
    public function check_active_class($user_id, $class_package_id, $class_start_date)
    {
        $this->db->select('*');
        $this->db->from('member_class');
        $this->db->where('member_id', $user_id);
        $this->db->where('package_class_id', $class_package_id);
        $this->db->where('member_class_end <=', $class_start_date); 
        $this->db->where('member_class_active', 'Y'); 
        $query = $this->db->get();
        return $query;
    }
    
    //end booking class daily
}

?>