<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login_register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('admin');
    }

    function index()
    {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign in your account";
            $this->load->view('adminPanel/index', $data);
        } else {
            $uname = $this->security->xss_clean($this->input->post('uname'));
            $pass = $this->security->xss_clean($this->input->post('pass'));
            $check = $this->admin->check($uname, $pass);

            if ($check) {
                $_SESSION = [
                    'id' => $check->id,
                    'uname' => $check->uname,
                    'role' => $check->role,
                    'authenticated' => TRUE
                ];
                $role = $_SESSION['role'];
                redirect(base_url('dashboard_admin'));
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url().'login_register/index');
            }
        }
    }
    function logout()
    {
        unset($_SESSION['id']);
        $this->index();
    }
    function district(){

        $state         = $_POST['id'];
        $data['district'] = $this->admin->district_ajax($state);
        $this->load->view('adminPanel/district_ajax',$data);
    }
    function location(){

        $district         = $_POST['id'];
        $data['location'] = $this->admin->location_ajax($district);
        $this->load->view('adminPanel/location_ajax',$data);
    }

   

}
?>