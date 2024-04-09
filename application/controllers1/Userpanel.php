<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Userpanel extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('user');
        date_default_timezone_set('Asia/Kolkata');
                            
    }
    function index2()
    {
        redirect(base_url('index'));
    }
    function index()
    {
        if (isset($_POST['submit'])) {

            $time = strtotime($_POST['checkin']);
            $time1 = strtotime($_POST['checkout']);
            $now = strtotime(date('y-m-d'));
            if($time >= $now && $time1 >= $time){
                    $_SESSION['userdetails'] = [
                        'location' => $_POST['location'],
                        'lid' => $_POST['lid'],
                        'checkin' => $_POST['checkin'],
                        'checkout' => $_POST['checkout'],
                        'guests' => $_POST['guests'],
                    ];
                    
                    
                    redirect(base_url() . 'userpanel/homestay_user');
            }else{
                echo "<script>alert('Select date properly');</script>";
            }
        } elseif (isset($_POST['carrent'])) {

            $time = strtotime($_POST['pickup']);
            $time1 = strtotime($_POST['dropof']);
            $now = strtotime(date('y-m-d'));
            if($time >= $now && $time1 >= $time){
                $_SESSION['carrent'] = [
                    'location' => $_POST['location'],
                    'time' => $_POST['time'],
                    'pickup' => $_POST['pickup'],
                    'dropof' => $_POST['dropof'],
                ];
                redirect(base_url() . 'userpanel/carrent');
            }else{
                echo "<script>alert('Select date properly');</script>";
            }
        } elseif (isset($_POST['bikerent'])) {

             $time = strtotime($_POST['pickup']);
            $time1 = strtotime($_POST['dropof']);
            $now = strtotime(date('y-m-d'));
            if($time >= $now && $time1 >= $time){

                    $_SESSION['bikerent'] = [
                        'location' => $_POST['location'],
                        'time' => $_POST['time'],
                        'pickup' => $_POST['pickup'],
                        'dropof' => $_POST['dropof'],
                    ];
                    redirect(base_url() . 'userpanel/bikerent');
                }else{
                echo "<script>alert('Select date properly');</script>";
            }
        } 
            if (!empty($_SESSION['userdetails']['location'])) {
                $data['place'] = $_SESSION['userdetails']['lid'];
                $data['checkin'] = $_SESSION['userdetails']['checkin'];
                $data['checkout'] = $_SESSION['userdetails']['checkout'];
            }
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $data['state'] = $this->user->state_view();
            $data['district'] = $this->user->district_view();
            $data['location'] = $this->user->location_view();
            $data['wonderland'] = $this->user->wonderland();
            $data['events'] = $this->user->events_view();
            $data['slide'] = $this->user->slider();
            $this->load->view('user/header', $data);
            $this->load->view('user/index');
            $this->load->view('user/footer');
        
    }
    function login()
    {
        if (isset($_POST['submit'])) {
            $login_user = $this->user->login_user($_POST['email'], $_POST['password']);
            if ($login_user) {
                $_SESSION['user']['id'] = $login_user->id;
                $_SESSION['user']['name'] = $login_user->first_name . ' ' . $login_user->last_name;
                redirect(base_url() . 'index');
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url() . 'userpanel/login');
            }

        } else {
            $data['login'] = 3;

            $this->load->view('user/header', $data);
            $this->load->view('user/sign-in');
            $this->load->view('user/footer');
        }
    }
    function homestay($id)
    {
        if (!empty($_SESSION['userdetails'])) {
            $data['checkin'] = $_SESSION['userdetails']['checkin'];
            $data['checkout'] = $_SESSION['userdetails']['checkout'];
            $data['guests'] = $_SESSION['userdetails']['guests'];

            if (!empty($_SESSION['rooms'])) {
                $data['rooms_session'] = $_SESSION['rooms'];
            }
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $data['checking'] = $this->user->fetch_all('SELECT checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where b.homestay_id ='.$id);
            $data['rules'] = $this->user->homestay_rules_view_id($id);
            $data['gallery'] = $this->user->gallery_view($id);
            $data['rooms'] = $this->user->rooms_view($id);
            $data['roomtype'] = $this->user->rooms_type_view($id);
            $homestay = $this->user->homestay_view_id($id);
            $data['name'] = $homestay[0]['name'];
            $data['description'] = $homestay[0]['description'];
            $data['id'] = $id;
            $data['review'] = $this->user->review_view($id);
            $data['review_count'] = $this->user->review_count($id);
            $this->load->view('user/header', $data);
            $this->load->view('user/hotel-details');
            $this->load->view('user/footer');
        } else {
            echo "<script>alert('Choose correct location');</script>";
            $this->index();
        }
    }
    function location()
    {
        $n = $state = $sid = 0;
        $search = $this->input->post('search');
        $result = $this->user->location_search($search);
        if ($result) {
            foreach ($result as $val) {
                echo '<a href="#" style="color:black;" class="result" data-id=' . $val['lid'] . ' data-value=' . $val['location'] . '><b>' . $val['location'] . ',' . $val['district'] . ',' . $val['state'] . '
            </b></a><br><br>';
                if ($val['state_id']) {
                    $n = 1;
                    $state = $val['state'];
                    $sid = $val['state_id'];
                }
            }
            if ($n == 1) {
                echo '<a href="#" style="color:black;" class="result" data-id=' . $sid . ' data-value=' . $state . '><b> All Locations in ' . $state . '</b></a><br><br>';
            }
        } else {
            echo "No result found";
        }
    }
    function location1()
    {
        $search = $this->input->post('search');
        $result = $this->user->location_search($search);
        if ($result) {
            foreach ($result as $val) {
                echo '<a href="#" style="color:black;" class="result" data-id=' . $val['lid'] . ' data-value=' . $val['location'] . '><b>' . $val['location'] . ',' . $val['district'] . ',' . $val['state'] . '
            </b></a><br><br>';
            }
        } else {
            echo "No result found";
        }
    }
    function homestay_user()
    {
        if (!empty($_SESSION['userdetails']['location'])) {
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $locations = $_SESSION['userdetails']['location'];
            $lid = $_SESSION['userdetails']['lid'];

            $state = $this->user->state_view();
            $district = $this->user->district_view();
            $loc = $this->user->location_view();

            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/homestay_user';
            $config['per_page'] = 4;

            if ($locations && $lid) {
                foreach ($loc as $l) {
                    if ($l['lid'] == $locations && $l['location'] == $lid) {
                        $config['total_rows'] = $this->user->getTotalRows_location($locations);
                        $config['uri_segment'] = 3;
                        $config['use_page_numbers'] = TRUE;
                        $this->pagination->initialize($config);
                        if ($this->uri->segment(3) != null) {
                            $page = $this->uri->segment(3);
                            if ($page > 1) {
                                $page = $config['per_page'] * ($page - 1);
                            }
                        } else {
                            $page = 0;
                        }
                        $data['location'] = $lid;
                        $data['link'] = $this->pagination->create_links();
                        $data['homestay'] = $this->user->homestay_view_location($locations, $config['per_page'], $page);
                        $data['homestay1'] = $this->user->homestay_view_location1($locations);


                    }
                }
                foreach ($state as $s) {
                    if ($s['state'] == $lid && $s['id'] == $locations) {

                        $config['total_rows'] = $this->user->getTotalRows_state($locations);
                        $config['uri_segment'] = 3;
                        $config['use_page_numbers'] = TRUE;
                        $this->pagination->initialize($config);
                        if ($this->uri->segment(3) != null) {
                            $page = $this->uri->segment(3);

                            if ($page > 1) {
                                $page = $config['per_page'] * ($page - 1);
                            }
                        } else {
                            $page = 0;
                        }
                        $data['location'] = $lid;
                        $data['link'] = $this->pagination->create_links();
                        $data['homestay'] = $this->user->homestay_view_location_state($locations, $config['per_page'], $page);
                        $data['homestay1'] = $this->user->homestay_view_location_state1($locations);

                    }
                }
            }

            $data['rules'] = $this->user->homerules_view();
            $data['category'] = $this->user->category_view();
            $data['guests'] = $this->user->guestlove_view();
            $data['roomtypes'] = $this->user->roomtype_view();
            $data['rooms'] = $this->user->rooms();
            $data['range'] = $this->user->pricerange_view();
            $this->load->view('user/header', $data);
            $this->load->view('user/hotel-list2');
            $this->load->view('user/footer');

        } else {
            echo "<script>alert('Choose correct location');</script>";
            $this->index();
        }
    }

    function homestay_booking_confirm($id)
    {
        if (!empty($_SESSION['userdetails'])) {
            if (!empty($_SESSION['rooms'])) {
                $data['login'] = 0;
                if (!empty($_SESSION['user']['id'])) {
                    $data['login'] = 1;
                }
                $data['checkin'] = $_SESSION['userdetails']['checkin'];
                $data['checkout'] = $_SESSION['userdetails']['checkout'];
                $data['guests'] = $_SESSION['userdetails']['guests'];

                if (!empty($_SESSION['rooms'])) {
                    $data['rooms_session'] = $_SESSION['rooms'];
                }
                $data['code'] = 0;
                if (!empty($_SESSION['coupon'])) {
                    $code = $_SESSION['coupon'];

                    $coupon = $this->user->coupon($code);
                    if ($coupon) {
                        $data['code'] = 1;
                        $data['percentage'] = $coupon[0]['percentage'];
                        unset($_SESSION['coupon']);
                    }
                }

                $data['rules'] = $this->user->homestay_rules_view_id($id);
                $data['gallery'] = $this->user->gallery_view_limit($id);
                $data['rooms'] = $this->user->rooms_view($id);
                $data['roomtype'] = $this->user->rooms_type_view($id);
                $homestay = $this->user->homestay_view_id($id);
                $data['name'] = $homestay[0]['name'];
                $data['description'] = $homestay[0]['description'];
                $data['id'] = $id;
                $data['state'] = $homestay[0]['state'];
                $data['district'] = $homestay[0]['district'];
                $data['location'] = $homestay[0]['location'];
                $this->load->view('user/header', $data);
                $this->load->view('user/hotel-details-confirm');
                $this->load->view('user/footer');
            } else {
                echo "<script>alert('Please select room')</script>";

                $this->homestay($id);
            }
        } else {
            echo "<script>alert('you don't pick any location')</script>";
            $this->index();
        }
    }

    function signup_page1()
    {
        if (isset($_POST['submit'])) {
            $email = $this->user->email_duplicate($_POST['email']);
            if($email){
                $this->session->set_flashdata('email','<div class="alert alert-danger">The email already exists.</div>');
                $this->session->set_flashdata('fname',$_POST['fname']);
                $this->session->set_flashdata('lname',$_POST['lname']);
                $this->session->set_flashdata('emailid',$_POST['email']);
                $this->session->set_flashdata('referral',$_POST['referral']);
                // $this->session->set_flashdata('phone',$_POST['phone']);
            }else{
                $_SESSION['userlogin'] = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'referral' => $_POST['referral'],
            ];
            redirect(base_url() . 'userpanel/signup_page2');
            }
            
        }
        $data['login'] = 3;
        $data['phone'] = $_SESSION['otp']['phone'];
        $this->load->view('user/header', $data);
        $this->load->view('user/signup');
        $this->load->view('user/footer');


    }
    function signup_page2()
    {
        if (!empty($_SESSION['userlogin'])) {
            if (isset($_POST['submit'])) {
                $data = [
                    'first_name' => $_SESSION['userlogin']['fname'],
                    'last_name' => $_SESSION['userlogin']['lname'],
                    'email' => $_SESSION['userlogin']['email'],
                    'phone' => $_SESSION['userlogin']['phone'],
                    'referral_code' => $_SESSION['userlogin']['referral'],
                    'password' => $_POST['password'],
                ];
                $this->user->userLogin($data);
                redirect(base_url() . 'userpanel/login');

            } else {
                $data['login'] = 3;
                $this->load->view('user/header', $data);
                $this->load->view('user/password');
                $this->load->view('user/footer');
            }
        }
    }

    
    function filter()
    {

        if (!empty($_SESSION['userdetails']['location'])) {


            $locations = $_SESSION['userdetails']['location'];
            $lid = $_SESSION['userdetails']['lid'];

            $state = $this->user->state_view();
            $loc = $this->user->location_view();

            $category = $this->input->post('category');
            $roomtype = $this->input->post('roomtype');
            $services = $this->input->post('services');
            $price = $this->input->post('price');
            $rules = $this->input->post('rules');

            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/filter';
            $config['per_page'] = 4;

            if ($locations && $lid) {
                foreach ($loc as $l) {
                    if ($l['lid'] == $locations && $l['location'] == $lid) {


                        $config['total_rows'] = $this->user->getTotalRows_location_filter($locations, $category, $roomtype, $services, $price, $rules);
                        $config['uri_segment'] = 3;
                        $config['use_page_numbers'] = TRUE;
                        $this->pagination->initialize($config);
                        if ($this->uri->segment(3) != null) {
                            $page = $this->uri->segment(3);
                            if ($page > 1) {
                                $page = $config['per_page'] * ($page - 1);
                            }
                        } else {
                            $page = 0;
                        }
                        $data['location'] = $lid;
                        $data['link'] = $this->pagination->create_links();
                        $data['homestay'] = $this->user->filter_data_location($locations, $config['per_page'], $page, $category, $roomtype, $services, $price, $rules);


                    }
                }
                foreach ($state as $s) {
                    if ($s['state'] == $lid && $s['id'] == $locations) {


                        $config['total_rows'] = $this->user->getTotalRows_state_filter($locations, $category, $roomtype, $services, $price, $rules);
                        $config['uri_segment'] = 3;
                        $config['use_page_numbers'] = TRUE;
                        $this->pagination->initialize($config);
                        if ($this->uri->segment(3) != null) {
                            $page = $this->uri->segment(3);

                            if ($page > 1) {
                                $page = $config['per_page'] * ($page - 1);
                            }
                        } else {
                            $page = 0;
                        }
                        $data['location'] = $lid;
                        $data['link'] = $this->pagination->create_links();
                        $data['homestay'] = $this->user->filter_data_state($locations, $config['per_page'], $page, $category, $roomtype, $services, $price, $rules);

                    }
                }
            }
            $data['rooms'] = $this->user->rooms();
            $this->load->view('user/filter', $data);

        } else {
            echo '<p>Please select the location</p>';
        }

    }
    function select_room()
    {
        $id = $this->input->post('id');
        if (!empty($_SESSION['rooms'])) {
            $check = array_column($_SESSION['rooms'], 'rid');
            if (in_array($id, $check)) {
                echo "already exists";
            } else {
                $_SESSION['rooms'][] = [
                    'rid' => $id
                ];
                print_r($_SESSION['rooms']);
            }

        } else {
            $_SESSION['rooms'][] = [
                'rid' => $id
            ];
            print_r($_SESSION['rooms']);
        }

    }
    function select_remove()
    {
        $id = $this->input->post('id');

        foreach ($_SESSION['rooms'] as $key => $value) {
            if ($value['rid'] == $id) {

                unset($_SESSION['rooms'][$key]);

            }
        }
        print_r($_SESSION['rooms']);
    }
    function payment_mode()
    {
        $payment = $this->input->post('id');
        $homestay = $this->input->post('homestay');
        $price = $this->input->post('price');
        $_SESSION['payment_mode']['payment'] = $payment;
        $_SESSION['payment_mode']['homestay'] = $homestay;
        $_SESSION['payment_mode']['price'] = $price;
    }
    function payment()
    {
        if (!empty($_SESSION['user']['id'])) {

            $data = [
                'homestay_id' => $_SESSION['payment_mode']['homestay'],
                'user_id' => $_SESSION['user']['id'],
                'checkin' => $_SESSION['userdetails']['checkin'],
                'checkout' => $_SESSION['userdetails']['checkout'],
                'payment_mode' => $_SESSION['payment_mode']['payment'],
                'guests' => $_SESSION['userdetails']['guests'],
                'price' => $_SESSION['payment_mode']['price'],
                'status' => 1,
            ];
            $last = $this->user->booking($data);
            foreach ($_SESSION['rooms'] as $rm) {
                $room_insert = [

                    'booking_id' => $last,
                    'room_id' => $rm['rid'],
                ];
                $this->user->book_room($room_insert);
            }
            // redirect(base_url() . 'userpanel/booking');

            $booking_id = $last;


            redirect(base_url().'PHP_Kit/CUSTOM_CHECKOUT_FORM_KIT/dataFrom.php?booking='.$booking_id);


        } else {
            redirect(base_url() . 'userpanel/login_confirm_booking');
        }

    }

    function booking()
    {
        if($_SESSION['user']['id']){

        $data['login'] = 1;
        unset($_SESSION['payment_mode']);
        unset($_SESSION['userdetails']);
        unset($_SESSION['rooms']);
        $data['booking'] = $this->user->booking_view_id($_SESSION['user']['id']);
        $data['rooms'] = $this->user->booking_rooms_view();
        $this->load->view('user/header', $data);
        $this->load->view('user/booking');
        $this->load->view('user/footer');
    }else{
        redirect(base_url().'userpanel/login');
    }
    }
    function booking_vehicle()
    {
        if($_SESSION['user']['id']){

        $data['login'] = 1;
        unset($_SESSION['carrent']);
        unset($_SESSION['bikerent']);
        $data['booking'] = $this->user->vehicle_booking_view_id($_SESSION['user']['id']);
        $this->load->view('user/header', $data);
        $this->load->view('user/booking_vehicle');
        $this->load->view('user/footer');
    }else{
        redirect(base_url().'userpanel/login');
    }
    }


    function login_confirm_booking()
    {
        if (isset($_POST['submit'])) {
            $login_user = $this->user->login_user($_POST['email'], $_POST['password']);
            if ($login_user) {
                $_SESSION['user']['id'] = $login_user->id;
                $_SESSION['user']['name'] = $login_user->first_name . ' ' . $login_user->last_name;
                redirect(base_url() . 'userpanel/homestay_booking_confirm/' . $_SESSION['payment_mode']['homestay']);
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url() . 'userpanel/login_confirm_booking');
            }

        } else {
            $data['login'] = 3;
            $data['page'] = 1;
            $data['sep'] = 0;
            $data['vehicle_id'] = 0;
            $this->load->view('user/header', $data);
            $this->load->view('user/sign-in-confirm-booking');
            $this->load->view('user/footer');
        }
    }
    function user_logout()
    {
        unset($_SESSION['user']);
        redirect(base_url() . 'index');
    }

    function carrent()
    {
        if (!empty($_SESSION['carrent']['location'])) {
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $locations = $_SESSION['carrent']['location'];


            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/carrent';
            $config['per_page'] = 4;

            $config['total_rows'] = $this->user->getTotalRows_cars();
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            if ($this->uri->segment(3) != null) {
                $page = $this->uri->segment(3);
                if ($page > 1) {
                    $page = $config['per_page'] * ($page - 1);
                }
            } else {
                $page = 0;
            }
            $data['link'] = $this->pagination->create_links();
            $data['cars'] = $this->user->cars($config['per_page'], $page);
            $data['cars_f'] = $this->user->cars_all();
            $data['company'] = $this->user->company_car();

            $this->load->view('user/header', $data);
            $this->load->view('user/carrent');
            $this->load->view('user/footer');
        } else {
            echo "<script>alert('Choose correct location');</script>";
            redirect(base_url() . 'index');
        }

    }
    function vehicle_booking($id,$sep){
            // if (!empty($_SESSION['user']['id'])) {
                $vehicle = $this->user->vehicle_view_id($id);
                $price = $vehicle[0]['rental_price'];
                if($sep == 1){
                     $data = [
                'vehicle_id' => $id,
                'user_id' => $_SESSION['user']['id'],
                'pick_date' => $_SESSION['carrent']['pickup'],
                'drop_date' => $_SESSION['carrent']['dropof'],
                'location' => $_SESSION['carrent']['location'],
                'time' => $_SESSION['carrent']['time'],
                'price' => $price,
                'status' => 1,
            ];
                }else{
                     $data = [
                'vehicle_id' => $id,
                'user_id' => $_SESSION['user']['id'],
                'pick_date' => $_SESSION['bikerent']['pickup'],
                'drop_date' => $_SESSION['bikerent']['dropof'],
                'location' => $_SESSION['bikerent']['location'],
                'time' => $_SESSION['bikerent']['time'],
                'price' => $price,
                'status' => 1,
            ];
                }
           
            $last = $this->user->vehicle_booking($data);
            redirect(base_url().'PHP_Kit/CUSTOM_CHECKOUT_FORM_KIT/dataFrom.php?vehicle_booking='.$last);
            // redirect(base_url().'userpanel/booking_vehicle');

        // } else {
        //     redirect(base_url().'userpanel/login_vehicle_booking/'.$id.'/'.$sep);
        // }
    }
     function login_vehicle_booking($vehicle_id,$sep){
         if (isset($_POST['submit'])) {
            $login_user = $this->user->login_user($_POST['email'], $_POST['password']);
            if ($login_user) {
                $_SESSION['user']['id'] = $login_user->id;
                $_SESSION['user']['name'] = $login_user->first_name . ' ' . $login_user->last_name;
                redirect(base_url().'userpanel/vehicle_booking/'.$vehicle_id.'/'.$sep);
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url().'userpanel/login_vehicle_booking/'.$vehicle_id.'/'.$sep);
            }

        } else {
            $data['login'] = 3;
            $data['page'] = 2;
            $data['sep'] = $sep;
            $data['vehicle_id'] = $vehicle_id;
            $this->load->view('user/header', $data);
            $this->load->view('user/sign-in-confirm-booking');
            $this->load->view('user/footer');
        }
     }


     function signup_page($id,$vehicle_id,$sep)
    {
        if (isset($_POST['submit'])) {
            $email = $this->user->email_duplicate($_POST['email']);
            if($email){
                $this->session->set_flashdata('email','<div class="alert alert-danger">The email already exists.</div>');
                $this->session->set_flashdata('fname',$_POST['fname']);
                $this->session->set_flashdata('lname',$_POST['lname']);
                $this->session->set_flashdata('emailid',$_POST['email']);
                $this->session->set_flashdata('referral',$_POST['referral']);
                // $this->session->set_flashdata('phone',$_POST['phone']);
            }else{
            $_SESSION['userlogin'] = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'referral' => $_POST['referral'],
                // 'phone' => $_POST['phone'],
            ];
            redirect(base_url() . 'userpanel/signup_page3/'.$id.'/'.$vehicle_id.'/'.$sep);
        }
        }
        $data['login'] = 3;
        $data['id']    = $id;
        $data['sep']   = $sep;
        $data['vehicle_id']   = $vehicle_id;
        $data['page']   = 1;
        $data['phone'] = $_SESSION['otp']['phone'];
        $this->load->view('user/header', $data);
        $this->load->view('user/signup');
        $this->load->view('user/footer');


    }
    function signup_page3($id,$vehicle_id,$sep)
    {
        if (!empty($_SESSION['userlogin'])) {
            if (isset($_POST['submit'])) {
                $data = [
                    'first_name' => $_SESSION['userlogin']['fname'],
                    'last_name' => $_SESSION['userlogin']['lname'],
                    'email' => $_SESSION['userlogin']['email'],
                    'referral_code' => $_SESSION['userlogin']['referral'],
                    'password' => $_POST['password'],
                    'phone' => $_SESSION['userlogin']['phone'],
                ];
                $this->user->userLogin($data);
                if($id == 1)redirect(base_url() . 'userpanel/login_confirm_booking');
                if($id == 2)redirect(base_url() . 'userpanel/login_vehicle_booking/'.$vehicle_id.'/'.$sep);

            } else {
                $data['login'] = 3;
                $data['id']    = $id;
                $data['sep']   = $sep;
                $data['vehicle_id']   = $vehicle_id;
                $this->load->view('user/header', $data);
                $this->load->view('user/password');
                $this->load->view('user/footer');
            }
        }
    }


    function bikerent()
    {
        if (!empty($_SESSION['bikerent']['location'])) {
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $locations = $_SESSION['bikerent']['location'];


            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/bikerent';
            $config['per_page'] = 4;

            $config['total_rows'] = $this->user->getTotalRows_bike();
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            if ($this->uri->segment(3) != null) {
                $page = $this->uri->segment(3);
                if ($page > 1) {
                    $page = $config['per_page'] * ($page - 1);
                }
            } else {
                $page = 0;
            }
            $data['link'] = $this->pagination->create_links();
            $data['bikes'] = $this->user->bike($config['per_page'], $page);
            $data['bike_f'] = $this->user->bikes_all();
            $data['company'] = $this->user->company_bike();

            $this->load->view('user/header', $data);
            $this->load->view('user/bikerent');
            $this->load->view('user/footer');
        } else {
            echo "<script>alert('Choose correct location');</script>";
            redirect(base_url() . 'index');
        }

    }

    function filter_cars()
    {
        if (!empty($_SESSION['carrent']['location'])) {


            $locations = $_SESSION['carrent']['location'];

            $cars = $this->input->post('cars');
            $company = $this->input->post('company');

            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/filter_cars';
            $config['per_page'] = 4;


            $config['total_rows'] = $this->user->getTotalRows_car($company, $cars);
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            if ($this->uri->segment(3) != null) {
                $page = $this->uri->segment(3);
                if ($page > 1) {
                    $page = $config['per_page'] * ($page - 1);
                }
            } else {
                $page = 0;
            }
            $data['link'] = $this->pagination->create_links();
            $data['cars'] = $this->user->filter_cars($config['per_page'], $page, $company, $cars);
            $this->load->view('user/filter_car', $data);
        } else {
            echo "<script>alert('Choose correct location');</script>";
            redirect(base_url() . 'index');
        }

    }

    function filter_bike()
    {
        if (!empty($_SESSION['bikerent']['location'])) {


            $locations = $_SESSION['bikerent']['location'];

            $bike = $this->input->post('bike');
            $company = $this->input->post('company');

            $this->load->library('pagination');

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li ><a style="background-color:blue;">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '«';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '»';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['base_url'] = base_url() . 'userpanel/filter_bike';
            $config['per_page'] = 4;


            $config['total_rows'] = $this->user->getTotalRows_bikes($company, $bike);
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            if ($this->uri->segment(3) != null) {
                $page = $this->uri->segment(3);
                if ($page > 1) {
                    $page = $config['per_page'] * ($page - 1);
                }
            } else {
                $page = 0;
            }
            $data['link'] = $this->pagination->create_links();
            $data['bikes'] = $this->user->filter_bike($config['per_page'], $page, $company, $bike);
            $this->load->view('user/filter_bike', $data);
        } else {
            echo "<script>alert('Choose correct location');</script>";
            redirect(base_url() . 'index');
        }

    }
    function events($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $events = $this->user->events_view_id($id);
        $data['name'] = $events[0]['name'];
        $data['details'] = $events[0]['details'];
        $data['image'] = $events[0]['photo'];

        $this->load->view('user/header', $data);
        $this->load->view('user/view-events');
        $this->load->view('user/footer');
    }
    function wonderland($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $wonderland = $this->user->wonderland_view_id($id);
        $data['name'] = $wonderland[0]['name'];
        $data['details'] = $wonderland[0]['description'];
        $data['image'] = $wonderland[0]['image'];

        $this->load->view('user/header', $data);
        $this->load->view('user/view-wonderland');
        $this->load->view('user/footer');
    }
    function review_add()
    {
        $data = [
            'email' => $_POST['email'],
            'comment' => $_POST['comment'],
            'name' => $_POST['name'],
            'homestay_id' => $_POST['homestay'],
        ];
        $this->user->review($data);
    }
    function allreview($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $data['review'] = $this->user->allreview($id);
        $this->load->view('user/header', $data);
        $this->load->view('user/review');
        $this->load->view('user/footer');
    }
    function coupon($id)
    {
        $_SESSION['coupon'] = $_POST['code'];
        redirect(base_url() . 'userpanel/homestay_booking_confirm/' . $id);
    }
    function contact()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message']
            ];
            $this->user->contact($data);
            redirect(base_url() . 'userpanel/contact');
        } else {
            $data['login'] = 0;
            if (!empty($_SESSION['user']['id'])) {
                $data['login'] = 1;
            }
            $this->load->view('user/header', $data);
            $this->load->view('user/contact');
            $this->load->view('user/footer');
        }

    }
    function terms()
    {

        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $this->load->view('user/header', $data);
        $this->load->view('user/terms&onditions');
        $this->load->view('user/footer');
    }

    function transaction()
    {
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;

            $this->load->view('user/header', $data);
            $this->load->view('user/transaction');
            $this->load->view('user/footer');
        }
    }
    function refund()
    {

        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $this->load->view('user/header', $data);
        $this->load->view('user/refund&cancellation');
        $this->load->view('user/footer');
    }
    function passwordChange()
    {
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
            if (isset($_POST['submit'])) {

                $data = ['password' => $_POST['confirm'],];
                $this->user->user_update($data, $_SESSION['user']['id']);
                redirect(base_url() . 'userpanel/personalInfo');
            } else {
                $this->load->view('user/header', $data);
                $this->load->view('user/password-change');
                $this->load->view('user/footer');
            }
        }
    }
    function personalInfo()
    {
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
            $user = $this->user->user_view($_SESSION['user']['id']);
            $data['name'] = $user[0]['first_name'] . ' ' . $user[0]['last_name'];
            $data['email'] = $user[0]['email'];
            $this->load->view('user/header', $data);
            $this->load->view('user/personal-information');
            $this->load->view('user/footer');
        }
    }
    function notification()
    {
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;

            $this->load->view('user/header', $data);
            $this->load->view('user/notification');
            $this->load->view('user/footer');
        }
    }
    function privacy()
    {

        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $this->load->view('user/header', $data);
        $this->load->view('user/privacy-policy');
        $this->load->view('user/footer');
    }
    function passwordCheck()
    {

        $user = $this->user->passwordCheck($_SESSION['user']['id'], $_POST['password']);
        if ($user) {
            echo 1;
        } else {
            echo 2;
        }
    }
    function about()
    {
        $data['login'] = 0;
        if (!empty($_SESSION['user']['id'])) {
            $data['login'] = 1;
        }
        $this->load->view('user/header', $data);
        $this->load->view('user/about');
        $this->load->view('user/footer');

    }
    function forgotten_password($id,$vehicle_id,$sep){
        $error = NULL;
        if(isset($_POST['submit'])){
           $email = $this->user->email_duplicate($_POST['email']);
            if($email){


                $to = $_POST['email'];
                $subject = "Password";
                $message = "Your password is ".$email[0]['password'];

                $mail = new PHPMailer(true);
                //Server settings
                try{
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = '';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = '';                     //SMTP username
                        $mail->Password   = '';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('');
                         //Content
                        $mail->addAddress($to);
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $message;

                        $mail->send();
                    }catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                $error = 1;
                if($id == 1)$this->session->set_flashdata('success','The password  is sent to the <span style="color:red;">'.$_POST['email'].'</span> click here <a href="'.base_url().'userpanel/login_confirm_booking" style="color:blue;">login</a> ');
                else if($id == 2)$this->session->set_flashdata('success','The password  is sent to the <span style="color:red;">'.$_POST['email'].'</span> click here <a href="'.base_url().'userpanel/login_vehicle_booking/'.$vehicle_id.'/'.$sep.'" style="color:blue;">login</a> ');
                else $this->session->set_flashdata('success','The password  is sent to the <span style="color:red;">'.$_POST['email'].'</span> click here <a href="'.base_url().'userpanel/login" style="color:blue;">login</a> ');
            }else{
                $error = 2;
            $this->session->set_flashdata('email','The email is not exists.');
            } 
        }
        $data['login'] = 3;
        $data['error'] = $error;
        $data['page']  = $id;
        $data['vehicle_id']    = $vehicle_id;
        $data['sep']   = $sep;
        $this->load->view('user/header', $data);
        $this->load->view('user/forgotten');
        $this->load->view('user/footer');
        
        
    }
    function update_userdetails($id){
        if(strtotime($_POST['checkin']) <= strtotime($_POST['checkout'])){
            $_SESSION['userdetails']['checkin']   = $_POST['checkin'];
            $_SESSION['userdetails']['checkout']  = $_POST['checkout'];
            $_SESSION['userdetails']['guests']    = $_POST['guests'];
            unset($_SESSION['rooms']);   
            redirect(base_url('userpanel/homestay/'.$id));
        }else{

            echo "<script>alert('Select date properly');</script>";
            $this->homestay($id);
        
            }
        }
        
    function otp_sender(){
        $phone = $_POST['phone'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/'.$phone.'/AUTOGEN2/Greetings+and+Welcome',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        redirect(base_url('userpanel/otp_checker/'.$phone));

    }

    function otp_checker($phone){
        if(isset($_POST['submit'])){
                    $otp = $_POST['otp'];
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/VERIFY3/91'.$phone.'/'.$otp,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $array = json_decode($response,true);
                if($array['Status'] == 'Success'){
                    $_SESSION['otp']['phone'] = $phone;
                    
                    redirect(base_url('userpanel/signup_page1'));
                }else{
                    $this->session->set_flashdata('otp_error','<div class="alert alert-danger">Incorrect OTP.</div>');
                }

            }
                $data['login'] = 0;
                $data['phone'] = $phone;
            $this->load->view('user/header', $data);
            $this->load->view('user/otp_checker');
            $this->load->view('user/footer');
            
        
    }
    function otp(){
        $data['login'] = 0;

            $this->load->view('user/header', $data);
            $this->load->view('user/otp_generator');
            $this->load->view('user/footer');
    }

    function otp_sender1($page,$vid,$sep){
        $phone = $_POST['phone'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/'.$phone.'/AUTOGEN2/Greetings+and+Welcome',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        redirect(base_url('userpanel/otp_checker1/'.$page.'/'.$vid.'/'.$sep.'/'.$phone));

    }

    function otp_checker1($page,$vid,$sep,$phone){
        if(isset($_POST['submit'])){
                    $otp = $_POST['otp'];
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/VERIFY3/91'.$phone.'/'.$otp,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $array = json_decode($response,true);
                if($array['Status'] == 'Success'){
                    $_SESSION['otp']['phone'] = $phone;
                    redirect(base_url('userpanel/signup_page/'.$page.'/'.$vid.'/'.$sep.'/'.$phone));
                }else{
                    $this->session->set_flashdata('otp_error','<div class="alert alert-danger">Incorrect OTP.</div>');
                }

            }
                $data['login'] = 0;
                $data['phone'] = $phone;
                $data['page'] = $page;
                $data['vid']  = $vid;
                $data['sep']  = $sep;
            $this->load->view('user/header', $data);
            $this->load->view('user/otp_checker');
            $this->load->view('user/footer');
            
        
    }
    function otp1($page,$vid,$sep){
        $data['login'] = 0;
        $data['page'] = $page;
        $data['vid']  = $vid;
        $data['sep']  = $sep;
            $this->load->view('user/header', $data);
            $this->load->view('user/otp_generator');
            $this->load->view('user/footer');
    }


}