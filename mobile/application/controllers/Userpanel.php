<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Userpanel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('user');
    }

    function index(){
            if(isset($_POST['submit'])){
                $_SESSION['userdetails'] = [
            'location' => $_POST['location'],
            'lid'      => $_POST['lid'],
            'checkin'  => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'guests'   => $_POST['guests'],
        ];
        redirect(base_url().'userpanel/homestay_user');
    }else{
        if(!empty($_SESSION['userdetails']['location'])){
            $data['place'] = $_SESSION['userdetails']['lid']; 
            $data['checkin'] = $_SESSION['userdetails']['checkin'];
            $data['checkout']= $_SESSION['userdetails']['checkout'];
        }
        $data['state']      = $this->user->state_view();
        $data['district']   = $this->user->district_view();
        $data['location']   = $this->user->location_view();
        $data['wonderland'] = $this->user->wonderland();
        $data['events']     = $this->user->events_view();
        $this->load->view('user/header',$data);
        $this->load->view('user/index');
        $this->load->view('user/footer');
    }
    }
    function login(){
        $this->load->view('user/header');
        $this->load->view('user/sign-in');
        $this->load->view('user/footer');
    }
    function homestay($id){
         if(!empty($_SESSION['userdetails'])){
            $data['checkin'] = $_SESSION['userdetails']['checkin'];
            $data['checkout']= $_SESSION['userdetails']['checkout'];
            $data['guests']  = $_SESSION['userdetails']['guests'];
        }
        $data['rules']       = $this->user->homestay_rules_view_id($id);
        $data['gallery']     = $this->user->gallery_view($id);
        $data['rooms']       = $this->user->rooms_view($id);
        $data['roomtype']    = $this->user->rooms_type_view($id);
         $homestay           = $this->user->homestay_view_id($id);
        $data['name']        = $homestay[0]['name'];
        $data['description'] = $homestay[0]['description'];
        $data['id']          = $id;

        $this->load->view('user/header',$data);
        $this->load->view('user/hotel-details');
        $this->load->view('user/footer');
    }
    function room_list($id){

        $data['range']     = $this->user->pricerange_view();
        $data['rules']     = $this->user->homerules_view();
        $data['category']  = $this->user->category_view();
        $data['guests']    = $this->user->guestlove_view();
        $data['roomtypes'] = $this->user->roomtype_view();
        $data['rooms']     = $this->user->rooms_view($id);

        $this->load->view('user/header',$data);
        $this->load->view('user/hotel-list');
        $this->load->view('user/footer');
    }
    function homestay_list(){
        $data['range']     = $this->user->pricerange_view();
        $data['rules']     = $this->user->homerules_view();
        $data['homestay']     = $this->user->homestay_view1();
        $data['category']  = $this->user->category_view();
        $data['guests']    = $this->user->guestlove_view();
        $data['roomtypes'] = $this->user->roomtype_view();
        $this->load->view('user/header',$data);
        $this->load->view('user/hotel-list2');
        $this->load->view('user/footer');
    }
    function location(){
        $n = $state = $sid = 0;
        $search = $this->input->post('search');
        $result = $this->user->location_search($search);
        if($result){
        foreach($result as $val){
            echo '<a href="#" style="color:black;" class="result" data-id='.$val['lid'].' data-value='.$val['location'].'><b>'.$val['location'].','.$val['district'].','.$val['state'].'
            </b></a><br><br>';
            if($val['state_id']){$n=1;
                   $state = $val['state'];
                   $sid   = $val['state_id'];
                }
                }
                if($n == 1){
                     echo '<a href="#" style="color:black;" class="result" data-id='.$sid.' data-value='.$state.'><b> All Locations in '.$state.'</b></a><br><br>';
                }
            }else{
                echo "No result found";
            }
        }
        
    function homestay_user(){
        if(!empty($_SESSION['userdetails']['location'])){
            $locations = $_SESSION['userdetails']['location'];
            $lid       = $_SESSION['userdetails']['lid'];

        $state    = $this->user->state_view();
        $district = $this->user->district_view();
        $loc      = $this->user->location_view();
        if($locations && $lid){
        foreach($loc as $l){
            if($l['lid'] == $locations && $l['location'] == $lid)
        {

            $data['homestay']  = $this->user->homestay_view_location($locations);

        }
        }
        foreach($state as $s){
            if($s['state'] == $lid && $s['id'] == $locations)
        {

        $data['homestay']  = $this->user->homestay_view_location_state($locations);

        }
        }
        }
        
        $data['range']     = $this->user->pricerange_view();
        $data['rules']     = $this->user->homerules_view();
        $data['category']  = $this->user->category_view();
        $data['guests']    = $this->user->guestlove_view();
        $data['roomtypes'] = $this->user->roomtype_view();
        $this->load->view('user/header',$data);
        $this->load->view('user/hotel-list2');
        $this->load->view('user/footer');
    }else{
        echo '<p>Please select the location</p>';
    }
    }

    function homestay_booking_confirm($id){
        if(!empty($_SESSION['userdetails'])){
            $data['checkin'] = $_SESSION['userdetails']['checkin'];
            $data['checkout']= $_SESSION['userdetails']['checkout'];
            $data['guests']  = $_SESSION['userdetails']['guests'];
        }
        $data['rules']       = $this->user->homestay_rules_view_id($id);
        $data['gallery']     = $this->user->gallery_view_limit($id);
        $data['rooms']       = $this->user->rooms_view($id);
        $data['roomtype']    = $this->user->rooms_type_view($id);
         $homestay           = $this->user->homestay_view_id($id);
        $data['name']        = $homestay[0]['name'];
        $data['description'] = $homestay[0]['description'];
        $data['id']          = $id;
        $data['state']       = $homestay[0]['state'];
        $data['district']    = $homestay[0]['district'];
        $data['location']    = $homestay[0]['location'];
        $this->load->view('user/header',$data);
        $this->load->view('user/hotel-details-confirm');
        $this->load->view('user/footer');
    }

    function signup_page1(){
        if(isset($_POST['submit'])){
            $_SESSION['userlogin'] = [
                'fname'   => $_POST['fname'],
                'lname'   => $_POST['lname'],
                'email'   => $_POST['email'],
                'referral'=> $_POST['referral'],
        ];
        redirect(base_url().'userpanel/signup_page2');
        }
        $this->load->view('user/header');
        $this->load->view('user/signup');
        $this->load->view('user/footer');
        
        
    }
    function signup_page2(){
        if(!empty($_SESSION['userlogin'])){
        if(isset($_POST['submit'])){
                $data = [
                    'first_name'    => $_SESSION['userlogin']['fname'],
                    'last_name'     => $_SESSION['userlogin']['lname'],
                    'email'         => $_SESSION['userlogin']['email'],
                    'referral_code' => $_SESSION['userlogin']['referral'],
                    'password'      => $_POST['password'],
                ];
                $this->user->userLogin($data);
                redirect(base_url().'userpanel/login');

        }else{
        $this->load->view('user/header');
        $this->load->view('user/password');
        $this->load->view('user/footer');
        }
    }}
}
