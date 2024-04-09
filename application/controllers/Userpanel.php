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
        date_default_timezone_set('Asia/Kolkata');
                            
    }
    function index1()
    {
        redirect(base_url('index'));
    }
    function index()
    {
        if (isset($_POST['submit'])) {
                $checkin = explode(' - ',$_POST['daterange']);
                    $_SESSION['userdetails'][] = [
                        'location' => strtok($_POST['location'], ','),
                        'checkin' => $checkin[0],
                        'checkout' => $checkin[1],
                        'guests' => $_POST['guests'],
                        'rooms' => $_POST['rooms'],
                    ];
                    
                    
                    redirect(base_url() . 'userpanel/homestay_user');

                    
        } 
           
            $data['login'] = 0;
            if (!empty($_SESSION['otp']['phone'])) {
                $data['login'] = 1;
            }
            if(!empty($_SESSION['userdetails'])){
                $data['search'] = $_SESSION['userdetails'] ;
            }
            $data['state'] = $this->user->state_view();
            $data['district'] = $this->user->district_view();
            $data['location'] = $this->user->location_view();
            $data['wonderland'] = $this->user->wonderland();
            $data['events'] = $this->user->events_view();
            $data['slide'] = $this->user->slider();
            $data['activities'] = $this->user->fetch_table('activity');
            $data['offers'] = $this->user->fetch_table('offers');
            $this->load->view('user/index',$data);
            $this->load->view('user/footer');
        
    }
    
    function homestay_user()
    {
        $arr = end($_SESSION['userdetails']);
        if (!empty($arr['location'])) {

            $data['checkin'] = $arr['checkin'];
            $data['checkout'] = $arr['checkout'];
            $data['guests'] = $arr['guests'];
            $data['login'] = 0;
            if (!empty($_SESSION['otp']['phone'])) {
                $data['login'] = 1;
                $data['plan_booked'] = $this->user->fetch_all('SELECT * FROM `plan_booking` WHERE phone ='. $_SESSION['otp']['phone'].' AND status = 1');
            }
            $locations = $arr['location'];

             $count = $this->user->getTotalRows_location($locations);

             if(!empty($count)){

                        $data['homestay'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `h`.`location` as `hlocation` FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = " '.$locations.'"  OR `s`.`state` = " '.$locations.'" ) GROUP BY `h`.`id` ' );
                        $data['homestay_asc'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `h`.`location` as `hlocation` FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'")GROUP BY `h`.`id` ORDER BY offer DESC ');
                        $data['homestay_desc'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `h`.`location` as `hlocation` FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'")GROUP BY `h`.`id` ORDER BY offer ASC ');
                        $data['user_review'] = $this->user->fetch_all('SELECT  *,SUM(rv.rating) as rating,`l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `h`.`location` as `hlocation`,h.name as hname  
                                                    FROM `homestay` `h` 

                                                    JOIN `location` `l` ON `l`.`id` = `h`.`location` 
                                                    JOIN `district` `d` ON `d`.`id` = `l`.`district_id` 
                                                    JOIN `state` `s` ON `s`.`id` = `d`.`state_id` 
                                                    JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` 
                                                    JOIN `category` `c` ON `c`.`id` = `hc`.`category` 
                                                    JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` 
                                                    JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` 
                                                    JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` 
                                                    JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` 
                                                    LEFT JOIN  review rv ON rv.homestay_id = h.id

                                                    WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'") GROUP BY h.id ORDER BY rating DESC');

            
            $data['page_title'] = 'Homestay List';
            $data['count'] = $count;
            $data['location'] = $locations;
            $data['review'] = $this->user->fetch_table('review');
            $data['rules'] = $this->user->homerules_view();
            $data['category'] = $this->user->category_view();
            $data['guest_love'] = $this->user->guestlove_view();
            $data['roomtypes'] = $this->user->roomtype_view();
            $data['rooms'] = $this->user->rooms();
            $data['range'] = $this->user->pricerange_view();
            $data['checking'] = $this->user->fetch_all('SELECT b.homestay_id as homestay_id,checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id WHERE b.status = 2');
            $data['plans'] = $this->user->fetch_all('SELECT *,p.id as pid,MIN(CAST(p.price as Float)) FROM plan p INNER join plan_guestlove pg on pg.plan_id = p.id INNER JOIN guestlove g on g.id = pg.plan_guestlove  GROUP by pg.plan_guestlove');
            
            $this->load->view('user/header', $data);
            $this->load->view('user/hotel-list');
            $this->load->view('user/footer');
        }else{
            echo "<script>alert('No homestay available for these location');</script>";
            $this->index();
        }

        } 
        // else {
            
        //     redirect(base_url(index));
        // }
    }

    // function recentSearch(){
    //     echo json_encode($_SESSION['userdetails']);
    // }

    function recentSearch2(){

        $search = $this->input->post('search');

        echo $search;
    }

    function recentSearch1($id){
        
        $_SESSION['userdetails'][] = [
                        'location' => $_SESSION['userdetails'][$id]['location'],
                        'checkin' => $_SESSION['userdetails'][$id]['checkin'],
                        'checkout' => $_SESSION['userdetails'][$id]['checkout'],
                        'guests' => $_SESSION['userdetails'][$id]['guests'],
                        'rooms' => $_SESSION['userdetails'][$id]['rooms'],
                    ];
        redirect(base_url() . 'userpanel/homestay_user');
    }

    function homestay($id)
    {
        $arr = end($_SESSION['userdetails']);
        if (!empty($arr['location'])) {
            $data['checkin'] = $arr['checkin'];
            $data['checkout'] = $arr['checkout'];
            $data['guests'] = $arr['guests'];

            if (!empty($_SESSION['rooms'])) {
                $data['rooms_session'] = $_SESSION['rooms'];
            }
            $data['login'] = 0;
            if (!empty($_SESSION['otp']['phone'])) {
                $data['login'] = 1;
            }
            $data['checking'] = $this->user->fetch_all('SELECT checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id  WHERE b.status = 2 AND b.homestay_id ='.$id);
            $rooms = $this->user->rooms_view($id);
            foreach($rooms as $room){
                $data['location1'] = $room['location'];
            }
            $data['rules'] = $this->user->homestay_rules_view_id($id);
            $data['gallery'] = $this->user->gallery_view($id);
            $data['rooms'] = $rooms;
            $data['roomtype'] = $this->user->rooms_type_view($id);
            $homestay = $this->user->homestay_view_id($id);
            $data['name'] = $homestay[0]['name'];
            $data['description'] = $homestay[0]['description'];
            $data['id'] = $id;
            $rat =  0;
            $review_count = $this->user->review_count($id);
            $review = $this->user->review_view($id);
            // $data['review'] = $this->user->review_view($id);
            if(!empty($review)){
                foreach($review as $r){
                    $rat += $r['rating'];
                }
                $data['rating'] = number_format($rat/$review_count,1);
            }
            $data['location'] = $arr['location'];
            $data['guests'] = $arr['guests'];
            $data['review_count'] = $review_count;
            $data['page_title'] = 'Homestay';
            $this->load->view('user/header', $data);
            $this->load->view('user/insideProperties');
            $this->load->view('user/footer');
        } 
        // else {
        //     redirect(base_url(index));
        // }
    }


    function homestay_booking_confirm($id)
    {
        if (!empty($_SESSION['userdetails'])) {
            $arr = end($_SESSION['userdetails']);
            if (!empty($_SESSION['rooms'])) {
                $data['login'] = 0;
                if (!empty($_SESSION['otp']['phone'])) {
                    $data['login'] = 1;
                    $data['phone'] = $_SESSION['otp']['phone'];
                }
                $data['checkin'] = $arr['checkin'];
                $data['checkout'] = $arr['checkout'];
                $data['guests'] = $arr['guests'];

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
                        $data['coupon_name'] = $coupon[0]['name'];
                        $data['coupon_id'] = $coupon[0]['id'];
                        // unset($_SESSION['coupon']);
                    }
                }
                $data['page_title'] = 'Booking Page';
                $data['rules'] = $this->user->homestay_rules_view_id($id);
                $data['gallery'] = $this->user->gallery_view_limit($id);
                $data['rooms'] = $this->user->rooms_view($id);
                $data['roomtype'] = $this->user->rooms_type_view($id);
                $homestay = $this->user->homestay_view_id($id);
                $data['name'] = $homestay[0]['name'];
                $data['description'] = $homestay[0]['description'];
                $data['photo'] = $homestay[0]['photo'];
                $data['id'] = $id;
                $data['state'] = $homestay[0]['state'];
                $data['district'] = $homestay[0]['district'];
                $data['location'] = $homestay[0]['location'];
                $data['review'] = $this->user->fetch_table('review');
                $tax = $this->user->fetch_table('tax');
                $data['tax'] = $tax[0]['tax'];

                $data['modal'] = FALSE;
                if(!empty($_SESSION['modal'])){
                        $data['modal'] = TRUE;
                }

                unset($_SESSION['modal']);


                $this->load->view('user/header', $data);
                $this->load->view('user/bookingPage');
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

   function payment($id)
    {
        $arr = end($_SESSION['userdetails']);
        if (!empty($_SESSION['otp']['phone'])) {
            $data = [
                'homestay_id' => $_POST['homestay_id'],
                'total_price' => $_POST['price'],
                'checkin' => $arr['checkin'],
                'checkout' => $arr['checkout'],
                'payment_mode' => 'online',
                'guests' => $arr['guests'],
                'discount' => $_POST['discount'],
                'email' => $_POST['email'],
                'customer_name' => $_POST['fname'].' '.$_POST['lname'],
                'customer_phone' => $_POST['phone'],
                'otp_phone' => $_SESSION['otp']['phone'],
                'coupon_id' => $_POST['coupon_id'],
                'total_price_room' => $_POST['total_price_rooms'],
                'status' => 1,
            ];
            $last = $this->user->booking($data);
            foreach ($_POST['room'] as $rm) {
                $room_insert = [

                    'booking_id' => $last,
                    'room_id' => $rm,
                ];
                $this->user->book_room($room_insert);
            }

            $booking_id = $last;


            redirect(base_url().'PHP_Kit/CUSTOM_CHECKOUT_FORM_KIT/dataFrom.php?booking='.$booking_id);


        } else {
            $_SESSION['modal'] = TRUE;
            redirect(base_url().'userpanel/homestay_booking_confirm/'.$id);
        }

    }

    function booking()
    {
        if(!empty($_SESSION['otp']['phone'])){

        $data['login'] = 1;
        unset($_SESSION['coupon']);
        unset($_SESSION['rooms']);
        unset($_SESSION['modal']);

        $data['booking'] = $this->user->booking_view_id($_SESSION['otp']['phone']);
        $data['rooms'] = $this->user->booking_rooms_view();
        
    }else{
        $_SESSION['modal'] = TRUE;
        $data['modal'] = TRUE;
        $data['login'] = 0;
    }
        $data['page_title'] = 'Booking';
        $this->load->view('user/header', $data);
        $this->load->view('user/booking');
        $this->load->view('user/footer');
    }

    function plan($id){
        $data['login'] = 0;
        $payment = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
            $planBooking = $this->user->fetch_all('SELECT * FROM `plan_booking` WHERE phone ='. $_SESSION['otp']['phone'].' AND plan_id = 6 AND status = 2');
            if($planBooking){
                $payment = 1;
            }
        }
        if(!empty($_SESSION['modal'])){
                        $data['modal'] = TRUE;
                }

                unset($_SESSION['modal']);
        $plan = $this->user->fetch_single('plan',['id'=>$id]);
        $data['page_title'] = 'Plan';
        $data['payment'] = $payment;
        $data['plan_image'] =$plan[0]['plan_image'];
        $data['plan_name'] =$plan[0]['name'];
        $data['plan_price'] =$plan[0]['price'];
        $data['services'] = $this->user->fetch_all('SELECT * FROM  plan_guestlove pg JOIN guestlove g ON g.id = pg.plan_guestlove WHERE pg.plan_id ='.$id);
        $data['id'] =$id;
        $this->load->view('user/header', $data);
        $this->load->view('user/plan');
        $this->load->view('user/footer');

    }

    function plan_payment($id){

        if (!empty($_SESSION['otp']['phone'])) {
            $plan = $this->user->fetch_single('plan',['id'=>$id]);
            $price = $plan[0]['price'];
            $data = [
                'plan_id' => $id,
                'plan_price' => $price,
                'phone' => $_SESSION['otp']['phone'],
                
            ];
            $this->user->insert_table('plan_booking',$data);
            $last = $this->user->last_id('plan_booking');
            redirect(base_url().'PHP_Kit/CUSTOM_CHECKOUT_FORM_KIT/dataFrom.php?booking_plan='.$last);
        } else {
            $_SESSION['modal'] = TRUE;
            redirect(base_url().'userpanel/plan/'.$id);
        }

    }

    function plan_booking(){

        if(!empty($_SESSION['otp']['phone'])){

        $data['login'] = 1;
        unset($_SESSION['modal']);

        $data['booking_plan'] = $this->user->fetch_all('SELECT * FROM `plan_booking` pb LEFT JOIN plan p on p.id = pb.plan_id  WHERE pb.phone ='. $_SESSION['otp']['phone'].' order by pb.id DESC');
        
        }else{
            $_SESSION['modal'] = TRUE;
            $data['modal'] = TRUE;
            $data['login'] = 0;
        }
        
            $data['page_title'] = 'Plan Booking';
            $this->load->view('user/header', $data);
            $this->load->view('user/booking_plan');
            $this->load->view('user/footer');
    }


    function search_hotel(){
        $arr = end($_SESSION['userdetails']);
        if (!empty($arr['location'])) {

            $search = $this->input->post('search');
            $locations = $arr['location'];

                                        $data['homestay'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `l`.`location` as `hlocation`,h.name as hname , l.location as loc FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'") AND (h.name LIKE "%'.$search.'%" OR l.location LIKE "%'.$search.'%" OR d.district LIKE "%'.$search.'%" OR s.state LIKE "%'.$search.'%" ) GROUP BY `h`.`id`  ');


                                        $data['homestay_asc'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `l`.`location` as `hlocation`,h.name as hname , l.location as loc FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'") AND (h.name LIKE "%'.$search.'%" OR l.location LIKE "%'.$search.'%" OR d.district LIKE "%'.$search.'%" OR s.state LIKE "%'.$search.'%" ) GROUP BY `h`.`id` ORDER BY offer DESC ');


                                        $data['homestay_desc'] = $this->user->fetch_all('SELECT *, `l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `l`.`location` as `hlocation`,h.name as hname , l.location as loc FROM `homestay` `h` JOIN `location` `l` ON `l`.`id` = `h`.`location` JOIN `district` `d` ON `d`.`id` = `l`.`district_id` JOIN `state` `s` ON `s`.`id` = `d`.`state_id` JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` JOIN `category` `c` ON `c`.`id` = `hc`.`category` JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'") AND (h.name LIKE "%'.$search.'%" OR l.location LIKE "%'.$search.'%" OR d.district LIKE "%'.$search.'%" OR s.state LIKE "%'.$search.'%" ) GROUP BY `h`.`id` ORDER BY offer ASC ');

                                        $data['user_review'] = $this->user->fetch_all('SELECT  *,SUM(rv.rating) as rating,`l`.`id` as `lid`, `h`.`id` as `hid`, `s`.`id` as `sid`, `d`.`id` as `did`, `hc`.`id` as `hcid`, `c`.`id` as `cid`, `hrt`.`id` as `hrtid`, `hs`.`id` as `hsid`, `hr`.`id` as `hrid`, `r`.`id` as `rid`,MIN(CAST(r.offerprice as Float)) as offer, `h`.`location` as `hlocation`,h.name as hname , l.location as loc 
                                                FROM `homestay` `h` 

                                                JOIN `location` `l` ON `l`.`id` = `h`.`location` 
                                                JOIN `district` `d` ON `d`.`id` = `l`.`district_id` 
                                                JOIN `state` `s` ON `s`.`id` = `d`.`state_id` 
                                                JOIN `homestay_category` `hc` ON `hc`.`homestay_id` = `h`.`id` 
                                                JOIN `category` `c` ON `c`.`id` = `hc`.`category` 
                                                JOIN `homestay_roomtype` `hrt` ON `hrt`.`homestay_id` = `h`.`id` 
                                                JOIN `homestay_services` `hs` ON `hs`.`homestay_id` = `h`.`id` 
                                                JOIN `homestay_rules` `hr` ON `hr`.`homestay_id` = `h`.`id` 
                                                JOIN `rooms` `r` ON `r`.`homestay_id` = `h`.`id` 
                                                LEFT JOIN  review rv ON rv.homestay_id = h.id

                                                WHERE (`l`.`location` = "'.$locations.'" OR `d`.`district` = "'.$locations.'" OR `s`.`state` = "'.$locations.'")  AND (h.name LIKE "%'.$search.'%" OR l.location LIKE "%'.$search.'%" OR d.district LIKE "%'.$search.'%" OR s.state LIKE "%'.$search.'%" ) GROUP BY h.id ORDER BY rating DESC');

                            $data['checkin'] = $arr['checkin'];
                            $data['checkout'] = $arr['checkout'];
                            $data['guests'] = $arr['guests'];    
                            $data['rooms'] = $this->user->rooms();
                            $data['checking'] = $this->user->fetch_all('SELECT b.homestay_id as homestay_id,checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id WHERE b.status = 2');
                            $data['review'] = $this->user->fetch_table('review');
                            $this->load->view('user/filter', $data);

                        } else {
                            echo '<p>Please select the location</p>';
                        }

    }



    function filter()
    {
        $arr = end($_SESSION['userdetails']);
        if (!empty($arr['location'])) {


            $locations = $arr['location'];
            $data['checkin'] = $arr['checkin'];
            $data['checkout'] = $arr['checkout'];
            $data['guests'] = $arr['guests'];
            
            $category = $this->input->post('category');
            $roomtype = $this->input->post('roomtype');
            $services = $this->input->post('services');
            $price = $this->input->post('price');
            $rules = $this->input->post('rules');

                        $data['location'] = $locations;
                        $data['homestay'] = $this->user->filter_data_location($locations, $category, $roomtype, $services, $price, $rules);
                        $data['homestay_asc'] = $this->user->filter_data_location_asc($locations, $category, $roomtype, $services, $price, $rules);
                        $data['homestay_desc'] = $this->user->filter_data_location_desc($locations, $category, $roomtype, $services, $price, $rules);
                        $data['user_review'] = $this->user->filter_data_location_review($locations, $category, $roomtype, $services, $price, $rules);
                        $data['checking'] = $this->user->fetch_all('SELECT b.homestay_id as homestay_id,checkin,checkout,r.id as rid,b.status as bstatus FROM rooms r INNER JOIN book_room bm on bm.room_id = r.id INNER JOIN booking b on b.id = bm.booking_id WHERE b.status = 2');
                   
            $data['rooms'] = $this->user->rooms();
            $data['review'] = $this->user->fetch_table('review');
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

    
    

    function user_logout()
    {
        unset($_SESSION['otp']);
        redirect(base_url() . 'index');
    }

   

    
    function events($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
        }
        $events = $this->user->events_view_id($id);
        $data['name'] = $events[0]['name'];
        $data['details'] = $events[0]['details'];
        $data['image'] = $events[0]['photo'];
        $data['id'] = $id;
        $data['events'] = $this->user->fetch_table('events');
        $data['page_title'] = 'Events';
        $this->load->view('user/header', $data);
        $this->load->view('user/events');
        $this->load->view('user/footer');
    }

    function offers($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
        }
        $offers = $this->user->fetch_single('offers',['id'=>$id]);
        $data['name'] = $offers[0]['offer_name'];
        $data['terms'] = $offers[0]['terms&cond'];
        $data['image'] = $offers[0]['image'];
        $data['id'] = $id;
        $data['page_title'] = 'Offers';
        $this->load->view('user/header', $data);
        $this->load->view('user/offers');
        $this->load->view('user/footer');
    }


    function wonderland($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
        }
        $wonderland = $this->user->wonderland_view_id($id);
        $data['name'] = $wonderland[0]['name'];
        $data['details'] = $wonderland[0]['description'];
        $data['image'] = $wonderland[0]['image'];
        $data['id'] = $wonderland[0]['id'];
        $data['wonderlands'] = $this->user->fetch_table('wonderland');
        $data['page_title'] = 'wonderland';
        $this->load->view('user/header', $data);
        $this->load->view('user/wonderland');
        $this->load->view('user/footer');
    }
    function review_add()
    {
        $data = [
            'email' => $_POST['email'],
            'comment' => $_POST['comment'],
            'name' => $_POST['name'],
            'rating' => $_POST['rating'],
            'homestay_id' => $_POST['homestay'],
        ];
        $this->user->review($data);
    }
    function allreview($id)
    {
        $data['login'] = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
        }
        $data['review'] = $this->user->allreview($id);
        $data['page_title'] = 'Review';
        $this->load->view('user/header', $data);
        $this->load->view('user/review');
        $this->load->view('user/footer');
    }
    function coupon($id)
    {
        $_SESSION['coupon'] = $id;
    }

    function removeCoupon(){
            unset($_SESSION['coupon']);
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

        curl_close($curl);;

    }

    function otp_checker($phone,$otp){
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
                    $resp[] = array('success'=>'Success');
                    
                }else {
                    $resp[] = array('error'=>'Error');
                }
                echo json_encode($resp);
               
            
        
    }
    

    function activity($id){
        $data['login'] = 0;
        if (!empty($_SESSION['otp']['phone'])) {
            $data['login'] = 1;
        }
        $activity = $this->user->fetch_single('activity',['id'=>$id]);
        $data['activity_image'] =$activity[0]['image'];
        $data['activity_description'] =$activity[0]['description'];
        $data['activity_name'] =$activity[0]['name'];
        $data['activity_id'] =$activity[0]['id'];
        $data['activity'] = $this->user->fetch_table('activity');
        $data['page_title'] = 'Activity';
        $this->load->view('user/header', $data);
        $this->load->view('user/activity');
        $this->load->view('user/footer');
    }




    
    

}