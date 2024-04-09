
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
        date_default_timezone_set('asia/kolkata');
    }


    private function logged_in()
    {
        if (empty($_SESSION['homestay'])) {
            redirect(base_url().'loginPage_homestay');
        }
    }

    function index()
    {

        $data['role'] = $_SESSION['homestay']['name'];
        $data['rooms'] = $this->admin->booking_rooms_view();
        $data['booking'] = $this->admin->booking_view($_SESSION['homestay']['id']);
        $data['user'] = $this->admin->fetch_table('user_offline');
        $this->load->view('homestay/header', $data);
        $this->load->view('homestay/sidebar');
        $this->load->view('homestay/dashboard');
        $this->load->view('homestay/footer');
    }
    
    function owner(){

        if(isset($_POST['submit'])){
            $config = array(
                'allowed_types' => 'jpeg|png|jpg',
                'max_size'      => 3072,
                'upload_path'   => './assets/images/owner',
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/owner');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('voter_id')){
                $voter = $this->upload->data();
                $v      = $voter['file_name'];

                if($this->upload->do_upload('aadhar')){
                    $aadhar = $this->upload->data();
                    $a = $aadhar['file_name'];

                    if($this->upload->do_upload('license')){
                    $license = $this->upload->data();
                    $l = $license['file_name'];

                    $data = [

                        'name'             => $this->input->post('name'),
                        'age'              => $this->input->post('name'),
                        'phone'            => $this->input->post('phone'),
                        'homestay_license' => $l,
                        'aadharcard'       => $a,
                        'voter_id'         => $v,
                        'homestay_id'      => $_SESSION['homestay']['id'],
                        'created_at'       => date('d/m/Y h:i:s a'),
                    ];
                    $this->admin->insert_table('homestay_owner',$data);
                    redirect(base_url().'homestay/owner');
                }else{
                    echo $this->upload->display_errors();
                }
                }else{
                    echo $this->upload->display_errors();
                }
            }else{
                    echo $this->upload->display_errors();
                }
          

        }else{
            $data['role'] = $_SESSION['homestay']['name'];
            $data['title'] = 'Owner';
            $data['owner'] = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$_SESSION['homestay']['id']]);
            $this->load->view('homestay/header',$data);
            $this->load->view('homestay/sidebar');
            $this->load->view('homestay/owner');
            $this->load->view('homestay/footer');
        }
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

        if(isset($_POST['submit'])){
           
            $time = strtotime($_POST['checkin']);
            $time1 = strtotime($_POST['checkout']);
            $now = strtotime(date('y-m-d'));
            $amt = NULL;
            
            if($time >= $now && $time1 >= $time){

            $checking = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where b.homestay_id ='.$_SESSION['homestay']['id']);
           $m = 0;
            foreach($checking as $c){
                    if($c['rid'] == $id){
                                $checkin = strtotime($c['checkin']);
                                $checkout = strtotime($c['checkout']);
                                if(($time >= $checkin && $time1 <= $checkout)||($time <= $checkin && $time1 >= $checkout)||($time > $checkin && $time <= $checkout )||($time1 <= $checkin && $time1 >= $checkin)){ 
                                    $m =1;
                                    
                                }
                            }
                        }
                    
        
            if($m == 0){

                $data = [

                        'name'             => $this->input->post('name'),
                        'phone'            => $this->input->post('phone'),
                    ];
                    $this->admin->insert_table('user_offline',$data);
                    $last = $this->admin->last_id('user_offline');
                    $data1=[
                        'checkin'          => $this->input->post('checkin'),
                        'checkout'         => $this->input->post('checkout'),
                        'guests'           => $this->input->post('guests'),
                        'homestay_id'      => $_SESSION['homestay']['id'],
                        'status'           => 3,
                        'user_id'          => $last,
                        
                    ];
                    $this->admin->insert_table('booking',$data1);
                    $last1 = $this->admin->last_id('booking');
                        $price = $this->admin->fetch_single('rooms',['id'=>$id]);
                        $amt += $price[0]['offerprice'];
                        $data2=[
                        'booking_id'    => $last1,
                        'room_id'       => $id,
                        
                    ];
                    $this->admin->insert_table('book_room',$data2);
                    $data3['price'] = $amt;
                    $this->admin->update_table('booking',$data3,['id'=>$last1]);

                    echo "<script>alert('Successfully Booked.');</script>";
                
            }else{

                    $this->session->set_flashdata('checkout',$_POST['checkout']);
                    $this->session->set_flashdata('checkin',$_POST['checkin']);
                    $this->session->set_flashdata('name',$_POST['name']);
                    $this->session->set_flashdata('phone',$_POST['phone']);
                    $this->session->set_flashdata('guests',$_POST['guests']);
                    $this->session->set_flashdata('popup_error','<div class="alert alert-danger">Rooms are already booked on this dates.</div>');
                }
            }else{
                    $this->session->set_flashdata('checkout',$_POST['checkout']);
                    $this->session->set_flashdata('checkin',$_POST['checkin']);
                    $this->session->set_flashdata('name',$_POST['name']);
                    $this->session->set_flashdata('phone',$_POST['phone']);
                    $this->session->set_flashdata('guests',$_POST['guests']);
                    $this->session->set_flashdata('popup_error','<div class="alert alert-danger">Select date properly</div>');
                }
            }
             
            $rooms = $this->admin->rooms_view($_SESSION['homestay']['id']);
            $data['rooms'] = $rooms;
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
        $checking = $this->admin->fetch_all('SELECT checkin,checkout,r.id as rid,bm.id as bmid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id where r.id ='.$id);
            
           
           
            foreach($checking as $c){
                $date=date_create($c['checkout']);
                date_add($date,date_interval_create_from_date_string("1 days"));

                if($c['bstatus'] == 3){
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