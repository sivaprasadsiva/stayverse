
            <!-- <section class="section-style search-result-section">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index')?>">
                                <h4>Home</h4>
                            </a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('userpanel/homestay_user')?>">
                                <h4>Home stay in <?= $location?></h4>
                            </a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <h4><?= $name?></h4>
                        </li>
                    </ol>
                </nav>
            </section>
 -->            <section class="container section-style blue-bg">
                <div class="hotel-box row">
                    <div class="left-hotel-box col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="top-image-section">
                            <div class="left-images-con">
                                <?php 
                                if(!empty($gallery)){$i = 0;foreach($gallery as $g){
                                    if($i == 2) break;?>
                                <div class="img-box-con col-lg-12 col-md-12 col-sm-6 col-6">
                                    <div class="left-image">
                                        <img src="<?= base_url().'assets/images/'.$g['image_gallery']?>"
                                            alt="">
                                    </div>
                                </div>
                            <?php $i++;}}?>
                                
                            </div>
                            <div class="right-images-con">
                                <div class="right-img-box-con col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="carousel-container">
                                        <div class="carousel-container-con">
                                            <div class="carousel">
                                                <div class="carousel-images">
                                                    <?php if(!empty($gallery)){$n=0;foreach($gallery as $g){?>
                                                    <div class="image-container">
                                                        <img class="carousel-image carousel-image-1"
                                                            src="<?= base_url().'assets/images/'.$g['image_gallery']?>"
                                                            alt="">
                                                    </div>
                                                    <?php $n++;}}?>
                                                </div>

                                            </div>
                                            <button class="carousel-btn btn-left" id="previous"><i
                                                    class="fa-solid fa-chevron-left icon-left"></i></button>
                                            <button class="carousel-btn btn-right" id="next"><i
                                                    class="fa-solid fa-chevron-right icon-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hotel-box-body-area">
                            <div class="facilities facility-area">
                                <h5>Homestay offering a restaurant, caretaker, living room & Wi-Fi</h5>
                            </div>
                            <div class="hotel-name facility-area">
                                <h1><?= $name?></h1>
                            </div>
                            <div class="hotel-location facility-area">
                                <span class="location"><i class="fa-solid fa-location-dot"></i></span>
                                <h21><?= $location1?></h2>
                            </div>
                            <!-- <div class="room-details ">
                                <div class="facility-area ">
                                    <h2>Room in a Homestay</h2>
                                </div>
                                <div class="rooms-box-style row">
                                    <div class="rooms-boxes col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="rooms">
                                            <span><i class="fa-solid fa-door-open"></i></span>
                                            <div class="room-detail-box">
                                                <h3>1 Bedroom</h3>
                                                <h5>1 Bathroom,&nbsp;1 Double Bed</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rooms-boxes col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="rooms">
                                            <span><i class="fa-solid fa-user-group"></i></span>
                                            <div class="room-detail-box">
                                                <h3>Sleeps <?= $guests?> guests</h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="room-details ">
                                <div class="facility-area ">
                                    <h2>Popular Amenities</h2>
                                </div>
                                <div class="rooms-box-style row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="room-facilities">
                                            <span class="grey-box">
                                                <i class="fa-solid fa-bowl-food"></i>
                                            </span>
                                            <h5>Breakfast</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="room-facilities">
                                            <span class="grey-box">
                                                <i class="fa-solid fa-tv"></i>
                                            </span>
                                            <h5>Cable TV</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="room-facilities">
                                            <span class="grey-box">
                                                <i class="fa-solid fa-mug-hot"></i>
                                            </span>
                                            <h5>Tea/coffee</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="room-facilities">
                                            <span class="grey-box">
                                                <i class="fa-regular fa-snowflake"></i>
                                            </span>
                                            <h5>Air Conditioner</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="room-facilities">
                                            <span class="grey-box">
                                                <i class="fa-solid fa-wifi"></i>
                                            </span>
                                            <h5>High Speed WIFI</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>House Rules</h2>
                            </div>
                            <ul class="ul-style rules-list">
                                <?php foreach($rules as $rule){if($rule['homestay_id'] == $id){?>
                     <li>
                        <?= $rule['homerules']?>
                     </li>
                  <?php }}?>
                            </ul>
                        </div>
                        <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>Cancellation</h2>
                            </div>
                            <h5>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly
                                believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there
                                isn't
                                anything embarrassing hidden in the middle of text.</h5>
                        </div>
                        <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>Choose Room</h2>
                            </div>
                            <div class="select-rooms row" id="room_id">
                                <?php  if(!empty($rooms)){foreach($rooms as $room){ $r = 1 ; ?>
                                <div class="room-selection-box-con col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="room-selection-box">
                                        <div class="room-head">
                                            <div class="head-detail">
                                                <h5 class="room-grade"><?= $room['roomtype']?></h5>
                                                <!-- <h5 class="no-of-people"><?= $guests?> Adults</h5> -->
                                            </div>
                                            <!-- <div class="room-rated">
                                                <span class="rated top-rated"></span>
                                            </div> -->
                                        </div>
                                        <div class="room-body row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="min-height: 300px;">
                                                <div class="room-image-con" >
                                                    <img src="<?= base_url();?>assets/images/<?= $room['image']?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="room-foot">
                                            <div class="select-box-area-con">
                                                <div class="select-box-area">
                                                    <?php $m = 0;if(!empty($checking)){ foreach($checking as $c){if($c['rid'] == $room['rid']){
                                $time = strtotime($c['checkin']);
                                $time1 = strtotime($c['checkout']);
                                $checkin1 = strtotime($checkin);
                                $checkout1 = strtotime($checkout);

                                if(($time >= $checkin1 && $time1 <= $checkout1)||($time <= $checkin1 && $time1 >= $checkout1)||($time == $checkout && $time1 <= $checkin)){  $m = 1;}}}}?>
                                <?php if($m == 1){?>
                                    <label for="1stroom">
                                                        <h4 style="color:red;">Not available</h4>
                                                    </label>
                                                <?php }if($m == 0){if(!empty($rooms_session)){foreach($rooms_session as $rs){ if($rs['rid'] == $room['rid']){$r = 0;?>

                                                    <input name="rooms" type="checkbox" class="radio-input" id="select_remove"  data-id="<?= $room['rid']?>" checked>
                                                    <label for="1stroom">
                                                        <h4>Selected</h4>
                                                    </label>
                                                    <?php }}}if($r == 1){?>
                                                        <input name="rooms"  type="checkbox" class="radio-input" id="select_room" data-id="<?= $room['rid']?>">
                                                    <label for="1stroom">
                                                        <h4>Room Only</h4>
                                                    </label>

                                                    <?php }}?>
                                                    
                                                </div>
                                                <div class="room-amount-con row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="left-amount">
                                                            <ul class="">
                                                                <li>
                                                                    <h5>No meals Included</h5>
                                                                </li>
                                                                <li class="text-red">
                                                                    <h5>Non- Refundable</h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="right-amount">
                                                            <div class="hotel-amount-con">
                                                                <h5 class="amount cut-amount"><i
                                                                        class="fa-solid fa-indian-rupee-sign"></i><span> <?= $room['price']?></span>
                                                                </h5>
                                                                <h4 class="amount"><i
                                                                        class="fa-solid fa-indian-rupee-sign"></i><span> <?= $room['offerprice']?></span>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <a href="" class="detail-link">More Details</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </div>
                        <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>Guest reviews</h2>
                            </div>
                            <div class="review-box">
                                <div class="review-head">
                                    <?php if(!empty($rating)){?>
                            
                                    <div class="review-area">
                                        <h3><?php echo $rating;?></h3>
                                    </div>
                                    <?php }?>
                                    <div class="no-of-reviews">
                                        <h4><?=$review_count?>reviews</h4>
                                    </div>
                                    <div class="all-reviews">
                                        <a href="<?= base_url().'userpanel/allreview/'.$id?>">
                                            <h4>Read all reviews</h4>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="review-body">
                                    <div class="review-body-con row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                            <div class="review-percentange-con">
                                                <div class="precentage-head">
                                                    <div class="percentage-left-head">
                                                        <h6>Location</h6>
                                                    </div>
                                                    <div class="percentage-right-head">
                                                        <h6>3.5</h6>
                                                    </div>
                                                </div>
                                                <div class="precentage-body">
                                                    <div style="width: 50%;" class="precentage-box"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                            <div class="review-percentange-con">
                                                <div class="precentage-head">
                                                    <div class="percentage-left-head">
                                                        <h6>Room</h6>
                                                    </div>
                                                    <div class="percentage-right-head">
                                                        <h6>3.5</h6>
                                                    </div>
                                                </div>
                                                <div class="precentage-body">
                                                    <div style="width: 50%;" class="precentage-box"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                            <div class="review-percentange-con">
                                                <div class="precentage-head">
                                                    <div class="percentage-left-head">
                                                        <h6>Food</h6>
                                                    </div>
                                                    <div class="percentage-right-head">
                                                        <h6>3.5</h6>
                                                    </div>
                                                </div>
                                                <div class="precentage-body">
                                                    <div style="width: 50%;" class="precentage-box"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                            <div class="review-percentange-con">
                                                <div class="precentage-head">
                                                    <div class="percentage-left-head">
                                                        <h6>Amenities</h6>
                                                    </div>
                                                    <div class="percentage-right-head">
                                                        <h6>3.5</h6>
                                                    </div>
                                                </div>
                                                <div class="precentage-body">
                                                    <div style="width: 50%;" class="precentage-box"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>Featured Reviews by Couples</h2>
                            </div>
                            <div class="review-box review-box-style">
                                <div class="reviers-head">
                                    <h2>Food, location and hygiene</h2>
                                </div>
                                <div class="reviers-body">
                                    <p class="reviers-paragraph"><span class="rated-text">rated</span>&nbsp;<span
                                            class="rated-box">8.2</span>&nbsp;by Paridhi Shukla . Couple Traveller . Dec
                                        25, 2022
                                        Food was excellent but expensive. Location was ok ok. They claim it to be beach
                                        resort but you still need to walk a lot to reach the beach</p>
                                </div>
                            </div>
                            <div class="review-box review-box-style">
                                <div class="reviers-head">
                                    <h2>Food, location and hygiene</h2>
                                </div>
                                <div class="reviers-body">
                                    <p class="reviers-paragraph"><span class="rated-text">rated</span>&nbsp;<span
                                            class="rated-box">8.2</span>&nbsp;by Paridhi Shukla . Couple Traveller . Dec
                                        25, 2022
                                        Food was excellent but expensive. Location was ok ok. They claim it to be beach
                                        resort but you still need to walk a lot to reach the beach</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="hotel-box-body-area">
                            <div class="facility-area">
                                <h2>Write a review</h2>
                            </div>
                            <div class="review-box review-input-area">
                                <input type="hidden" name="homestay" id="review_homestay" value='<?= $id?>'>

                                <div class="ratingStars">
                                    
                                    Your Rating 
                                     <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" hidden required/>
                                        <label for="star5" title="Excellent">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" hidden required/>
                                        <label for="star4" title="Very Good">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" hidden required/>
                                        <label for="star3" title="Good">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" hidden required/>
                                        <label for="star2" title="Was ok">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" hidden required/>
                                        <label for="star1" title="Bad">1 star</label>
                                    </div>
                                    <p style="color:red;font-size:12px;display: none;" id="error_rating">Rating required.</p>

                                </div>
                                <div class="input-box">
                                    
                                    <input class="input-box-style" type="text" id="review_name" placeholder="Enter your name">
                                    <p style="color:red;font-size:12px;display: none;" id="error_name">Name required.</p>
                                </div>
                                <div class="input-box">
                                    
                                    <input class="input-box-style" type="text" id="review_email" placeholder="Enter your Email">
                                    <p style="color:red;font-size:12px;display: none;" id="error_email">Email required.</p>
                                </div>
                                <div class="input-box">
                                    
                                    <textarea class="input-box-style" name="" id="review_comment" cols="30" rows="3"
                                        placeholder="write your comment.."></textarea>
                                        <p style="color:red;font-size:12px;display: none;" id="error_comment">Comment required.</p>
                                </div>
                                <div class="submit-btn-con">
                                    <button class="btns" id="review_btn">
                                        <h4>Submit Now</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $d1 = strtotime(date('d M Y',strtotime($checkin)));
                                                  $d2 = strtotime(date('d M Y',strtotime($checkout)));
                                                  $d3 = $d2 - $d1;
                                                  $d4 = round($d3/(60 * 60 * 24));
                        $price1 = $price = $session_room = 0 ;
                        if(!empty($rooms_session)){
                            foreach($rooms_session as $rs){
                                foreach($rooms as $r){
                                    if($r['rid'] == $rs['rid']){
                                        $price1 += ($r['price'] * $d4);
                                        $price += $r['offerprice'] * $d4;
                                        $session_room = 1 ;
                                    
                                    }
                                }
                            }
                        }
                    if($session_room == 1){?>

                    <div class="left-hotel-box col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="review-box">
                            <div class="booking-box">
                                <div class="booking-sub-head">
                                    <div class="rooms">
                                        <span><i class="fa-solid fa-user-group"></i></span>
                                        <div class="room-detail-box">
                                            <h4><?= $guests?> Adults</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="room-amount-con booking-body row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="left-amount">
                                            <ul class="ul-style">
                                                <li class="li-style text-red">
                                                    <h5>Non- Refundable</h5>
                                                </li>
                                                <li class="li-style text-black">
                                                    <h5>Room Only</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="right-amount">
                                            <div class="hotel-amount-con">
                                                <h5 class="amount cut-amount"><i
                                                        class="fa-solid fa-indian-rupee-sign"></i><span><?php echo number_format($price1,2);?></span>
                                                </h5>
                                                <h4 class="amount"><i
                                                        class="fa-solid fa-indian-rupee-sign"></i><span><?php echo number_format($price,2);?></span>
                                                </h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-foot">
                                    <div class="view-others">
                                       <!--  <a href="">
                                            <h4 class="text-blue">VIEW OTHER ROOMS</h4>
                                        </a> -->
                                    </div>
                                    <a href="<?= base_url().'userpanel/homestay_booking_confirm/'.$id?>" class="btns">
                                        <h4>Book Now</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="hotel-box-body-area">
                            <div class="review-box review-status-con">
                                 <?php if(!empty($rating)){?>
                                <div class="review-area">
                                    <h1><?= $rating?></h1>
                                </div>
                            <?php }?>
                                <div class="review-status">
                                    <h1><?php if(!empty($rating)){
                                        if($rating >= 1 && $rating < 2){
                                            echo "Bad";
                                        } else if($rating >= 2 && $rating < 3){
                                            echo "Was OK";
                                        }
                                        else if($rating >= 3 && $rating < 4){
                                            echo "Good";
                                        }
                                        else if($rating >= 4 && $rating < 5){
                                            echo "Very Good";
                                        }else if($rating == 5 ){
                                            echo "Excellent";
                                        }
                                    }?></h1>
                                    <h3>Based on <?= $review_count?> Ratings</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>

            </section>

<style>
    .ratingStars{
        float: left;
        margin-bottom: 10px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    
</style>