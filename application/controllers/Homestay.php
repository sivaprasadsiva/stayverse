
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Homestay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('homestay_model','admin');
        $this->logged_in();
        $this->homestay_owner();
        date_default_timezone_set('asia/kolkata');
    }


    private function logged_in()
    {
         if(!empty($_SESSION['homestay'])){
        $check = $this->admin->check($_SESSION['homestay']['uname'], $_SESSION['homestay']['pass']);
        if (!$check) {
            redirect(base_url().'loginPage_homestay');
        }
        }else{
            redirect(base_url().'loginPage_homestay');
        }
    }
    private function homestay_owner(){

        $owner = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$_SESSION['homestay']['id']]);
            if(!$owner){
                redirect(base_url().'homestay_owner');

            }else if($owner[0]['approval'] != 1){
                redirect(base_url().'homestay_owner');
            }
    }

    function today_booking(){
        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view($_SESSION['homestay']['id']);
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/booking_today');
        $this->load->view('homestay/footer');

    }

    function index()

    {


        

        $data['role'] = $_SESSION['homestay']['name'];
        $rooms = $this->admin->rooms_view($_SESSION['homestay']['id']);
        $checking = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where b.homestay_id ='.$_SESSION['homestay']['id']);
        $data['checking'] = $checking;
        $data['rooms']     = $rooms;
        $total_rooms = $this->admin->fetch_all('SELECT COUNT(id) as c FROM rooms WHERE homestay_id ='.$_SESSION['homestay']['id']);
        $booked =  0;
        foreach($rooms as $r){
        foreach($checking as $check){
            if($check['rid'] == $r['rid']){
            $time = strtotime(date('Y-m-d'));
            $checkin = strtotime(date('y-m-d',strtotime($check['checkin'])));
            $checkout = strtotime(date('y-m-d',strtotime($check['checkout'])));
            if(($time >= $checkin && $time <= $checkout)||($time <= $checkin && $time >= $checkout)||($time > $checkin && $time <= $checkout )||($time <= $checkin && $time >= $checkin)){  
                $booked ++;
                $data['booked'] = $booked;
            }
        }}}
        $day = $this->admin->fetch_all('SELECT SUM(total_price_room) FROM booking WHERE homestay_id = "'.$_SESSION['homestay']['id'].'" AND  date(date) = CURDATE()');
        $month = $this->admin->fetch_all('SELECT SUM(total_price_room) FROM booking WHERE homestay_id = "'.$_SESSION['homestay']['id'].'" AND  month(date) = month(now())');
        $total = $this->admin->fetch_all('SELECT SUM(total_price_room) FROM booking WHERE homestay_id = "'.$_SESSION['homestay']['id'].'" ');
        $data['dayincome'] = $day[0]['SUM(total_price_room)'];
        $data['monthincome'] = $month[0]['SUM(total_price_room)'];
        $data['totalincome'] = $total[0]['SUM(total_price_room)'];
        $available = 0;
        if($total_rooms[0]['c'] >= $booked){
            $available = $total_rooms[0]['c'] - $booked;
        }

        $data['available'] = $available;
        $data['total_rooms'] = $total_rooms[0]['c'];
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/dashboard');
        $this->load->view('homestay/footer');
    }
    
    function pending(){


        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view($_SESSION['homestay']['id']);
        $data['paid'] = $this->admin->fetch_table('paid_to_homestay');
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/pending');
        $this->load->view('homestay/footer');
    
    }

    function credited(){


        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view($_SESSION['homestay']['id']);
        $data['paid'] = $this->admin->fetch_table('paid_to_homestay');
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/credit');
        $this->load->view('homestay/footer');
    
    }
    function owner(){

            $data['role'] = $_SESSION['homestay']['name'];
            $owner = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$_SESSION['homestay']['id']]);
            if(!empty($owner)){
            $data['name'] = $owner[0]['name'];
            $data['age'] = $owner[0]['age'];
            $data['phone'] = $owner[0]['phone'];
            $data['voter'] = $owner[0]['voter_id'];
            $data['license'] = $owner[0]['homestay_license'];
            $data['aadhar'] = $owner[0]['aadharcard'];
            }
            $this->load->view('homestay/header',$data);
            $this->load->view('homestay/sidebar');
            $this->load->view('homestay/owner');
            $this->load->view('homestay/footer');

    }
    function owner_update($id){
        if(isset($_POST['submit'])){
         $data = [

                        'name'             => $this->input->post('name'),
                        'age'              => $this->input->post('age'),
                        'phone'            => $this->input->post('phone'),
                        'updated_at'       => date('d/m/Y h:i:s a'),
                    ];
                    $this->admin->update_table('homestay_owner',$data,['id'=>$id]);
                    redirect(base_url().'homestay/owner');
        }else{
            $owner = $this->admin->fetch_single('homestay_owner',['id'=>$id]);
            $data['role']    = $_SESSION['homestay']['name'];
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
        $data['role']     = $_SESSION['homestay']['name'];
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
        $data['role']     = $_SESSION['homestay']['name'];
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
        $data['role'] = $_SESSION['homestay']['name'];
        $data['img3'] = TRUE;
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/change_image');
        $this->load->view('homestay/footer');

        }

    }


    function gallery(){

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
                    'homestay_id'   => $_SESSION['homestay']['id']
                ];
                $this->admin->insert_table('homestay_gallery',$data);
                redirect(base_url().'homestay/gallery');
            }else{
                echo $this->upload->display_errors();
            }
        }else{
        $data['role']      = $_SESSION['homestay']['name'];
        $data['gallery']   = $this->admin->fetch_single('homestay_gallery',['homestay_id'=>$_SESSION['homestay']['id']]);
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/gallery');
        $this->load->view('homestay/footer');
        }
    }
    function delete_gallery(){
        $id = $_POST['id'];
        $gallery = $this->admin->fetch_single('homestay_gallery',['id'=>$id]);
        unlink('./assets/images/'.$gallery[0]['image_gallery']);
        $this->admin->delete_table('homestay_gallery',['id'=>$id]);
    }
    
    function delete_rooms(){
        $id = $_POST['id'];
        $gallery = $this->admin->fetch_single('rooms',['id'=>$id]);
        unlink('./assets/images/'.$gallery[0]['image']);
        $this->admin->delete_table('rooms',['id'=>$id]);
    }
    function rooms(){
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
                'homestay_id'=> $_SESSION['homestay']['id'],
                'no'         => $this->input->post('no'),
                ];
                $this->admin->insert_table('rooms',$data);
                redirect(base_url().'homestay/rooms');
            }else{
                echo $this->upload->display_errors();
            }
        }
      else{
        $data['role']      = $_SESSION['homestay']['name'];
        $data['roomtype']  = $this->admin->fetch_table('roomtype');
        $data['rooms']     = $this->admin->rooms_view($_SESSION['homestay']['id']);
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/rooms');
        $this->load->view('homestay/footer');
        }
    }
     function update_rooms($id){

         if(isset($_POST['submit'])){
            
                $data=[
                'roomtype_id'   => $this->input->post('roomtype'),
                'details'    => $this->input->post('details'),
                'price'      => $this->input->post('price'),
                'offerprice' => $this->input->post('offerprice'),
                'no'         => $this->input->post('no'),
                ];
                $this->admin->update_table('rooms',$data,['id'=>$id]);
                redirect(base_url().'homestay/rooms'.$room);
        }else{
        $data['role']      = $_SESSION['homestay']['name'];
        $rooms             = $this->admin->rooms_view_id($id);
        $data['roomt']     = $rooms[0]['roomtype_id'];
        $data['offerprice']= $rooms[0]['offerprice'];
        $data['price']     = $rooms[0]['price'];
        $data['details']   = $rooms[0]['details'];
        $data['no']        = $rooms[0]['no'];
        $data['id']        = $id;
        $data['img']       = base_url('assets/images/').$rooms[0]['image'];
        $data['title']     = 'Update Room';
        $data['roomtype']  = $this->admin->fetch_table('roomtype');
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/update_rooms');
        $this->load->view('homestay/footer');
        }
    }
    function update_rooms_img($id){
        if(isset($_POST['submit'])){
            $gallery = $this->admin->fetch_single('rooms',['id'=>$id]);
            unlink('./assets/images/'.$gallery[0]['image']);
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
                $this->admin->update_table('rooms',$data,['id'=>$id]);
                redirect(base_url().'homestay/update_rooms/'.$id);
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $data['id']   =$id;
        $data['role']     = $_SESSION['homestay']['name'];
        $data['rooms'] = TRUE;
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/change_image');
        $this->load->view('homestay/footer');

        }

    }
    function rooms_booking(){
        $data['checking'] = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where b.homestay_id ='.$_SESSION['homestay']['id']);
            
        $data['role']      = $_SESSION['homestay']['name'];
        $data['rooms']     = $this->admin->rooms_view($_SESSION['homestay']['id']);
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/rooms_booking');
        $this->load->view('homestay/footer');
        }
    function search(){
        $search = $this->admin->fetch_all('SELECT *,rt.id as rtid,r.id as rid FROM rooms r INNER JOIN roomtype rt ON rt.id = r.roomtype_id WHERE (no LIKE "%'.$_POST['id'].'%" OR rt.roomtype LIKE "%'.$_POST['id'].'%")AND homestay_id ='.$_SESSION['homestay']['id']);
        if($search){
            foreach($search as $r){
                echo '<div class="col-md-3">
                            <div class="card" align="center">
                                <div class="card-body my-4">

                                    <h3>Room No : '. $r['no'].'</h3><br>
                                    <table class="table table-striped">
                                        <tr><th>Room Type  </th><td> '.$r['roomtype'].'</td></tr>
                                        <tr><th>Price </th><td> '.$r['price'].'</td></tr>
                                        <tr><th>Offer Price </th><td> '.$r['offerprice'].'</td></tr>
                                       
                                    </table>
                                    <a class="btn btn-success">Book</a>
                                </div>
                                
                            </div>
                        </div>';
            }
        }else{
            echo "No result found";
        }

    }
    function booking($id){

        $rooms = $this->admin->rooms_view1($id);
            $roomtype = str_replace(' ', '', strtolower($rooms[0]['roomtype']));

            if(($roomtype == 'tentstay') || ($roomtype == 'singleroom')){
                $allowed = 1;
            }else if($roomtype == 'doubleroom'){
                $allowed = 2;
            }else if($roomtype == 'tripleroom'){
                $allowed = 3;
            }else if($roomtype == 'deluxeroom'){
                $allowed = 4;
            }else{
                $allowed = 10;
            }

        if(isset($_POST['submit'])){
           
            $time = strtotime($_POST['checkin']);
            $time1 = strtotime($_POST['checkout']);
            $now = strtotime(date('y-m-d'));
            $amt = NULL;

            $checking = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where b.homestay_id ='.$_SESSION['homestay']['id']);
           $m = 0;
            foreach($checking as $c){
                    if($c['rid'] == $id){
                                $checkin = strtotime($c['checkin']);
                                $checkout = strtotime($c['checkout']);
                                if(($time >= $checkin && $time1 <= $checkout)||($time <= $checkin && $time1 >= $checkout)||($time == $checkout && $time1 <= $checkin)){ 
                                    $m =1;
                                    
                                }
                            }
                        }
                    
        
            if($m == 0){

                if($this->input->post('guests') <= $allowed){
                    
                    $data1=[
                        'customer_name'    => $this->input->post('name'),
                        'customer_phone'   => $this->input->post('phone'),
                        'proofno'          => $this->input->post('proofno'),
                        'proof'            => $this->input->post('proof'),
                        'checkin'          => $this->input->post('checkin'),
                        'checkout'         => $this->input->post('checkout'),
                        'guests'           => $this->input->post('guests'),
                        'homestay_id'      => $_SESSION['homestay']['id'],
                        'payment_mode'     => 'offline',
                        'status'           => 0,
                        
                    ];
                    $this->admin->insert_table('booking',$data1);
                    $last = $this->admin->last_id('booking');
                        $price = $this->admin->fetch_single('rooms',['id'=>$id]);
                        $amt += $price[0]['offerprice'];
                        $data2=[
                        'booking_id'    => $last,
                        'room_id'       => $id,
                        
                    ];
                    $this->admin->insert_table('book_room',$data2);
                    $data3 = ['total_price' =>$amt,
                                'total_price_room' => $amt,];
                    $this->admin->update_table('booking',$data3,['id'=>$last]);

                    echo "<script>alert('Successfully Booked.');</script>";
                }else{

                    $this->session->set_flashdata('checkout',$_POST['checkout']);
                    $this->session->set_flashdata('checkin',$_POST['checkin']);
                    $this->session->set_flashdata('name',$_POST['name']);
                    $this->session->set_flashdata('phone',$_POST['phone']);
                    $this->session->set_flashdata('guests',$_POST['guests']);
                    $this->session->set_flashdata('popup_error','<div class="alert alert-danger">The number of Guests is high.</div>');

                }
            }else{

                    $this->session->set_flashdata('checkout',$_POST['checkout']);
                    $this->session->set_flashdata('checkin',$_POST['checkin']);
                    $this->session->set_flashdata('name',$_POST['name']);
                    $this->session->set_flashdata('phone',$_POST['phone']);
                    $this->session->set_flashdata('guests',$_POST['guests']);
                    $this->session->set_flashdata('popup_error','<div class="alert alert-danger">Rooms are already booked on this dates.</div>');
                }
            
            }
             
            

            $data['rooms'] = $rooms;
            $data['allowed'] = $allowed;
            $data['role'] = $_SESSION['homestay']['name'];
            $data['title'] = 'Booking';
            $data['id']    = $id;
            $this->load->view('homestay/header',$data);
            $this->load->view('homestay/sidebar');
            $this->load->view('homestay/booking');
            $this->load->view('homestay/footer');
            $this->load->view('homestay/booking_jquery');
        
    
}
    function delete_booking(){
        $id = $_POST['id'];
        $book = $this->admin->fetch_single('booking',['id'=>$id]);
        $user = $book[0]['user_id'];
        $status = $book[0]['status'];
        if($status == 3){
            $this->admin->delete_table('user_offline',['id'=>$user]);
        }
        $this->admin->delete_table('booking',['id'=>$id]);
        $this->admin->delete_table('book_room',['booking_id'=>$id]);
        
    }
    function load_calendar($id){
        $checking = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid,bm.id as bmid,b.status as bstatus,payment_mode FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where r.id ='.$id);
            
           
           
            foreach($checking as $c){
                $date=date_create($c['checkout']);
                date_add($date,date_interval_create_from_date_string("1 days"));

                if($c['payment_mode'] == 'offline'){
                    $title = 'Booked';
                    $color = 'red';
                }else{
                    $title = 'Online Booked';
                    $color = 'green';
                }
                $checkin = strtotime($c['checkin']);
                $checkout = strtotime($c['checkout']);
                $now = strtotime(date('y-m-d'));

                if(!($now > $checkin && $now > $checkout)){
                
                 $booking_data[] = array(
                        'id'    => $c['bmid'],
                        'title' => $title,
                        'start' => date("Y-m-d",strtotime($c['checkin'])),
                        'end'   => date_format($date,"Y-m-d"),
                        'color' => $color,
                 );
            }
        }
            echo json_encode($booking_data);

    }
    
}
?>