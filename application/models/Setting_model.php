<?php

class setting_model extends CI_Model {


    public function my_member($user_id)
    {
        $this->db->select('*');
        $this->db->from('ms_member');
        $this->db->where('member_id', $user_id);
        $query = $this->db->get();
        return $query;
    }

    public function update_member($data_update, $user_id)
    {
        $this->db->set($data_update);
        $this->db->where('member_id ', $user_id);
        $this->db->update('ms_member');
    }

    public function check_parq($user_id)
    {
        $this->db->select('*');
        $this->db->from('ms_member_question');
        $this->db->where('member_id', $user_id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_parq($data_update)
    {
        $this->db->insert('ms_member_question', $data_update);
    }

    public function update_parq($data_update, $user_id)
    {
        $this->db->set($data_update);
        $this->db->where('member_id ', $user_id);
        $this->db->update('ms_member_question');
    }

    public function update_process_input($user_id)
    {
        $this->db->set('member_complete', 'Y');
        $this->db->where('member_id ', $user_id);
        $this->db->update('ms_member');
    }

    public function insert_submitnightsesion($data_insert)
    {
        $this->db->insert('night_sesion', $data_insert);
    }

    public function check_night_session($nightsesiontime, $user_id)
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('night_sesion');
        $this->db->where('night_sesion_user', $user_id);
        $this->db->where('night_sesion_date', $today);
        $query = $this->db->get();
        return $query;
    }

}

?>