<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('admin');
        $this->logged_in();
    }


    private function logged_in()
    {
        if (empty($_SESSION['id'])) {
            redirect(base_url().'login_register/index');
        }
    }

    function index()
    {

        $data['role'] = $_SESSION['role'];

        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/dashboard');
        $this->load->view('adminPanel/footer');
    }
    function homestay(){

        if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'name'           => $this->input->post('name'),
                'phone'          => $this->input->post('phone'),
                'address'        => $this->input->post('address'),
                'description'    => $this->input->post('description'),
                'rooms'          => $this->input->post('rooms'),
                'email'          => $this->input->post('email'),
                'password'       => $this->input->post('password'),
                'photo'          => $img,
                'contact_person' => $this->input->post('contact_person'),
                'status'         => 1,
                'contactnumber'  => $this->input->post('contactnumber'),
                'location'       => $this->input->post('location'),
                'contactname'    => $this->input->post('contactname'),
                ];
                $this->admin->homestay($data);
                $last = $this->admin->homestay_lastid();
                $category = $this->input->post('category');
                foreach($category as $cat){
                    $u_cat = [
                    'category'    => $cat,
                    'homestay_id' => $last,
                ];
                $this->admin->homestay_category($u_cat);
                }
                $rt = $this->input->post('roomtype');
                foreach($rt as $room){
                    $roomtype = [
                    'roomtype'    => $room,
                    'homestay_id' => $last,
                ];
                $this->admin->homestay_roomtype($roomtype);
                }
                $services = $this->input->post('services');
                foreach($services as $service){
                    $serv = [
                    'services'    => $service,
                    'homestay_id' => $last,
                ];
                $this->admin->homestay_services($serv);
                }
                $rules = $this->input->post('rules');
                foreach($rules as $rule){
                    $ru = [
                    'rules'    => $rule,
                    'homestay_id' => $last,
                ];
                $this->admin->homestay_rules($ru);
                }
                redirect(base_url().'dashboard_admin/homestay');
            }else{
                echo $this->upload->display_errors();
            }
        }else{   

            $data['title']    = 'Homestay';
            $data['role']     = $_SESSION['role'];
            $data['homestay'] = $this->admin->homestay_view();
            $data['categorys']= $this->admin->homestay_category_view();
            $data['location'] = $this->admin->location_view();
            $data['roomtypes']= $this->admin->homestay_roomtype_view();
            $data['roomtype'] = $this->admin->roomtype_view();
            $data['category'] = $this->admin->category_view();
            $data['state']    = $this->admin->state_view();
            $data['services'] = $this->admin->guestlove_view();
            $data['rules']    = $this->admin->homerules_view();
            $this->load->view('adminPanel/header', $data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/homestay');
            $this->load->view('adminPanel/footer');

        }

        }

    function update_homestay($id){
        if(isset($_POST['submit'])){
           
                $data=[
                'name'           => $this->input->post('name'),
                'phone'          => $this->input->post('phone'),
                'address'        => $this->input->post('address'),
                'description'    => $this->input->post('description'),
                'rooms'          => $this->input->post('rooms'),
                'email'          => $this->input->post('email'),
                'password'       => $this->input->post('password'),
                'contact_person' => $this->input->post('contact_person'),
                'contactname'    => $this->input->post('contactname'),
                'location'       => $this->input->post('location'),
                'contactnumber'  => $this->input->post('contactnumber'),
                ];
                $this->admin->update_homestay($data,$id);
                redirect(base_url().'dashboard_admin/homestay');
        }else{
        $data['id'] =$id;
        $data['title'] = 'Update Homestay';
        $data['role']  = $_SESSION['role'];
        // $data['categorys'] = $this->admin->category_view();
        $data['location']  = $this->admin->location_view();
        $data['district']  = $this->admin->district_view();
        $data['state']     = $this->admin->state_view();
        // $data['roomtypes'] = $this->admin->roomtype_view();
        $homestay          = $this->admin->homestay_view_id($id);

            $data['name']            = $homestay[0]['name'];
            $data['phone']           = $homestay[0]['phone'];
            $data['password']        = $homestay[0]['password'];
            $data['address']         = $homestay[0]['address'];
            $data['rooms']           = $homestay[0]['rooms'];
            $data['email']           = $homestay[0]['email'];
            $data['contact_person']  = $homestay[0]['contact_person'];
            $data['description']     = $homestay[0]['description'];
            $data['contactname']     = $homestay[0]['contactname'];
            $data['contactnumber']   = $homestay[0]['contactnumber'];
            $data['loc']             = $homestay[0]['lid'];
            $data['dist']            = $homestay[0]['district_id'];
            $data['st']              = $homestay[0]['state_id'];
        
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_homestay');
        $this->load->view('adminPanel/footer');
        }
    }

    function delete_homestay(){
        $id = $_POST['id'];
        $this->admin->delete_homestay($id);
    }
    function gallery($id){

         if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'image_gallery' => $img,
                    'homestay_id'   => $id
                ];
                $this->admin->gallery($data,$id);
                redirect(base_url().'dashboard_admin/gallery/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
        $data['id']        = $id;
        $data['role']      = $_SESSION['role'];
        $data['gallery']   = $this->admin->gallery_view($id);
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/gallery');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_gallery(){
        $id = $_POST['id'];
        $this->admin->delete_gallery($id);
    }
    function delete_roomtype(){
        $this->admin->delete_roomtype($_POST['id']);
    }
    function roomtype(){

         if(isset($_POST['submit'])){
                $data=[
                    'roomtype' => $_POST['roomtype'],
                ];
                $this->admin->roomtype($data);
                redirect(base_url().'dashboard_admin/roomtype');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['room']   = $this->admin->roomtype_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/roomtype');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_roomtype($id){

         if(isset($_POST['submit'])){
                $data=[
                    'roomtype' => $_POST['roomtype'],
                ];
                $this->admin->update_roomtype($data,$id);
                redirect(base_url().'dashboard_admin/roomtype');
        }else{
        $data['role']     = $_SESSION['role'];
        $room             = $this->admin->roomtype_id($id);
        $data['roomtype'] = $room[0]['roomtype'];
        $data['id']       = $id;
        $data['title']    = 'Room Type';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_roomtype');
        $this->load->view('adminPanel/footer');
        }
    }
     function delete_category(){
        $this->admin->delete_category($_POST['id']);
    }
    function category(){

         if(isset($_POST['submit'])){
                $data=[
                    'category' => $_POST['category'],
                ];
                $this->admin->category($data);
                redirect(base_url().'dashboard_admin/category');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['category']  = $this->admin->category_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/category');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_category($id){

         if(isset($_POST['submit'])){
                $data=[
                    'category' => $_POST['category'],
                ];
                $this->admin->update_category($data,$id);
                redirect(base_url().'dashboard_admin/category');
        }else{
        $data['role']     = $_SESSION['role'];
        $room             = $this->admin->category_id($id);
        $data['category'] = $room[0]['category'];
        $data['id']       = $id;
        $data['title']    = 'category';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_category');
        $this->load->view('adminPanel/footer');
        }
    }
   
     function delete_guestlove(){
        $this->admin->delete_guestlove($_POST['id']);
    }
    function guestlove(){

         if(isset($_POST['submit'])){
                $data=[
                    'guestlove' => $_POST['guestlove'],
                ];
                $this->admin->guestlove($data);
                redirect(base_url().'dashboard_admin/guestlove');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['guestlove'] = $this->admin->guestlove_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/guestlove');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_guestlove($id){

         if(isset($_POST['submit'])){
                $data=[
                    'guestlove' => $_POST['guestlove'],
                ];
                $this->admin->update_guestlove($data,$id);
                redirect(base_url().'dashboard_admin/guestlove');
        }else{
        $data['role']      = $_SESSION['role'];
        $guestlove         = $this->admin->guestlove_id($id);
        $data['guestlove'] = $guestlove[0]['guestlove'];
        $data['id']        = $id;
        $data['title']     = 'Guest Love';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_guestlove');
        $this->load->view('adminPanel/footer');
        }
    }
     function delete_pricerange(){
        $this->admin->delete_pricerange($_POST['id']);
    }
    function pricerange(){

         if(isset($_POST['submit'])){
                $data=[
                    'starting_price' => $_POST['starting_price'],
                    'ending_price'   => $_POST['ending_price'],
                ];
                $this->admin->pricerange($data);
                redirect(base_url().'dashboard_admin/pricerange');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['pricerange'] = $this->admin->pricerange_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/pricerange');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_pricerange($id){

         if(isset($_POST['submit'])){
                $data=[
                    'starting_price' => $_POST['starting_price'],
                    'ending_price'   => $_POST['ending_price'],
                ];
                $this->admin->update_pricerange($data,$id);
                redirect(base_url().'dashboard_admin/pricerange');
        }else{
        $data['role']           = $_SESSION['role'];
        $pricerange             = $this->admin->pricerange_id($id);
        $data['starting_price'] = $pricerange[0]['starting_price'];
        $data['ending_price']   = $pricerange[0]['ending_price'];
        $data['id']             = $id;
        $data['title']          = 'Price Range';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_pricerange');
        $this->load->view('adminPanel/footer');
        }
    } 
     function delete_homerules(){
        $this->admin->delete_homerules($_POST['id']);
    }
    function homerules(){

         if(isset($_POST['submit'])){
                $data=[
                    'homerules' => $_POST['homerules'],
                ];
                $this->admin->homerules($data);
                redirect(base_url().'dashboard_admin/homerules');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['homerules'] = $this->admin->homerules_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/homerules');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_homerules($id){

         if(isset($_POST['submit'])){
                $data=[
                    'homerules' => $_POST['homerules'],
                ];
                $this->admin->update_homerules($data,$id);
                redirect(base_url().'dashboard_admin/homerules');
        }else{
        $data['role']      = $_SESSION['role'];
        $guestlove         = $this->admin->homerules_id($id);
        $data['homerules'] = $guestlove[0]['homerules'];
        $data['id']        = $id;
        $data['title']     = 'Home Rules';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_homerules');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_rooms(){
        $id = $_POST['id'];
        $this->admin->delete_rooms($id);
    }
    function rooms($id){
        if(isset($_POST['submit'])){
            if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'roomtype_id'   => $this->input->post('roomtype'),
                'details'    => $this->input->post('details'),
                'price'      => $this->input->post('price'),
                'offerprice' => $this->input->post('offerprice'),
                'image'      => $img,
                'homestay_id'=> $id,
                ];
                $this->admin->rooms($data);
                redirect(base_url().'dashboard_admin/rooms/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }
      }else{
        $data['role']      = $_SESSION['role'];
        $data['id']        = $id;
        $data['roomtype']  = $this->admin->roomtype_view();
        $data['rooms']     = $this->admin->rooms_view($id);
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/rooms');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_rooms($room,$id){

         if(isset($_POST['submit'])){
                $data=[
                'roomtype_id'   => $this->input->post('roomtype'),
                'details'    => $this->input->post('details'),
                'price'      => $this->input->post('price'),
                'offerprice' => $this->input->post('offerprice'),
                ];
                $this->admin->update_rooms($data,$id);
                redirect(base_url().'dashboard_admin/rooms/'.$room);
        }else{
        $data['role']      = $_SESSION['role'];
        $rooms             = $this->admin->rooms_view_id($id);
        $data['roomt']     = $rooms[0]['roomtype_id'];
        $data['offerprice']= $rooms[0]['offerprice'];
        $data['price']     = $rooms[0]['price'];
        $data['details']   = $rooms[0]['details'];
        $data['id']        = $id;
        $data['room']      = $room;
        $data['title']     = 'Update Room';
        $data['roomtype']  = $this->admin->roomtype_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_rooms');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_events(){
        $id = $_POST['id'];
        $this->admin->delete_events($id);
    }
    function events(){
        if(isset($_POST['submit'])){
            if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'name'       => $this->input->post('name'),
                'details'    => $this->input->post('details'),
                'date'       => $this->input->post('date'),
                'photo'      => $img,
                ];
                $this->admin->events($data);
                redirect(base_url().'dashboard_admin/events');
            }else{
                echo $this->upload->display_errors();
            }
        }
      }else{
        $data['role']   = $_SESSION['role'];
        $data['events'] = $this->admin->events_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/events');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_events($id){

         if(isset($_POST['submit'])){
                $data=[
                 'name'   => $this->input->post('name'),
                'details' => $this->input->post('details'),
                'date'    => $this->input->post('date'),
                ];
                $this->admin->update_events($data,$id);
                redirect(base_url().'dashboard_admin/events');
        }else{
        $data['role']    = $_SESSION['role'];
        $events          = $this->admin->events_view_id($id);
        $data['name']    = $events[0]['name'];
        $data['details'] = $events[0]['details'];
        $data['date']    = $events[0]['date'];
        $data['id']      = $id;
        $data['title']   = 'Update Events & Festival';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_events');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_state(){
        $id = $_POST['id'];
        $this->admin->delete_state($id);
    }
    function state(){
        if(isset($_POST['submit'])){
                $data=[
                'state' => $this->input->post('state'),
                ];
                $this->admin->state($data);
                redirect(base_url().'dashboard_admin/state');
      }else{
        $data['role']  = $_SESSION['role'];
        $data['state'] = $this->admin->state_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/state');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_state($id){

         if(isset($_POST['submit'])){
                $data=[
                 'state'   => $this->input->post('state'),
                ];
                $this->admin->update_state($data,$id);
                redirect(base_url().'dashboard_admin/state');
        }else{
        $data['role']   = $_SESSION['role'];
        $state          = $this->admin->state_view_id($id);
        $data['state']  = $state[0]['state'];
        $data['id']     = $id;
        $data['title']  = 'Update State';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_state');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_district(){
        $id = $_POST['id'];
        $this->admin->delete_district($id);
    }
    function district(){
        if(isset($_POST['submit'])){
                $data=[
                'state_id' => $this->input->post('state'),
                'district' => $this->input->post('district'),
                ];
                $this->admin->district($data);
                redirect(base_url().'dashboard_admin/district');
      }else{
        $data['role']     = $_SESSION['role'];
        $data['district'] = $this->admin->district_view();
        $data['state']    = $this->admin->state_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/district');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_district($id){

         if(isset($_POST['submit'])){
                $data=[
                 'state_id' => $this->input->post('state'),
                 'district' => $this->input->post('district'),
                ];
                $this->admin->update_district($data,$id);
                redirect(base_url().'dashboard_admin/district');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['state']     = $this->admin->state_view();
        $district          = $this->admin->district_view_id($id);
        $data['st']        = $district[0]['state_id'];
        $data['district']  = $district[0]['district'];
        $data['id']        = $id;
        $data['title']     = 'Update District';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_district');
        $this->load->view('adminPanel/footer');
        }
    }
      function delete_location(){
        $this->admin->delete_location($_POST['id']);
    }
    function location(){

         if(isset($_POST['submit'])){
                $data=[
                    'location'    => $_POST['location'],
                    'district_id' => $_POST['district'],
                ];
                $this->admin->location($data);
                redirect(base_url().'dashboard_admin/location');
        }else{
        $data['role']      = $_SESSION['role'];
        $data['state']     = $this->admin->state_view();
        $data['location']  = $this->admin->location_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/location');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_location($id){

         if(isset($_POST['submit'])){
                $data=[
                    'location'    => $_POST['location'],
                    'district_id' => $_POST['district'],
                ];
                $this->admin->update_location($data,$id);
                redirect(base_url().'dashboard_admin/location');
        }else{
        $data['role']     = $_SESSION['role'];
        $room             = $this->admin->location_id($id);
        $data['location'] = $room[0]['location'];
        $data['dist']     = $room[0]['district_id'];
        $data['st']       = $room[0]['state_id'];
        $data['id']       = $id;
        $data['district'] = $this->admin->district_view();
        $data['title']    = 'Location';
        $data['state']    = $this->admin->state_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_location');
        $this->load->view('adminPanel/footer');
        }
    }
    function view_homestay($id){
        $data['role']           = $_SESSION['role'];
        $data['title']          = 'Homestay';
        $data['roomtype']       = $this->admin->homestay_roomtype_view();
        $data['category']       = $this->admin->homestay_category_view();
        $data['rules']          = $this->admin->homestay_rules_view();
        $data['services']       = $this->admin->homestay_services_view();
        $homestay               = $this->admin->homestay_view_id($id);
        $data['name']           = $homestay[0]['name'];
        $data['phone']          = $homestay[0]['phone'];
        $data['address']        = $homestay[0]['name'];
        $data['email']          = $homestay[0]['email'];
        $data['description']    = $homestay[0]['description'];
        $data['contact_person'] = $homestay[0]['contact_person'];
        $data['contactnumber']  = $homestay[0]['contactnumber'];
        $data['contactname']    = $homestay[0]['contactname'];
        $data['rooms']          = $homestay[0]['rooms'];
        $data['password']       = $homestay[0]['password'];
        $data['location']       = $homestay[0]['location'];
        $data['state']          = $homestay[0]['state'];
        $data['district']       = $homestay[0]['district'];
        $data['id']             = $id;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/view_homestay');
        $this->load->view('adminPanel/footer');

    }
    function delete_wonderland(){
        $id = $_POST['id'];
        $this->admin->delete_wonderland($id);
    }
    function wonderland(){
        if(isset($_POST['submit'])){
            if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'name'        => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'image'       => $img,
                ];
                $this->admin->wonderland($data);
                redirect(base_url().'dashboard_admin/wonderland');
            }else{
                echo $this->upload->display_errors();
            }
        }
      }else{
        $data['role']   = $_SESSION['role'];
        $data['wonderland'] = $this->admin->wonderland_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/wonderland');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_wonderland($id){

         if(isset($_POST['submit'])){
                $data=[
                'name'        => $this->input->post('name'),
                'description' => $this->input->post('description'),
                ];
                $this->admin->update_wonderland($data,$id);
                redirect(base_url().'dashboard_admin/wonderland');
        }else{
        $data['role']        = $_SESSION['role'];
        $wonderland          = $this->admin->wonderland_view_id($id);
        $data['name']        = $wonderland[0]['name'];
        $data['description'] = $wonderland[0]['description'];
        $data['id']          = $id;
        $data['title']       = 'Update wonderland';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_wonderland');
        $this->load->view('adminPanel/footer');
        }
    }
    
}
?>