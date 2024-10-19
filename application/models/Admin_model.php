<?php
class Admin_model extends CI_Model
{

    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function search_users($query)
    {
        $this->db->like('name', $query);
        $this->db->or_like('id_number', $query);
        $this->db->or_like('email', $query);
        $this->db->or_like('status', $query);
        $query = $this->db->get('users'); // or your specific table name
        return $query->result();
    }

    public function search_applicants($query)
    {
        $this->db->like('firstname', $query);
        $this->db->or_like('middlename', $query);
        $this->db->or_like('lastname', $query);
        $this->db->or_like('id_number', $query);
        $this->db->or_like('email', $query);
        $this->db->or_like('status', $query);

        $query = $this->db->get('applicants'); // Targeting the applicants table
        return $query->result();
    }


    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    public function delete_user($user_id)
    {
        $this->db->where('id', $user_id);
        return $this->db->delete('users');
    }

    public function count_scholarship_coordinators()
    {
        $this->db->where('usertype', 'Scholarship Coordinator');
        return $this->db->count_all_results('users');
    }

    public function update_app_status($applicant_no, $new_status)
    {
        $this->db->set('account_status', $new_status)
            ->where('account_no', $applicant_no)
            ->update('applicants');
    }

    public function get_all_twcs()
    {
        $this->db->where('usertype', 'TWC');
        $query = $this->db->get('users');
        return $query->result();
    }
    public function count_twc()
    {
        $this->db->where('usertype', 'TWC');
        return $this->db->count_all_results('users');
    }
    public function get_user_by_credentials($id_number, $password)
    {
        $this->db->where('id_number', $id_number);
        $this->db->where('password', $password);
        $query = $this->db->get('users');  // Assume your table is called 'users'

        // Return the user data if found, else return false
        return $query->row();
    }

    public function count_accepted_applicants()
    {
        $this->db->where('status', 'accepted');
        return $this->db->count_all_results('applicants');
    }

    public function get_pending_applicants()
    {
        $this->db->where('status', 'pending');
        $query = $this->db->get('applicants');
        return $query->result();
    }

    public function update_applicant_status($id, $status)
    {
        $this->db->where('account_no', $id);
        return $this->db->update('applicants', ['status' => $status]);
    }

    public function get_accepted_applicants()
    {
        $this->db->where('status', 'accepted');
        $query = $this->db->get('applicants');
        return $query->result();
    }

    public function get_applicant_by_id($id)
    {
        $this->db->where('account_no', $id);
        $query = $this->db->get('applicants');
        return $query->row();
    }

    public function get_applicant_by_id_number($id_number)
    {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('applicants');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_scholarship_program($data)
    {
        return $this->db->insert('scholarship_programs', $data);
    }

    public function get_applicant_by_email($email)
    {
        return $this->db->get_where('applicants', ['email' => $email])->row();
    }

    public function update_password($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->update('applicants', ['password' => $password]);
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }


    public function update_password_user($email, $password)
    {
        $data = [
            'password' => $password
        ];
        $this->db->where('email', $email);
        return $this->db->update('users', $data);
    }

    public function get_user_by_id_number($id_number)
{
    return $this->db->get_where('users', ['id_number' => $id_number])->row();
}

    public function get_user_by_id($id_number)
    {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return null;
    }
}
