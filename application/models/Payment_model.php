<?php

class payment_model extends CI_Model {

    public function get_bank_info()
    {
        $this->db->select('*');
        $this->db->from('ms_payment');
        $this->db->where('payment_active', 'Y');
        $this->db->where('payment_name Not like "CASH"');
        $query = $this->db->get();
        return $query;
    }

    public function transaction_detail($id, $category)
    {   
        if($category == 'memberclass'){
            $this->db->select('*, ms_class_package_name as class_name');
        }else{
            $this->db->select('*');
        }
        $this->db->from('transaction_register');
        $this->db->join('ms_class_package', 'transaction_register.transaction_class_month = ms_class_package.ms_class_package_id', 'left');
        $this->db->join('ms_gym_package', 'transaction_register.transaction_gym_month = ms_gym_package.ms_gym_package_id', 'left');
        $this->db->join('ms_pt_package_price', 'transaction_register.transaction_pt_id = ms_pt_package_price.ms_pt_package_id', 'left');
        $this->db->join('ms_payment', 'transaction_register.transaction_payment_id = ms_payment.payment_id', 'left');
        $this->db->where('transaction_register.transaction_register_id', $id);
        $query = $this->db->get();
        return $query;
    }
    public function updatepaymenttype($data, $transaction_id)
    {
        $this->db->where('transaction_register_id', $transaction_id);
        $update = $this->db->update('transaction_register', $data);
        return $update;
    }
    public function check_transaction_page($id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('transaction_register');
        $this->db->where('transaction_register_id', $id);
        $this->db->where('member_id', $user_id);
        $query = $this->db->get();
        return $query;
    }
}

?>