<?php

class api_model extends CI_Model {


    //api

    public function save_member($data_insert)
    {
        $this->db->trans_start();
        $this->db->insert('ms_member', $data_insert);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }

    public function checkregisterdaily($phone, $schedule_class_id, $register_date)
    {
        $this->db->select('*');
        $this->db->from('transaction_register_daily');
        $this->db->join('transaction_register', 'transaction_register_daily.transaction_register_id = transaction_register.transaction_register_id');
        $this->db->join('ms_member', 'transaction_register.member_id = ms_member.member_id');
        $this->db->where('member_phone', $phone);
        $this->db->where('transaction_register_daily.schedule_class_id', $schedule_class_id);
        $this->db->where('transaction_register.transaction_register_date', $register_date);
        $query = $this->db->get();
        return $query;
    }

    public function check_phone($phone)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_phone', $phone);
        $query = $this->db->get();
        return $query;
    }

    public function last_member_code()
    {
        $this->db->select('member_code');
        $this->db->from('ms_member');
        $this->db->where('member_type', 'Normal');
        $this->db->order_by('member_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function last_register()
    {
        $this->db->select('transaction_register_inv');
        $this->db->from('transaction_register');
        $this->db->order_by('transaction_register_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function check_price($class_id)
    {
        $this->db->select('class_price');
        $this->db->from('ms_class');
        $this->db->where('class_id', $class_id);
        $query = $this->db->get();
        return $query;
    }

    public function save_transaction_register($data_insert_trx)
    {
        $this->db->trans_start();
        $this->db->insert('transaction_register', $data_insert_trx);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }


    public function save_transaction_register_daily($data_insert_daily)
    {
        $this->db->trans_start();
        $this->db->insert('transaction_register_daily', $data_insert_daily);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }   
    //api

}

?>