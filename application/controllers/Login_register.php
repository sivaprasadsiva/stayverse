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
        $this->load->model('homestay_model','hm');
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
                 $_SESSION['admin_o'] = [
                    'id' => $check->id,
                    'uname' => $check->uname,
                    'pass'  => $check->password,
                    'role' => $check->role,
                    'authenticated' => TRUE
                ];
                $role = $_SESSION['admin_o']['role'];
                redirect(base_url('dashboard_admin'));
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url().'loginPage');
            }
        }
    }
    function logout()
    {
        unset($_SESSION['admin_o']);
        redirect(base_url().'loginPage');
    }
    function homestay_login()
    {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign in your account";
            $this->load->view('homestay/index', $data);
        } else {
            $uname = $this->security->xss_clean($this->input->post('uname'));
            $pass = $this->security->xss_clean($this->input->post('pass'));
            $check = $this->hm->check($uname, $pass);

            if ($check) {
                $_SESSION['homestay'] = [
                    'id' => $check->id,
                    'name' => $check->name,
                    'uname' => $check->email,
                    'pass'  => $check->password,
                    'authenticated' => TRUE
                ];
                redirect(base_url('homestay'));
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url().'loginPage_homestay');
            }
        }
    }
    function homestay_logout()
    {
        unset($_SESSION['homestay']);
        redirect(base_url().'loginPage_homestay');
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
    function company_name(){

        $type             = $_POST['id'];
        $data['company_name'] = $this->admin->company_name_ajax($type);
        $this->load->view('adminPanel/company_name_ajax',$data);
    }

   

}
?>