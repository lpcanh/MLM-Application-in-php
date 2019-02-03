<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

    private $sponsorData;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['MemberModel']);
        $this->load->model(['UserModel']);
        $this->load->model(['OuthModel']);
    }

    public function register_view() 
    {

        if (isset($_GET['sponsor'])) 
        {
            $sponsor = $_GET['sponsor'];
            $query = $this->UserModel->IfExistUsername($sponsor);

            if ($query == false) 
            {
                return $this->load->view('errors/404');
            }

            $this->sponsorData = $query;
            
            return $this->load->view('register/register');
        } 
        else
        {
            return $this->load->view('errors/404');
        }

        // return $this->load->view('register/register');
    }
    
    public function register()
    {
        $response = [
            'status' => 1,
            'data' => []
        ];

        $post = $this->input->post();

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[3]|is_unique[users.username]',
            array(
                'required' => '%s is required',
                'min_length' => '%s must be at least 3 characters',
                'is_unique' => '%s is already exist'
            )
        );

        $this->form_validation->set_rules(
            'fullname',
            'Fullname',
            'trim|required|min_length[3]',
            array(
                'required' => '%s is required',
                'min_length' => '%s must be at least 3 characters'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[6]',
            array(
                'required' => '%s is required',
                'min_length' => '%s must be at least 6 characters'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|is_unique[users.email]',
            array(
                'required' => '%s is required',
                'valid_email' => '%s is invalid',
                'is_unique' => '%s is already exist'
            )
        );

        if ($this->form_validation->run() == FALSE)
        {
            $errors = [
                'username' => form_error('username'),
                'fullname' => form_error('fullname'),
                'email' => form_error('email'),
                'password' => form_error('password'),
            ];

            $response['status'] = 0;
            $response['data'] = $errors;

            echo json_encode($response);
        }
        else
        {
            $data = [
                'username' => $post['username'],
                'name'     => $post['fullname'],
                'email'    => $post['password'],
                'password' => $post['password'],
                'role' => 'Customer'
            ];

            $query = $this->UserModel->AddMember($data);

            if ($query != false) {
                $this->MemberModel->AddMemberLog([
                    'id' => $query,
                    'name' => $data['name'],
                    'sponsor_id' => $this->sponsorData['id']
                ]);
            }

            $response["data"] = [
                'username' => $post['username'],
                'name'     => $post['fullname'],
                'email'    => $post['password']
            ];
            echo json_encode($response);
        }

    }
}