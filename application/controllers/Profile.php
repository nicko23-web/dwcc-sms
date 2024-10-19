<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('form_validation');
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'birthdate' => $this->input->post('birthdate'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email')
            ];
            $user_id = $this->input->post('userId');

            if ($this->Profile_model->update_user($user_id, $data)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Update failed']);
            }
        }
    }

    public function change_password()
    {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $user_id = $this->input->post('userId');
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            if ($this->Profile_model->change_password($user_id, $old_password, $new_password)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Password change failed']);
            }
        }
    }

    public function get_user_details()
    {
        $user_id = $this->input->post('id');
        $user = $this->Profile_model->get_user_by_id($user_id);

        echo json_encode([
            'name' => $user->name,
            'birthdate' => $user->birthdate,
            'gender' => $user->gender,
            'email' => $user->email
        ]);
    }

    public function update_user($id_number, $data)
    {
        $this->db->where('id_number', $id_number);
        return $this->db->update('users', $data);
    }
    
}
