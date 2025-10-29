<?php

class global_model extends CI_Model {


    public function get_class_list()
    {
        $this->db->select('ms_class.class_id, class_name');
        $this->db->from('ms_class');
        $this->db->where('class_active', 'y');
        $this->db->order_by('class_name', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_class_price($id)
    {
        $this->db->select('class_price, schedule_day, schedule_class_id, schedule_time_start');
        $this->db->from('ms_class');
        $this->db->join('schedule_class', 'ms_class.class_id = schedule_class.class_id');
        $this->db->where('ms_class.class_id', $id);
        $this->db->order_by('schedule_day', 'desc');
        $this->db->order_by('schedule_time_start', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_payment($id)
    {
        $this->db->select('*');
        $this->db->from('ms_payment');
        $this->db->where('class_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_transaction($id)
    {
        $this->db->select('*');
        $this->db->from('transaction_register');
        $this->db->join('transaction_register_daily', 'transaction_register.transaction_register_id = transaction_register_daily.transaction_register_id');
        $this->db->join('schedule_class', 'transaction_register_daily.schedule_class_id = schedule_class.schedule_class_id');
        $this->db->join('ms_class', 'transaction_register.transaction_class_id = ms_class.class_id');
        $this->db->join('ms_payment', 'transaction_register.transaction_payment_id = ms_payment.payment_id');
        $this->db->where('transaction_register.transaction_register_inv', $id);
        $query = $this->db->get();
        return $query;
    }


}

?>