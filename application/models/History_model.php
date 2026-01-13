<?php

class history_model extends CI_Model {

    public function get_history($user_id, $limit = null, $offset = null)
    {
        $this->db->select('transaction_register.*, ms_class.class_price_day, ms_class.class_name');
        $this->db->from('transaction_register');
        $this->db->join('ms_member', 'transaction_register.member_id = ms_member.member_id');
        $this->db->join('ms_class', 'transaction_register.transaction_class_id = ms_class.class_id');
        $this->db->where('transaction_register.member_id', $user_id);
        $this->db->order_by('transaction_register.transaction_register_id', 'desc');
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_history_by_id_and_user($user_id, $id)
    {
        $this->db->select('*');
        $this->db->from('transaction_register');
        $this->db->join('ms_class_package', 'transaction_register.transaction_class_month = ms_class_package.ms_class_package_id', 'left');
        $this->db->join('ms_gym_package', 'transaction_register.transaction_gym_month = ms_gym_package.ms_gym_package_id', 'left');
        $this->db->join('ms_pt_package_price', 'transaction_register.transaction_pt_id = ms_pt_package_price.ms_pt_package_id', 'left');
        $this->db->join('ms_payment', 'transaction_register.transaction_payment_id = ms_payment.payment_id', 'left');
        $this->db->where('transaction_register.member_id', $user_id);
        $this->db->where('transaction_register.transaction_register_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function check_daily_transaction($user_id, $inv)
    {
        $this->db->select('*, ms_class.class_name as ms_class_package_name');
        $this->db->from('transaction_register');
        $this->db->join('ms_class', 'transaction_register.transaction_class_id = ms_class.class_id');
        $this->db->join('transaction_register_daily', 'transaction_register.transaction_register_id = transaction_register_daily.transaction_register_id');
        $this->db->join('ms_gym_package', 'transaction_register.transaction_gym_month = ms_gym_package.ms_gym_package_id', 'left');
        $this->db->join('ms_pt_package_price', 'transaction_register.transaction_pt_id = ms_pt_package_price.ms_pt_package_id', 'left');
        $this->db->join('ms_payment', 'transaction_register.transaction_payment_id = ms_payment.payment_id', 'left');
        $this->db->where('transaction_register.member_id', $user_id);
        $this->db->where('transaction_register.transaction_register_id', $inv);
        $query = $this->db->get();
        return $query;
    }

}