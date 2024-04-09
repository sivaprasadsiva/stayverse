
            <section class="container section-style search-result-section">
               <!--  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url().'index'?>">
                                <h4>Home</h4>
                            </a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <h4>Home stay <?php if(!empty($location))echo $location?></h4>
                        </li>
                    </ol>
                    <div class="left-align search-result-head">
                        <h2><?= $count?> Properties in <?php if(!empty($location))echo $location?></h2>
                    </div>
                </nav> -->
                <div class="filter-search">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <h3 class="sort">SORT BY: <span>Popular</span></h3>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                <h3>User Rating<span>(Highest First)</span></h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                <h3>Price<span>(Highest First)</span></h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">
                                <h3>Price<span>(Lowest First)</span></h3>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="seach-input-con">
                                <input class="seach-input search-hotel" type="text" placeholder="Search for locality" >
                                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                        </li>
                    </ul>

                </div>


            </section>
            <section class="section-style filter-search-area">
                <div class="">
                <div class="left-sort-area">
                    <div class="left-sort-area-con">
                        <div class="top-map-con">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62827.67681803747!2d76.33981206151941!3d10.202583843873839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080665e0bb9959%3A0x19b75e6b4e671ef1!2sAngamaly%2C%20Kerala!5e0!3m2!1sen!2sin!4v1697124069003!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="filter-box">
                            <div class="filter-head">
                                <div class="header">
                                    <h2>Filters</h2>
                                </div>
                                <!-- <div class="clear-btn">
                                    <h4>Clear</h4>
                                </div> -->
                            </div>
                            <div class="filter-body">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h4>Category</h4>
                                            </button>
                                        </h2>
                                        <div >
                                            <div class="accordion-body">
                                                <ul class="ul-style filter-ul">
                                                    <?php if(!empty($category)){foreach($category as $cat){ ?>
                                                    <li class="li-style check-box-style">
                                                        <input class="check-input check_home" type="checkbox" id="CheckCategory" value="<?= $cat['id']?>">
                                                        <label class="check-label" for="">
                                                            <h5><?= $cat['category']?></h5>
                                                        </label>
                                                    </li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <h4>Room Type</h4>
                                            </button>
                                        </h2>
                                        <div >
                                            <div class="accordion-body">
                                                <ul class="ul-style filter-ul">
                                                    <?php if(!empty($roomtypes)){foreach($roomtypes as $roomtype){ ?>
                                                    <li class="li-style check-box-style">
                                                        <input class="check-input check_home" type="checkbox" id="CheckRoomtype" value="<?= $roomtype['id']?>">
                                                        <label class="check-label" for="">
                                                            <h5><?= $roomtype['roomtype']?></h5>
                                                        </label>
                                                    </li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                aria-expanded="false" aria-controls="flush-collapseThree">
                                                <h4>Guest Love</h4>
                                            </button>
                                        </h2>
                                        <div >
                                            <div class="accordion-body">
                                                <ul class="ul-style filter-ul">
                                                    <?php if(!empty($guest_love)){foreach($guest_love as $guest){ ?>
                                                    <li class="li-style check-box-style">

                                                        <?php $pl = 0; if(!empty($plans)){
                                                            foreach($plans as $plan){
                                                                if($plan['plan_guestlove'] == $guest['id']){ $pl = 1; $p2 = 0;
                                                                    if(!empty($plan_booked)){
                                                                        foreach($plan_booked as $plan_book){
                                                                          if($plan_book['plan_id'] == $plan['pid']){ $p2 = 1; }}} 
                                                                            if($p2 == 1){?>

                                                    <input class="check-input check_home" type="checkbox" id="CheckServices" value="<?= $guest['id']?>">

                                                                <?php }else{?>

                                                    <input class="check-input check_home" type="checkbox" id="CheckServicesPlan" onclick="redirect('<?= base_url('userpanel/plan/'.$plan['pid']);?>')">


                                                                <?php }}}}

                                                                    if($pl == 0){?>

                                                    <input class="check-input check_home" type="checkbox" id="CheckServices" value="<?= $guest['id']?>">


                                                    <?php }?>


                                                        <label class="check-label" for="">
                                                        <?= '<h5>'.$guest['guestlove'].'</h5>';

                                                        if(!empty($plans)){
                                                            foreach($plans as $plan){
                                                                if($plan['plan_guestlove'] == $guest['id']){ ?>
                                                                    <img src="<?= base_url('assets/images/plan/'.$plan['icon']);?>" style="width: 30px; border-radius: 50%;">
                                                                <?php }}}?>


                                                        </label>
                                                    </li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" >
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <h4>Price Range</h4>
                                            </button>
                                        </h2>
                                        <div>
                                            <div class="accordion-body">
                                                <ul class="ul-style filter-ul">
                                                    <?php if(!empty($range)){foreach($range as $price){ ?>
                                                    <li class="li-style check-box-style">
                                                        <input class="check-input check_home" type="checkbox" id="CheckPrice" value="<?= $price['id']?>">
                                                        <label class="check-label" for="">
                                                            <h5>₹ <?= number_format($price['starting_price'])?> - ₹ <?=  number_format($price['ending_price'])?></h5>
                                                        </label>
                                                    </li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <h4>Rules</h4>
                                            </button>
                                        </h2>
                                        <div >
                                            <div class="accordion-body">
                                                <ul class="ul-style filter-ul">
                                                    <?php if(!empty($rules)){foreach($rules as $rule){ ?>
                                                    <li class="li-style check-box-style">
                                                        <input class="check-input check_home" type="checkbox" id="CheckRules" value="<?= $rule['id']?>">
                                                        <label class="check-label" for="">
                                                            <h5><?= $rule['homerules']?></h5>
                                                        </label>
                                                    </li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <button class="back-top-btn">
                                            <h4>Back to top</h4>
                                        </button>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content new_filter" id="pills-tabContent " style="display:none;"></div>
                <div class="tab-content old_filter" id="pills-tabContent ">
                    
                    <div class="search-head">
                        <h2>Showing Properties in <?php if(!empty($location))echo $location?></h2>
                    </div>
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <?php if(!empty($user_review)){foreach($user_review as $room){?>
                            <?php $g = $guests; $newallowed = $newallowed1 = $m5 = $m7 = 0;

                                            foreach($rooms as $r){ 
                                                if($r['homestay_id'] == $room['hid']){ 
                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                    $newallowed += $allowed;

                                                    $m6 = 0; 


                                                    if(!empty($checking)){
                                                        foreach($checking as $c){
                                                            if($c['homestay_id'] == $r['homestay_id']){
                                                                                if($c['rid'] == $r['rid']){
                                                            
                                                                                            $time = strtotime($c['checkin']);
                                                                                            $time1 = strtotime($c['checkout']);
                                                                                            $checkin1 = strtotime($checkin);
                                                                                            $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m6 = 1;}}}}}

                                                            if($m6 == 0){

                                                                $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                $newallowed1 += $allowed;

                                                            }
                                                        }
                                                    }
                                                    if($guests > $newallowed){
                                                                $m5 = 1;

                                                        }
                                                        if($guests > $newallowed1){
                                                                $m7 = 1;

                                                        }
                                                    ?>
                        <a href="<?php if(($m5 == 0) && ($m7 == 0)){ echo base_url().'userpanel/homestay/'.$room['hid'];}?>" class="places-list row">
                            <div class="left-list col-lg-3 col-md-3 col-sm-6 col-12">
                                <div class="large-images">
                                    <div class="image-con col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="images">
                                            <img src="<?= base_url();?>assets/images/<?= $room['photo']?>"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="center-list col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="hotel-details-con">
                                    <h2 class="hotel-name detail-lists"><?= $room['hname']?></h2>
                                    <h4 class="place-name detail-lists"><?= $room['location']?></h4>


                                    

                                            <?php if($m5 == 1){

                                                echo " <span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";

                                            }else{

                                                foreach($rooms as $r){ 
                                                    if($r['homestay_id'] == $room['hid']){ 
                                                       $m = 0; 
                                                                        if(!empty($checking)){
                                                                            foreach($checking as $c){
                                                                                if($c['homestay_id'] == $r['homestay_id']){
                                                                                                    if($c['rid'] == $r['rid']){
                                                            
                                                                                                                $time = strtotime($c['checkin']);
                                                                                                                $time1 = strtotime($c['checkout']);
                                                                                                                $checkin1 = strtotime($checkin);
                                                                                                                $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m =1;}}}}}  


                                                            


                                                            if($guests <= $newallowed1 ){
                                                                                    echo '<ul>';
                                                                                if($m == 1){
                                                                
                                                                                    echo '<li><span> '.$r['roomtype'].' :</span> <span style="color:red;">Not available </span></li>';
                                                                
                                                                                }else{


                                                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                                    echo '<li><span>'.$r['roomtype'].' : </span><span style="color:blue;">Available </span></li>';


                                                                                    if($guests <= $newallowed1 && $g > 0){
                                                                                                            if($g <= $allowed){

                                                                                                                    $g -= $allowed;

                                                                                    if (!empty($_SESSION['rooms'])) {


                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }else {


                                                                                            $g -= $allowed;
                                                                                            if (!empty($_SESSION['rooms'])) {
                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }

                                                                                    }
                                                                                }

                                                            echo '</ul>';

                                                            

                                                        }
                                                        }
                                                        
                                                    }

                                                        if($m7 == 1){

                                                            echo "<span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";
                                                            
                                                        }
                                                    // unset($_SESSION['rooms']);
                                                    } 


                                            ?>
                                    <!-- <h3 class="hotel-detail detail-lists">Entire Villa <span> -->
                                            <!-- <h5>2 Bedrooms/ Sleeps 4 guests</h5> -->
                                        </span></h3>
                                </div>
                                <div class="hotel-cancellation">
                                    <h5 class="cancel-alert">Free Cancellation till 24 hours before Check in</h5>
                                </div>
                            </div>
                            <div class="right-list col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="rating-section">
                                    <div class="rate-stars">
                                        <?php  $rem = $count = 0; if(!empty($review)){foreach($review as $r){
                                            if($r['homestay_id'] == $room['hid']){
                                                $rem += $r['rating'];
                                                $count ++;
                                                 }};
                                             }
                                             
                                        if($count != 0 && $rem != 0){
                                            $star1 = round($rem/$count);
                                             $star = 5;
                                            $rem1 = $star - $star1;
                                            for ($i = 1; $i <= $star1; $i++) { ?>
                                          <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                    <?php }
                                            for ($i = 1; $i <= $rem1; $i++) {?>
                                         <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                        <?php }}else{for ($i = 1; $i <= 5; $i++){?>
                                        <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                            <?php }}?>
                                    </div>
                                    <div class="rate-text">
                                        <h6><?= $count?> Rating</h6>
                                    </div>
                                </div>
                                <div class="hotel-amount-con">
                                    <h5 class="amount cut-amount"><i
                                            class="fa-solid fa-indian-rupee-sign"></i><span><?php echo $room['price']; ?></span>
                                    </h5>
                                    <h4 class="amount"><i class="fa-regular fa-indian-rupee-sign"></i><span><?php echo $room['offer']; ?></span>
                                    </h4>
                                    
                                </div>
                            </div>
                        </a>
                        <?php }}?>
                        <!-- <p style="background-color:grey;" class="text-center"><?php echo $link;?></p> -->
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?php if(!empty($homestay_asc)){foreach($homestay_asc as $room){?>
                        <?php $g = $guests; $newallowed = $newallowed1 = $m5 = $m7 = 0;

                                            foreach($rooms as $r){ 
                                                if($r['homestay_id'] == $room['hid']){ 
                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                    $newallowed += $allowed;

                                                    $m6 = 0; 


                                                    if(!empty($checking)){
                                                        foreach($checking as $c){
                                                            if($c['homestay_id'] == $r['homestay_id']){
                                                                                if($c['rid'] == $r['rid']){
                                                            
                                                                                            $time = strtotime($c['checkin']);
                                                                                            $time1 = strtotime($c['checkout']);
                                                                                            $checkin1 = strtotime($checkin);
                                                                                            $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m6 = 1;}}}}}

                                                            if($m6 == 0){

                                                                $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                $newallowed1 += $allowed;

                                                            }
                                                        }
                                                    }
                                                    if($guests > $newallowed){
                                                                $m5 = 1;

                                                        }
                                                        if($guests > $newallowed1){
                                                                $m7 = 1;

                                                        }
                                                    ?>
                        <a href="<?php if(($m5 == 0) && ($m7 == 0)){ echo base_url().'userpanel/homestay/'.$room['hid'];}?>" class="places-list row">
                            <div class="left-list col-lg-3 col-md-3 col-sm-6 col-12">
                                <div class="large-images">
                                    <div class="image-con col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="images">
                                            <img src="<?= base_url();?>assets/images/<?= $room['photo']?>"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="center-list col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="hotel-details-con">
                                    <h2 class="hotel-name detail-lists"><?= $room['name']?></h2>
                                    <h4 class="place-name detail-lists"><?= $room['location']?></h4>


                                    

                                            <?php if($m5 == 1){

                                                echo " <span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";

                                            }else{

                                                foreach($rooms as $r){ 
                                                    if($r['homestay_id'] == $room['hid']){ 
                                                       $m = 0; 
                                                                        if(!empty($checking)){
                                                                            foreach($checking as $c){
                                                                                if($c['homestay_id'] == $r['homestay_id']){
                                                                                                    if($c['rid'] == $r['rid']){
                                                            
                                                                                                                $time = strtotime($c['checkin']);
                                                                                                                $time1 = strtotime($c['checkout']);
                                                                                                                $checkin1 = strtotime($checkin);
                                                                                                                $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m =1;}}}}}  


                                                            


                                                            if($guests <= $newallowed1 ){
                                                                                    echo '<ul>';
                                                                                if($m == 1){
                                                                
                                                                                    echo '<li><span> '.$r['roomtype'].' :</span> <span style="color:red;">Not available </span></li>';
                                                                
                                                                                }else{


                                                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                                    echo '<li><span>'.$r['roomtype'].' : </span><span style="color:blue;">Available </span></li>';


                                                                                    if($guests <= $newallowed1 && $g > 0){
                                                                                                            if($g <= $allowed){

                                                                                                                    $g -= $allowed;

                                                                                    if (!empty($_SESSION['rooms'])) {


                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }else {


                                                                                            $g -= $allowed;
                                                                                            if (!empty($_SESSION['rooms'])) {
                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }

                                                                                    }
                                                                                }

                                                            echo '</ul>';

                                                            

                                                        }
                                                        }
                                                        
                                                    }

                                                        if($m7 == 1){

                                                            echo "<span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";
                                                            
                                                        }
                                                    // unset($_SESSION['rooms']);
                                                    } 


                                            ?>
                                    <!-- <h3 class="hotel-detail detail-lists">Entire Villa <span> -->
                                            <!-- <h5>2 Bedrooms/ Sleeps 4 guests</h5> -->
                                        </span></h3>
                                </div>
                                <div class="hotel-cancellation">
                                    <h5 class="cancel-alert">Free Cancellation till 24 hours before Check in</h5>
                                </div>
                            </div>
                            <div class="right-list col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="rating-section">
                                    <div class="rate-stars">
                                        <?php  $rem = $count = 0; if(!empty($review)){foreach($review as $r){
                                            if($r['homestay_id'] == $room['hid']){
                                                $rem += $r['rating'];
                                                $count ++;
                                                 }};
                                             }
                                             
                                        if($count != 0 && $rem != 0){
                                            $star1 = round($rem/$count);
                                             $star = 5;
                                            $rem1 = $star - $star1;
                                            for ($i = 1; $i <= $star1; $i++) { ?>
                                          <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                    <?php }
                                            for ($i = 1; $i <= $rem1; $i++) {?>
                                         <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                        <?php }}else{for ($i = 1; $i <= 5; $i++){?>
                                        <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                            <?php }}?>
                                    </div>
                                    <div class="rate-text">
                                        <h6><?= $count?> Rating</h6>
                                    </div>
                                </div>
                                <div class="hotel-amount-con">
                                    <h5 class="amount cut-amount"><i
                                            class="fa-solid fa-indian-rupee-sign"></i><span><?php echo $room['price']; ?></span>
                                    </h5>
                                    <h4 class="amount"><i class="fa-regular fa-indian-rupee-sign"></i><span><?php echo $room['offer']; ?></span>
                                    </h4>
                                    
                                </div>
                            </div>
                        </a>
                        <?php }}?>
                        <!-- <p style="background-color:grey;" class="text-center"><?php echo $link;?></p> -->
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                     <?php if(!empty($homestay_desc)){foreach($homestay_desc as $room){?>
                        <?php $g = $guests; $newallowed = $newallowed1 = $m5 = $m7 = 0;

                                            foreach($rooms as $r){ 
                                                if($r['homestay_id'] == $room['hid']){ 
                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                    $newallowed += $allowed;

                                                    $m6 = 0; 


                                                    if(!empty($checking)){
                                                        foreach($checking as $c){
                                                            if($c['homestay_id'] == $r['homestay_id']){
                                                                                if($c['rid'] == $r['rid']){
                                                            
                                                                                            $time = strtotime($c['checkin']);
                                                                                            $time1 = strtotime($c['checkout']);
                                                                                            $checkin1 = strtotime($checkin);
                                                                                            $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m6 = 1;}}}}}

                                                            if($m6 == 0){

                                                                $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                $newallowed1 += $allowed;

                                                            }
                                                        }
                                                    }
                                                    if($guests > $newallowed){
                                                                $m5 = 1;

                                                        }
                                                        if($guests > $newallowed1){
                                                                $m7 = 1;

                                                        }
                                                    ?>
                        <a href="<?php if(($m5 == 0) && ($m7 == 0)){ echo base_url().'userpanel/homestay/'.$room['hid'];}?>" class="places-list row">
                            <div class="left-list col-lg-3 col-md-3 col-sm-6 col-12">
                                <div class="large-images">
                                    <div class="image-con col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="images">
                                            <img src="<?= base_url();?>assets/images/<?= $room['photo']?>"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="center-list col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="hotel-details-con">
                                    <h2 class="hotel-name detail-lists"><?= $room['name']?></h2>
                                    <h4 class="place-name detail-lists"><?= $room['location']?></h4>


                                    

                                            <?php if($m5 == 1){

                                                echo " <span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";

                                            }else{

                                                foreach($rooms as $r){ 
                                                    if($r['homestay_id'] == $room['hid']){ 
                                                       $m = 0; 
                                                                        if(!empty($checking)){
                                                                            foreach($checking as $c){
                                                                                if($c['homestay_id'] == $r['homestay_id']){
                                                                                                    if($c['rid'] == $r['rid']){
                                                            
                                                                                                                $time = strtotime($c['checkin']);
                                                                                                                $time1 = strtotime($c['checkout']);
                                                                                                                $checkin1 = strtotime($checkin);
                                                                                                                $checkout1 = strtotime($checkout);


                                                            if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m =1;}}}}}  


                                                            


                                                            if($guests <= $newallowed1 ){
                                                                                    echo '<ul>';
                                                                                if($m == 1){
                                                                
                                                                                    echo '<li><span> '.$r['roomtype'].' :</span> <span style="color:red;">Not available </span></li>';
                                                                
                                                                                }else{


                                                                                    $roomtype = str_replace(' ', '', strtolower($r['roomtype']));

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
                                                                                    echo '<li><span>'.$r['roomtype'].' : </span><span style="color:blue;">Available </span></li>';


                                                                                    if($guests <= $newallowed1 && $g > 0){
                                                                                                            if($g <= $allowed){

                                                                                                                    $g -= $allowed;

                                                                                    if (!empty($_SESSION['rooms'])) {


                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }else {


                                                                                            $g -= $allowed;
                                                                                            if (!empty($_SESSION['rooms'])) {
                                                                                                $check = array_column($_SESSION['rooms'], 'rid');
                                                                                                if (!in_array($r['rid'], $check)) {
                                                                                                    $_SESSION['rooms'][] = [
                                                                                                        'rid' => $r['rid'],
                                                                                                    ];
                                                                                                }

                                                                                            } else {
                                                                                                $_SESSION['rooms'][] = [
                                                                                                    'rid' => $r['rid']
                                                                                                ];
                                                                                            }


                                                                                        }

                                                                                    }
                                                                                }

                                                            echo '</ul>';

                                                            

                                                        }
                                                        }
                                                        
                                                    }

                                                        if($m7 == 1){

                                                            echo "<span style='color:red;'> These homestay can't accomodate ".$guests." Guests.</span>";
                                                            
                                                        }
                                                    // unset($_SESSION['rooms']);
                                                    } 


                                            ?>
                                    <!-- <h3 class="hotel-detail detail-lists">Entire Villa <span> -->
                                            <!-- <h5>2 Bedrooms/ Sleeps 4 guests</h5> -->
                                        </span></h3>
                                </div>
                                <div class="hotel-cancellation">
                                    <h5 class="cancel-alert">Free Cancellation till 24 hours before Check in</h5>
                                </div>
                            </div>
                            <div class="right-list col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="rating-section">
                                    <div class="rate-stars">
                                        <?php  $rem = $count = 0; if(!empty($review)){foreach($review as $r){
                                            if($r['homestay_id'] == $room['hid']){
                                                $rem += $r['rating'];
                                                $count ++;
                                                 }};
                                             }
                                             
                                        if($count != 0 && $rem != 0){
                                            $star1 = round($rem/$count);
                                             $star = 5;
                                            $rem1 = $star - $star1;
                                            for ($i = 1; $i <= $star1; $i++) { ?>
                                          <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                    <?php }
                                            for ($i = 1; $i <= $rem1; $i++) {?>
                                         <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                        <?php }}else{for ($i = 1; $i <= 5; $i++){?>
                                        <div class="star disabled">
                                            <i class="fa-solid fa-star"></i>
                                        </div> 
                                            <?php }}?>
                                    </div>
                                    <div class="rate-text">
                                        <h6><?= $count?> Rating</h6>
                                    </div>
                                </div>
                                <div class="hotel-amount-con">
                                    <h5 class="amount cut-amount"><i
                                            class="fa-solid fa-indian-rupee-sign"></i><span><?php echo $room['price']; ?></span>
                                    </h5>
                                    <h4 class="amount"><i class="fa-regular fa-indian-rupee-sign"></i><span><?php echo $room['offer']; ?></span>
                                    </h4>
                                    
                                </div>
                            </div>
                        </a>
                        <?php }}?>
                        <!-- <p style="background-color:grey;" class="text-center"><?php echo $link;?></p> -->
                    </div>
                </div>
            </div>
            </section>
           