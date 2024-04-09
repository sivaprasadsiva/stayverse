g<?php
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
        date_default_timezone_set('asia/kolkata');
    }


    private function logged_in()
    {
        $check = $this->admin->check($_SESSION['admin_o']['uname'], $_SESSION['admin_o']['pass']);
        if (!$check) {
            redirect(base_url().'loginPage');
        }
    }

    function index()
    {

        $data['role'] = $_SESSION['admin_o']['role'];
        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/dashboard');
        $this->load->view('adminPanel/footer');
    }
    function payout()
    {

        $data['role'] = $_SESSION['admin_o']['role'];
        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view();
        $data['paid'] = $this->admin->fetch_table('paid_to_homestay');
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/payout');
        $this->load->view('adminPanel/footer');
    }

    function payout_values(){

         $check = $this->admin->fetch_single('paid_to_homestay',['booking_id' => $_POST['booking_id']]);
            if($check){
                $payment = $check[0]['payment'] + $_POST['payment'];
                $this->admin->update_table('paid_to_homestay',['payment' => $payment],['booking_id' => $_POST['booking_id']]);
            }else{
                $data = [

                    'booking_id' => $_POST['booking_id'],
                    'payment' => $_POST['payment'],
                    'date' => date('Y-m-d'),
                ];
                $this->admin->insert_table('paid_to_homestay',$data);
            }

    }


     function homestay_booking()
    {

        $data['role'] = $_SESSION['admin_o']['role'];
        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/homestay_booking');
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
            $data['role']     = $_SESSION['admin_o']['role'];
            $data['homestay'] = $this->admin->homestay_view();
            $data['categorys']= $this->admin->homestay_category_view();
            $data['location'] = $this->admin->location_view();
            $data['roomtypes']= $this->admin->homestay_roomtype_view();
            $data['roomtype'] = $this->admin->roomtype_view();
            $data['category'] = $this->admin->category_view();
            $data['state']    = $this->admin->state_view();
            $data['services'] = $this->admin->guestlove_view();
            $data['rules']    = $this->admin->homerules_view();
            $data['owner']    = $this->admin->fetch_table('homestay_owner');
            $this->load->view('adminPanel/header', $data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/homestay');
            $this->load->view('adminPanel/footer');

        }

        }

        function approve_owner(){
            $data = ['approval' => 1];
            $cond = ['homestay_id' => $this->input->post('id')];
            $this->admin->update_table('homestay_owner',$data,$cond);
        }
        function dismiss_owner(){
            $id = $this->input->post('id');
            $owner = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$id]);
            unlink('./assets/images/owner/'.$owner[0]['voter_id']);
            unlink('./assets/images/owner/'.$owner[0]['homestay_license']);
            unlink('./assets/images/owner/'.$owner[0]['aadharcard']);
            $this->admin->delete_table('homestay_owner',array('homestay_id'=>$id));
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


                $this->admin->delete_table('homestay_category',['homestay_id' => $id]);
                $this->admin->delete_table('homestay_roomtype',['homestay_id' => $id]);
                $this->admin->delete_table('homestay_rules',['homestay_id' => $id]);
                $this->admin->delete_table('homestay_services',['homestay_id' => $id]);

                $category = $this->input->post('category');
                foreach($category as $cat){
                    $u_cat = [
                    'category'    => $cat,
                    'homestay_id' => $id,
                ];
                $this->admin->homestay_category($u_cat);
                }
                $rt = $this->input->post('roomtype');
                foreach($rt as $room){
                    $roomtype = [
                    'roomtype'    => $room,
                    'homestay_id' => $id,
                ];
                $this->admin->homestay_roomtype($roomtype);
                }
                $services = $this->input->post('services');
                foreach($services as $service){
                    $serv = [
                    'services'    => $service,
                    'homestay_id' => $id,
                ];
                $this->admin->homestay_services($serv);
                }
                $rules = $this->input->post('rules');
                foreach($rules as $rule){
                    $ru = [
                    'rules'    => $rule,
                    'homestay_id' => $id,
                ];
                $this->admin->homestay_rules($ru);
            }

                redirect(base_url().'dashboard_admin/homestay');
        }else{
        $data['id'] =$id;
        $data['title'] = 'Update Homestay';
        $data['role']  = $_SESSION['admin_o']['role'];
        $data['location']  = $this->admin->location_view();
        $data['district']  = $this->admin->district_view();
        $data['state']     = $this->admin->state_view();
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
            $data['img']             = base_url('assets/images/').$homestay[0]['photo'];
        

            $newservices[] = $newrules[] = $newroomtype[] = $newcategory[] =  $oldservices[] = $oldrules[] = $oldroomtype[] = $oldcategory[] = NULL;

            $services = $this->admin->fetch_all("SELECT  * ,g.id as gid FROM homestay_services h INNER JOIN guestlove g on g.id = h.services  WHERE h.homestay_id =".$id);
            $rules    = $this->admin->fetch_all("SELECT * ,r.id as rid FROM homestay_rules h INNER JOIN homerules r on r.id = h.rules WHERE h.homestay_id =".$id);
            $categorys = $this->admin->fetch_all("SELECT * ,c.id as cid,h.category as cat FROM homestay_category h INNER JOIN category c on c.id = h.category WHERE h.homestay_id =".$id);
            $roomtypes = $this->admin->fetch_all("SELECT * ,r.id as rid , h.roomtype as room FROM homestay_roomtype h INNER JOIN roomtype r on r.id = h.roomtype  WHERE h.homestay_id =".$id);

            $roomtypes1 = $this->admin->roomtype_view();
            $services1 = $this->admin->guestlove_view();
            $rules1    = $this->admin->homerules_view();
            $categorys1 = $this->admin->category_view();



            foreach($services as $service){
                $oldservices[] = $service['services'];
            }

            foreach($services1 as $service1){
                if(!in_array($service1['id'],$oldservices)){
                    $newservices[] = $service1['id'];
                }
                
            }

            foreach($rules as $rule){
                $oldrules[] = $rule['rules'];
            }

            foreach($rules1 as $rule1){
                if(!in_array($rule1['id'],$oldrules)){
                    $newrules[] = $rule1['id'];
                }
                
            }

            foreach($roomtypes as $roomtype){
                $oldroomtype[] = $roomtype['room'];
            }

            foreach($roomtypes1 as $roomtype1){
                if(!in_array($roomtype1['id'],$oldroomtype)){
                    $newroomtype[] = $roomtype1['id'];
                }
                
            }

            foreach($categorys as $category){
                $oldcategory[] = $category['cat'];
            }

            foreach($categorys1 as $category1){
                if(!in_array($category1['id'],$oldcategory)){
                    $newcategory[] = $category1['id'];
                }
                
            }

        $data['services'] = $services;
        $data['service'] = $newservices;
        $data['service1'] = $services1;


        $data['rules'] = $rules;
        $data['rule'] = $newrules;
        $data['rule1'] = $rules1;

        $data['roomtypes'] = $roomtypes;
        $data['roomtype'] = $newroomtype;
        $data['roomtypes1'] = $roomtypes1;


        $data['categorys'] = $categorys;
        $data['category'] = $newcategory;
        $data['category1'] = $categorys1;

              

        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_homestay');
        $this->load->view('adminPanel/footer');
        }
    }

    function update_homestay_img($id){
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
                    'photo' => $img
                ];
                $this->admin->update_homestay($data,$id);
                redirect(base_url().'dashboard_admin/update_homestay/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['homestay'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }

    function delete_homestay(){
        $id = $_POST['id'];
        $this->admin->delete_homestay($id);
    }
    function gallery($id){

         if(isset($_POST['submit'])){
            $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 3072; 

                $this->load->library('upload', $config);

                $files = $_FILES['image'];

                for ($i = 0; $i < count($files['name']); $i++) {
                        $_FILES['image']['name']     = $files['name'][$i];
                        $_FILES['image']['type']     = $files['type'][$i];
                        $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES['image']['error']    = $files['error'][$i];
                        $_FILES['image']['size']     = $files['size'][$i];

                    if ($this->upload->do_upload('image')) {
                        $image = $this->upload->data();
                        $img = $image['file_name'];
                        $data=[
                                'image_gallery' => $img,
                                'homestay_id'   => $id
                              ];
                            $this->admin->gallery($data,$id);
                            
                    } else {
                        echo  $this->upload->display_errors();
                    }
                }
                redirect(base_url().'dashboard_admin/gallery/'.$id);
        }else{
        $data['id']        = $id;
        $data['role']      = $_SESSION['admin_o']['role'];
        $data['gallery']   = $this->admin->gallery_view($id);
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/gallery');
        $this->load->view('adminPanel/footer');
        }
    }
    function delete_gallery(){
        $id = $_POST['id'];
        $gallery = $this->admin->fetch_single('homestay_gallery',['id' => $id]);
        unlink('./assets/images/'.$gallery[0]['image_gallery']);
        
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']     = $_SESSION['admin_o']['role'];
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']     = $_SESSION['admin_o']['role'];
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
            $config = array(
                'upload_path' => './assets/images',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('guestlove_img')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'guestlove'       => $_POST['guestlove'],
                    'guestlove_image' => $img,
                    'guestlove_price' => $_POST['guestlove_price'],
                    'type'            => $_POST['type'],
                ];
                $this->admin->guestlove($data);
                redirect(base_url().'dashboard_admin/guestlove');
            }else{
                echo $this->upload->display_errors();
            }
        }else{
        $data['role']      = $_SESSION['admin_o']['role'];
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
                    'guestlove'       => $_POST['guestlove'],
                    'guestlove_price' => $_POST['guestlove_price'],
                    'type'            => $_POST['type'],
                ];
                $this->admin->update_guestlove($data,$id);
                redirect(base_url().'dashboard_admin/guestlove');
        }else{
        $data['role']      = $_SESSION['admin_o']['role'];
        $guestlove         = $this->admin->guestlove_id($id);
        $data['guestlove'] = $guestlove[0]['guestlove'];
        $data['price']     = $guestlove[0]['guestlove_price'];
        $data['img']       = base_url('assets/images/').$guestlove[0]['guestlove_image'];
        $data['id']        = $id;
        $data['type']      = $guestlove[0]['type'];
        $data['title']     = 'Guest Love';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_guestlove');
        $this->load->view('adminPanel/footer');
        }
    }

    function update_guestlove_img($id){
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
                    'guestlove_image' => $img
                ];
                $this->admin->update_guestlove($data,$id);
                redirect(base_url().'dashboard_admin/update_guestlove/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['guestlove'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']           = $_SESSION['admin_o']['role'];
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
                'no'         => $this->input->post('no'),
                'image'      => $img,
                'homestay_id'=> $id,
                ];
                $this->admin->rooms($data);
                redirect(base_url().'dashboard_admin/rooms/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }
      else{
        $data['role']      = $_SESSION['admin_o']['role'];
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
                'no'         => $this->input->post('no'),
                ];
                $this->admin->update_rooms($data,$id);
                redirect(base_url().'dashboard_admin/rooms/'.$room);
        }else{
        $data['role']      = $_SESSION['admin_o']['role'];
        $rooms             = $this->admin->rooms_view_id($id);
        $data['roomt']     = $rooms[0]['roomtype_id'];
        $data['offerprice']= $rooms[0]['offerprice'];
        $data['price']     = $rooms[0]['price'];
        $data['no']        = $rooms[0]['no'];
        $data['details']   = $rooms[0]['details'];
        $data['id']        = $id;
        $data['room']      = $room;
        $data['img']       = base_url('assets/images/').$rooms[0]['image'];
        $data['title']     = 'Update Room';
        $data['roomtype']  = $this->admin->roomtype_view();
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_rooms');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_rooms_img($rooms,$id){
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
                    'image' => $img
                ];
                $this->admin->update_rooms($data,$id);
                redirect(base_url().'dashboard_admin/update_rooms/'.$rooms.'/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['rooms'] = TRUE;
        $data['room'] = $rooms;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
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
        $data['role']   = $_SESSION['admin_o']['role'];
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
        $data['role']    = $_SESSION['admin_o']['role'];
        $events          = $this->admin->events_view_id($id);
        $data['name']    = $events[0]['name'];
        $data['details'] = $events[0]['details'];
        $data['date']    = $events[0]['date'];
        $data['img']     = base_url('assets/images/').$events[0]['photo'];
        $data['id']      = $id;
        $data['title']   = 'Update Events & Festival';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_events');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_events_img($id){
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
                    'photo' => $img
                ];
                $this->admin->update_events($data,$id);
                redirect(base_url().'dashboard_admin/update_events/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['events'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
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
        $data['role']  = $_SESSION['admin_o']['role'];
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
        $data['role']   = $_SESSION['admin_o']['role'];
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
        $data['role']     = $_SESSION['admin_o']['role'];
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']      = $_SESSION['admin_o']['role'];
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
        $data['role']     = $_SESSION['admin_o']['role'];
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
        $data['role']           = $_SESSION['admin_o']['role'];
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


            $owner              = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$id]);
            if($owner){

                $data['name_owner'] = $owner[0]['name'];
                $data['phone_owner']= $owner[0]['phone'];
                $data['age']        = $owner[0]['age'];
                $data['owner_id']   = $owner[0]['id'];
                $data['voter']      = base_url('assets/images/owner/').$owner[0]['voter_id'];
                $data['aadhar']     = base_url('assets/images/owner/').$owner[0]['aadharcard'];
                $data['license']    = base_url('assets/images/owner/').$owner[0]['homestay_license'];
                $data['owner']      = TRUE;
               }
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
        $data['role']   = $_SESSION['admin_o']['role'];
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
        $data['role']        = $_SESSION['admin_o']['role'];
        $wonderland          = $this->admin->wonderland_view_id($id);
        $data['name']        = $wonderland[0]['name'];
        $data['description'] = $wonderland[0]['description'];
        $data['img']         = base_url('assets/images/').$wonderland[0]['image'];
        $data['id']          = $id;
        $data['title']       = 'Update wonderland';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_wonderland');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_wonder_img($id){
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
                    'image' => $img
                ];
                $this->admin->update_wonderland($data,$id);
                redirect(base_url().'dashboard_admin/update_wonderland/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['wonder'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }
    
    
    function food_category(){
        if(isset($_POST['submit'])){
            $data = [

                'category_name' => $_POST['category'],
                'starting_time' => $_POST['start'],
                'ending_time'   => $_POST['end'],
            ];
            $this->admin->food_category($data);
            redirect(base_url().'dashboard_admin/food_category');
        }else{
            $data['role'] = $_SESSION['admin_o']['role'];
            $data['food'] = $this->admin->food_category_view();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/food_category');
            $this->load->view('adminPanel/footer');
        }
    }
    function food_category_update($id){
        if(isset($_POST['submit'])){
            $data = [

                'category_name' => $_POST['category'],
                'starting_time' => $_POST['start'],
                'ending_time'   => $_POST['end'],
            ];
            $this->admin->food_category_update($data,$id);
            redirect(base_url().'dashboard_admin/food_category');
        }else{
            $data['role']   = $_SESSION['admin_o']['role'];
            $data['title']  = 'Food Category Update';
            $category       = $this->admin->food_category_id($id);
            $data['start']  = $category[0]['starting_time'];
            $data['end']    = $category[0]['ending_time'];
            $data['cat']    = $category[0]['category_name'];
            $data['id']     = $id;

            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/food_category_update');
            $this->load->view('adminPanel/footer');
        }
    }
    function food_category_delete(){
        $this->admin->delete_food_category($_POST['id']);
        redirect(base_url().'dashboard_admin/food_category');
    }
    function food(){
        if(isset($_POST['submit'])){
            $config = array(
                'allowed_types' => 'jpeg|png|jpg',
                'max_size'      => 3072,
                'upload_path'   => './assets/images/',
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $img = $this->upload->data();
                $image = $img['file_name'];
            $data = [

                'food_category_id' => $_POST['category'],
                'name'             => $_POST['name'],
                'price'            => $_POST['price'],
                'image'            => $image,
            ];
            $this->admin->food($data);
            redirect(base_url().'dashboard_admin/food');
        }else{
            echo $this->upload->display_errors();
                }
            
        }else{
            $data['role']     = $_SESSION['admin_o']['role'];
            $data['food']     = $this->admin->food_view();
            $data['category'] = $this->admin->food_category_view();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/food');
            $this->load->view('adminPanel/footer');
        }
    }
    function food_update($id){
            if(isset($_POST['submit'])){
            $data = [

                'food_category_id' => $_POST['category'],
                'name'             => $_POST['name'],
                'price'            => $_POST['price'],
            ];
            $this->admin->food_update($data,$id);
            redirect(base_url().'dashboard_admin/food');
        }else{
            $data['role']       = $_SESSION['admin_o']['role'];
            $data['title']      = 'Food Update';
            $data['category']   = $this->admin->food_category_view();
            $food               = $this->admin->food_id($id);
            $data['name']       = $food[0]['name'];
            $data['price']      = $food[0]['price'];
            $data['cat']        = $food[0]['food_category_id'];
            $data['img']        = base_url('assets/images/').$food[0]['image'];
            $data['id']         = $id;
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/food_update');
            $this->load->view('adminPanel/footer');
        }
    }
     function update_food_img($id){
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
                    'image' => $img
                ];
                $this->admin->food_update($data,$id);
                redirect(base_url().'dashboard_admin/food_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['food'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }

    function food_delete(){
        $this->admin->food_delete($_POST['id']);
        redirect(base_url().'dashboard_admin/food');
    }
    function slide1_delete(){
        $this->admin->delete_slider($_POST['id']);
        redirect(base_url().'dashboard_admin/slider1');
    }
    function slide2_delete(){
        $this->admin->delete_slider($_POST['id']);
        redirect(base_url().'dashboard_admin/slider2');
    }
    function slider1(){
        if(isset($_POST['submit'])){
                $config = array(
                'allowed_types' => 'jpeg|png|jpg',
                'max_size'      => 3072,
                'upload_path'   => './assets/images/',
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $img = $this->upload->data();
                $image = $img['file_name'];
            $data = [
                'image' => $image,
                'status'=> 1,
            ];
            $this->admin->slider($data);
            redirect(base_url().'dashboard_admin/slider1');
        }else{
            echo $this->upload->display_errors();
                }
        }else{
            $data['role']  = $_SESSION['admin_o']['role'];
            $data['title'] = 'Slider 1';
            $data['slide'] = $this->admin->slider1_view();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/slider1');
            $this->load->view('adminPanel/footer');
        }
    }
     function slider2(){
        if(isset($_POST['submit'])){
                $config = array(
                'allowed_types' => 'jpeg|png|jpg',
                'max_size'      => 3072,
                'upload_path'   => './assets/images/',
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $img = $this->upload->data();
                $image = $img['file_name'];
            $data = [
                'image' => $image,
                'status'=> 2,
            ];
            $this->admin->slider($data);
            redirect(base_url().'dashboard_admin/slider2');
        }else{
            echo $this->upload->display_errors();
                }
        }else{
            $data['role']  = $_SESSION['admin_o']['role'];
            $data['title'] = 'Slider 2';
            $data['slide'] = $this->admin->slider2_view();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/slider2');
            $this->load->view('adminPanel/footer');
        }
    }
    function coupon(){
        if(isset($_POST['submit'])){
            $data = [

                'code'       => $_POST['code'],
                'name'       => $_POST['name'],
                'percentage' => $_POST['percentage'],
            ];
            $this->admin->coupon($data);
            redirect(base_url().'dashboard_admin/coupon');
            
        }else{
            $data['role']     = $_SESSION['admin_o']['role'];
            $data['coupon']   = $this->admin->coupon_view();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/coupon');
            $this->load->view('adminPanel/footer');
        }
    }
    function coupon_update($id){
            if(isset($_POST['submit'])){
            $data = [

                'code'       => $_POST['code'],
                'name'       => $_POST['name'],
                'percentage' => $_POST['percentage'],
            ];
            $this->admin->coupon_update($data,$id);
            redirect(base_url().'dashboard_admin/coupon');
        }else{
            $data['role']       = $_SESSION['admin_o']['role'];
            $data['title']      = 'Coupon Update';
            $coupon             = $this->admin->coupon_id($id);
            $data['name']       = $coupon[0]['name'];
            $data['code']       = $coupon[0]['code'];
            $data['percentage'] = $coupon[0]['percentage'];
            $data['id']         = $id;
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/coupon_update');
            $this->load->view('adminPanel/footer');
        }
    }
    function coupon_delete(){
        $this->admin->coupon_delete($_POST['id']);
        redirect(base_url().'dashboard_admin/coupon');
    }
    function contact(){
            $data['role']       = $_SESSION['admin_o']['role'];
            $data['title']      = 'Contact';
            $data['contact']    = $this->admin->contact();
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/contact');
            $this->load->view('adminPanel/footer');
    }
    function delete_contact(){
        $this->admin->delete_contact($_POST['id']);
    }

    function delete_plan(){
        $this->admin->delete_table('plan',['id'=>$_POST['id']]);
        $this->admin->delete_table('plan_guestlove',['plan_id'=>$_POST['id']]);
    }

    function plan(){
        if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images/plan',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/plan');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('icon')){
                $image1 = $this->upload->data();

                $img1 = $image1['file_name'];
                if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'name'          => $this->input->post('name'),
                'icon'          => $img,
                'price'         => $this->input->post('price'),
                'plan_image'    => $img1,
                ];
                $this->admin->insert_table('plan',$data);
                $last = $this->admin->last_id('plan');
                $service = $this->input->post('services');
                foreach($service as $s){
                    $ser = [
                    'plan_guestlove' => $s,
                    'plan_id' => $last,
                ];
                $this->admin->insert_table('plan_guestlove',$ser);
                }
            }
                
                redirect(base_url().'dashboard_admin/plan');
            }else{
                echo $this->upload->display_errors();
            }
        }else{   

            $data['title']    = 'Plan';
            $data['role']     = $_SESSION['admin_o']['role'];
            $data['plan'] = $this->admin->fetch_table('plan');
            $data['plan_guestlove'] = $this->admin->fetch_all('SELECT * FROM plan_guestlove pg  INNER JOIN guestlove g on g.id = pg.plan_guestlove');
            $data['services'] = $this->admin->guestlove_view();
            $this->load->view('adminPanel/header', $data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/plan');
            $this->load->view('adminPanel/footer');

        }
    }
    function plan_update($id){
            if(isset($_POST['submit'])){
            $data = [
                'name'             => $_POST['name'],
                'price'            => $_POST['price'],
            ];
            $this->admin->update_table('plan',$data,['id'=>$id]);
            $this->db->delete('plan_guestlove',['plan_id' => $id]);
            $service = $this->input->post('services');
                foreach($service as $s){
                    $ser = [
                    'plan_guestlove' => $s,
                    'plan_id' => $id,
                ];
                $this->admin->insert_table('plan_guestlove',$ser);
                }
            redirect(base_url().'dashboard_admin/plan');
        }else{
            $data['role']       = $_SESSION['admin_o']['role'];
            $data['title']      = 'Plan Update';
            $plan               = $this->admin->fetch_single('plan',['id'=>$id]);
            $data['name']       = $plan[0]['name'];
            $data['price']      = $plan[0]['price'];
            $data['img']        = base_url('assets/images/plan/').$plan[0]['icon'];
            $data['img2']       = base_url('assets/images/plan/').$plan[0]['plan_image'];
            $data['id']         = $id;
            $services = $this->admin->fetch_all('SELECT * FROM plan_guestlove pg  INNER JOIN guestlove g on g.id = pg.plan_guestlove where pg.plan_id = '.$id);
            $service1 = $this->admin->guestlove_view();
            $guestlove[] = NULL;
            foreach($services as $s){
                $guestlove[] = $s['plan_guestlove'];
            }
            $newguest[] = NULL;
            foreach($service1 as $s1){
                if(!in_array($s1['id'],$guestlove)){
                    $newguest[] = $s1['id'];
                }
                
            }
            $data['guestlove'] = $newguest;
            $data['services']  = $services;
            $data['service1'] = $service1;
            $this->load->view('adminPanel/header',$data);
            $this->load->view('adminPanel/sidebar');
            $this->load->view('adminPanel/update_plan');
            $this->load->view('adminPanel/footer');
        }
    }
     function update_plan_img($id){
        if(isset($_POST['submit'])){
            $plan  = $this->admin->fetch_single('plan',['id'=>$id]);
            unlink('./assets/images/plan/'.$plan[0]['icon']);
            $config = array(
                'upload_path' => './assets/images/plan',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'icon' => $img
                ];
                $this->admin->update_table('plan',$data,['id'=>$id]);
                redirect(base_url().'dashboard_admin/plan_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['plan'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }

    function update_plan_img1($id){
        if(isset($_POST['submit'])){
            $plan  = $this->admin->fetch_single('plan',['id'=>$id]);
            unlink('./assets/images/plan/'.$plan[0]['plan_image']);
            $config = array(
                'upload_path' => './assets/images/plan',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'plan_image' => $img
                ];
                $this->admin->update_table('plan',$data,['id'=>$id]);
                redirect(base_url().'dashboard_admin/plan_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['plan1'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }

    function staff(){

        if(isset($_POST['submit'])){
            $email = $this->admin->fetch_single('staff',['email'=>$this->input->post('email')]);
            if($email){
                            $this->session->set_flashdata('email','<div class="alert alert-danger">The email already exists.</div>');
                            $this->session->set_flashdata('name_staff',$_POST['name']);
                            $this->session->set_flashdata('age_staff',$_POST['age']);
                            $this->session->set_flashdata('email_staff',$_POST['email']);
                            $this->session->set_flashdata('place_staff',$_POST['place']);
                            $this->session->set_flashdata('designation_staff',$_POST['designation']);
                            $this->session->set_flashdata('password_staff',$_POST['password']);
                            $this->session->set_flashdata('phone_staff',$_POST['phone']);
                            redirect(base_url().'dashboard_admin/staff');
            } else{
                         $data=[
                                        'name'        => $this->input->post('name'),
                                        'age'         => $this->input->post('name'),
                                        'phone'       => $this->input->post('phone'),
                                        'email'       => $this->input->post('email'),
                                        'place'       => $this->input->post('place'),
                                        'password'    => $this->input->post('password'),
                                        'designation' => $this->input->post('designation'),
                                        'created_at'  => date('d/m/Y h:i:s a'),
                                        ];
                                        $this->admin->insert_table('staff',$data);
                        redirect(base_url().'dashboard_admin/staff');
                    }
                }else{   

                $data['title']    = 'Staff';
                $data['role']     = $_SESSION['admin_o']['role'];
                $data['staff'] = $this->admin->fetch_table('staff');
                $this->load->view('adminPanel/header', $data);
                $this->load->view('adminPanel/sidebar');
                $this->load->view('adminPanel/staff');
                $this->load->view('adminPanel/footer');

            }
    }
    function delete_staff(){
        $this->admin->delete_table('staff',['id'=>$_POST['id']]);
    }

    function staff_update($id){
        if(isset($_POST['submit'])){
                        $data=[
                                    'name'        => $this->input->post('name'),
                                    'age'         => $this->input->post('name'),
                                    'phone'       => $this->input->post('phone'),
                                    'email'       => $this->input->post('email'),
                                    'place'       => $this->input->post('place'),
                                    'password'    => $this->input->post('password'),
                                    'designation' => $this->input->post('designation'),
                                    'updated_at'  => date('d/m/Y h:i:s a'),
                                    ];
                $this->admin->update_table('staff',$data,['id'=>$id]);
                redirect(base_url().'dashboard_admin/staff');
                }else{
                $data['role']       = $_SESSION['admin_o']['role'];
                $data['title']      = 'Staff Update';
                $staff              = $this->admin->fetch_single('staff',['id'=>$id]);
                $data['name']       = $staff[0]['name'];
                $data['age']        = $staff[0]['age'];
                $data['place']      = $staff[0]['place'];
                $data['phone']      = $staff[0]['phone'];
                $data['email']      = $staff[0]['email'];
                $data['password']   = $staff[0]['password'];
                $data['designation']= $staff[0]['designation'];
                $data['id']         = $id;
                $this->load->view('adminPanel/header',$data);
                $this->load->view('adminPanel/sidebar');
                $this->load->view('adminPanel/update_staff');
                $this->load->view('adminPanel/footer');
            }
    }

    function tax(){
        if(isset($_POST['submit'])){
            $data=[
                                    'tax'        => $this->input->post('tax'),
                                                                        ];
                $this->admin->insert_table('tax',$data);
                redirect(base_url().'dashboard_admin/tax');
        }else{
                $data['role']       = $_SESSION['admin_o']['role'];
                $data['title']      = 'Tax';
                $data['tax'] = $this->admin->fetch_table('tax');
                $this->load->view('adminPanel/header',$data);
                $this->load->view('adminPanel/sidebar');
                $this->load->view('adminPanel/tax');
                $this->load->view('adminPanel/footer');
        }
    }
    function delete_tax(){
        $this->admin->delete_table('tax',['id'=>$_POST['id']]);
    }


    function owner_update($id){
        if(isset($_POST['submit'])){
         $data = [

                        'name'             => $this->input->post('name'),
                        'age'              => $this->input->post('name'),
                        'phone'            => $this->input->post('phone'),
                        'updated_at'       => date('d/m/Y h:i:s a'),
                    ];
                    $this->admin->update_table('homestay_owner',$data,['id'=>$id]);
                    redirect(base_url().'homestay/owner');
        }else{
            $owner = $this->admin->fetch_single('homestay_owner',['id'=>$id]);
            $data['role']    = $_SESSION['admin_o']['role'];
            $data['title']   = 'Owner Update';
            $data['name']    = $owner[0]['name'];
            $data['phone']   = $owner[0]['phone'];
            $data['age']     = $owner[0]['age'];
            $data['voter']   = base_url('assets/images/owner/').$owner[0]['voter_id'];
            $data['aadhar']  = base_url('assets/images/owner/').$owner[0]['aadharcard'];
            $data['license'] = base_url('assets/images/owner/').$owner[0]['homestay_license'];
            $data['id']      = $id;
            $this->load->view('homestay/header',$data);
            $this->load->view('homestay/sidebar');
            $this->load->view('homestay/update_owner');
            $this->load->view('homestay/footer');
        }
    }
    function update_voter_id($id){
        if(isset($_POST['submit'])){
            $owner = $this->admin->fetch_single('homestay_owner',['id'=>$id]);
            unlink('./assets/images/owner/'.$owner[0]['voter_id']);
            $config = array(
                'upload_path' => './assets/images/owner',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'voter_id' => $img,
                    'updated_at' => date('d/m/Y h:i:s a'),
                ];
                $this->admin->update_table('homestay_owner',$data,['id'=>$id]);
                redirect(base_url().'homestay/owner_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['img1'] = TRUE;
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/change_image');
        $this->load->view('homestay/footer');

        }

    }
    function update_aadhar_card($id){
        if(isset($_POST['submit'])){
            $owner = $this->admin->fetch_single('homestay_owner',['id'=>$id]);
            unlink('./assets/images/owner/'.$owner[0]['aadharcard']);
            $config = array(
                'upload_path' => './assets/images/owner',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'aadharcard' => $img,
                    'updated_at' => date('d/m/Y h:i:s a'),
                ];
                $this->admin->update_table('homestay_owner',$data,['id'=>$id]);
                redirect(base_url().'homestay/owner_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['img2'] = TRUE;
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/change_image');
        $this->load->view('homestay/footer');

        }

    }
    function update_homestay_license($id){
        if(isset($_POST['submit'])){
            $owner = $this->admin->fetch_single('homestay_owner',['id'=>$id]);
            unlink('./assets/images/owner/'.$owner[0]['homestay_license']);
            $config = array(
                'upload_path' => './assets/images/owner',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'homestay_license' => $img,
                    'updated_at' => date('d/m/Y h:i:s a'),
                ];
                $this->admin->update_table('homestay_owner',$data,['id'=>$id]);
                redirect(base_url().'homestay/owner_update/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
        $data['id']   =$id;
        $data['role'] = $_SESSION['admin_o']['role'];
        $data['img3'] = TRUE;
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/change_image');
        $this->load->view('homestay/footer');

        }

    }

    function delete_activity(){
        $id = $_POST['id'];
        $activity = $this->admin->fetch_single('activity',['id'=>$id]);
        unlink('./assets/images/activity/'.$activity[0]['image']);
        $this->admin->delete_table('activity',array('id'=>$id));
    }
    function activity(){
        if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images/activity/',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/activity/');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                'name'        => $this->input->post('name'),
                'image'       => $img,
                'description' => $this->input->post('description'),
                ];
                $this->admin->insert_table('activity',$data);
                redirect(base_url().'dashboard_admin/activity');
            }else{
                echo $this->upload->display_errors();
            }
        
      }else{
        $data['role']   = $_SESSION['admin_o']['role'];
        $data['activity'] = $this->admin->fetch_table('activity');
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/activity');
        $this->load->view('adminPanel/footer');
        }
    }
     function update_activity($id){

         if(isset($_POST['submit'])){
                $data=[
                'name'        => $this->input->post('name'),
                'description' => $this->input->post('description'),
                ];
                $this->admin->update_table('activity',$data,array('id'=>$id));
                redirect(base_url().'dashboard_admin/activity');
        }else{
        $data['role']        = $_SESSION['admin_o']['role'];
        $activity            = $this->admin->fetch_single('activity',array('id' => $id));
        $data['name']        = $activity[0]['name'];
        $data['description'] = $activity[0]['description'];
        $data['img']         = base_url('assets/images/activity/').$activity[0]['image'];
        $data['id']          = $id;
        $data['title']       = 'Update activity';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_activity');
        $this->load->view('adminPanel/footer');
        }
    }
    function update_activity_img($id){
        if(isset($_POST['submit'])){
             $activity = $this->admin->fetch_single('activity',['id'=>$id]);
            unlink('./assets/images/activity/'.$activity[0]['image']);
            $config = array(
                'upload_path' => './assets/images/activity/',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'image' => $img
                ];
                $this->admin->update_table('activity',$data,array('id'=>$id));
                redirect(base_url().'dashboard_admin/update_activity/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['activity'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }

    function delete_offers(){
        $id = $_POST['id'];
        $offers = $this->admin->fetch_single('offers',['id'=>$id]);
            unlink('./assets/images/offers/'.$offers[0]['image']);
        $this->admin->delete_table('offers',array('id'=>$id));
    }
    function offers(){
        if(isset($_POST['submit'])){
            $config = array(
                'upload_path' => './assets/images/offers/',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/offers/');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                        'offer_name'       => $this->input->post('name'),
                        'terms&cond'       => $this->input->post('terms'),
                        'percentage'       => $this->input->post('percentage'),
                        'image' => $img
                        ];
                $this->admin->insert_table('offers',$data);
                redirect(base_url().'dashboard_admin/offers');
            }else{
                echo $this->upload->display_errors();
            }
                }else{
                $data['role']   = $_SESSION['admin_o']['role'];
                $data['offers'] = $this->admin->fetch_table('offers');
                $this->load->view('adminPanel/header', $data);
                $this->load->view('adminPanel/sidebar');
                $this->load->view('adminPanel/offers');
                $this->load->view('adminPanel/footer');
                }
    }
    function update_offers($id){

         if(isset($_POST['submit'])){
                $data=[
                'offer_name'       => $this->input->post('name'),
                'terms&cond'       => $this->input->post('terms'),
                'percentage'       => $this->input->post('percentage'),
                ];
                $this->admin->update_table('offers',$data,array('id'=>$id));
                redirect(base_url().'dashboard_admin/offers');
        }else{
        $data['role']        = $_SESSION['admin_o']['role'];
        $offers              = $this->admin->fetch_single('offers',array('id' => $id));
        $data['name']        = $offers[0]['offer_name'];
        $data['terms']       = $offers[0]['terms&cond'];
        $data['percentage']  = $offers[0]['percentage'];
        $data['img']         = base_url('assets/images/offers/').$offers[0]['image'];
        $data['id']          = $id;
        $data['title']       = 'Update offers';
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/update_offers');
        $this->load->view('adminPanel/footer');
        }
    }

    function update_offers_img($id){
        if(isset($_POST['submit'])){
             $offers = $this->admin->fetch_single('offers',['id'=>$id]);
            unlink('./assets/images/offers/'.$offers[0]['image']);
            $config = array(
                'upload_path' => './assets/images/offers/',
                'allowed_types'=> 'jpeg|png|jpg',
                'max_size' => 3072,
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/offers/');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $img = $image['file_name'];
                $data=[
                    'image' => $img
                ];
                $this->admin->update_table('offers',$data,array('id'=>$id));
                redirect(base_url().'dashboard_admin/update_offers/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['admin_o']['role'];
        $data['offers'] = TRUE;
        $this->load->view('adminPanel/header', $data);
        $this->load->view('adminPanel/sidebar');
        $this->load->view('adminPanel/change_image');
        $this->load->view('adminPanel/footer');

        }

    }


}
?>