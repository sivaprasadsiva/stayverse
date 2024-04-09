
            
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
                                    <h4 class="place-name detail-lists"><?= $room['loc']?></h4>


                                    

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
                                    <h2 class="hotel-name detail-lists"><?= $room['hname']?></h2>
                                    <h4 class="place-name detail-lists"><?= $room['loc']?></h4>


                                    

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
                                    <h2 class="hotel-name detail-lists"><?= $room['hname']?></h2>
                                    <h4 class="place-name detail-lists"><?= $room['loc']?></h4>


                                    

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
              