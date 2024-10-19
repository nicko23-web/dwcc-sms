<?php
class Profile_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    public function change_password($user_id, $old_password, $new_password) {
        $this->db->where('id', $user_id);
        $this->db->where('password', md5($old_password));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $this->db->where('id', $user_id);
            $this->db->update('users', ['password' => md5($new_password)]);
            return true;
        } else {
            return false;
        }
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_user($user_id) {
        return $this->db->get_where('users', ['id' => $user_id])->row();
    }
}
