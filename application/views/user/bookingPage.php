
            <section class="container section-style">
                <div class="heading-styel">
                    <h1>Review your Booking</h1>
                </div>
            </section>
            <section class="container section-style blue-bg">
                <div class=" booking-section-con row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">

                        <div class="left-booking-page">
                            <?= form_open(base_url('userpanel/payment/'.$id));?>
                            <div class="hotel-details-review review-box">
                                <div class="detail-style-con">
                                    <div class="detail-style row">
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                                            <div class="hotel-name">
                                                <h1><?= $name?></h1>
                                            </div>
                                            <div class="rating-section hotel-rating left-rating">
                                                 <div class="rate-stars">
                                        <?php  $rem = $count = 0; if(!empty($review)){foreach($review as $r){
                                            if($r['homestay_id'] == $id){
                                                $rem += $r['rating'];
                                                $count ++;
                                                 }}
                                             
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
                                            <?php }}}?>
                                    </div>
                                    <div class="rate-text">
                                        <h6><?= $count?> Rating</h6>
                                    </div>
                                            </div>
                                            <div class="location-section">
                                                <h5><?= ucfirst($location).' ,'.ucfirst($district).' ,'.ucfirst($state);?>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                                            <div class="hotel-detail-image">
                                                <img src="<?= base_url('assets/images/'.$photo);?>" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-style-con">
                                    <div class="detail-style ">
                                        <div class="checking-details-con row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                                <div class="checking-details">
                                                    <div class="head">
                                                        <h6>CHECK-IN</h6>
                                                    </div>
                                                    <div class="date">
                                                        <h5><?= date('d M Y',strtotime($checkin)).','.date('D',strtotime($checkin));?><br>12 : 00 P.M.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $d1 = strtotime(date('d M Y',strtotime($checkin)));
                                                  $d2 = strtotime(date('d M Y',strtotime($checkout)));
                                                  $d3 = $d2 - $d1;
                                                  $d4 = round($d3/(60 * 60 * 24));?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                                <div class="checking-details">
                                                    <div class="rated night">
                                                        <h6><?= $d4;?> Night</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                                <div class="checking-details">
                                                    <div class="head">
                                                        <h6>CHECK- OUT</h6>
                                                    </div>
                                                    <div class="date">
                                                       <h5><?= date('d M Y',strtotime($checkout)).','.date('D',strtotime($checkout));?><br>11 : 59 A.M.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $newroom = array();;$rn = $price = 0; if(!empty($rooms_session)){ 
                                                foreach($rooms_session as $rs){
                                                    foreach($rooms as $r){
                                                        if($r['rid'] == $rs['rid']){
                                                            $price += $r['offerprice'] * $d4;
                                                            $rn ++;
                                                            $newroom[] = $r['rid'];
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                                $couponid = 0 ;
                                                $coupon = 0;
                                                if($code == 1){
                                                    $coupon = $price * ($percentage/100);
                                                    $couponid = $coupon_id;
                                                }
                                                $t = $tax/100;
                                                $priceTotal = $price;
                                                $priceTotal1 = $price - $coupon;
                                                $taxPrice1 = $priceTotal1 * $t;
                                                $taxPrice2 = $priceTotal1 - $taxPrice1;
                                                $taxPrice  = $priceTotal1 - $taxPrice2;
                                                $total = $priceTotal1 + $taxPrice;?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                                <div class="checking-details">
                                                    <h5><?= $d4;?> Night | <?= $guests?> Adults | <?= $rn;?> Room</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-style-con">
                                    <div class="detail-style row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="left-amount">
                                                <!-- <div class="head-detail">
                                                    <h4><?= $guests?> Adults</h4>
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-details-review review-box">
                                <div class="detail-style-con">
                                   
                                    <div class="detail-style row">
                                        <div class="hotel-name">
                                            <h1>Guest Details</h1>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                                            <div class="detail-input-style">
                                                <label for="">TITLE</label>
                                                <select class="input-style-design" name="" id="">
                                                    <option value="">
                                                        <h2>Mr</h2>
                                                    </option>
                                                    <option value="">
                                                        <h2>Mrs</h2>
                                                    </option>
                                                </select>
                                            </div>
                                        </div> -->
                                        
                                        <div class="col-lg-6 col-md-9 col-sm-9 col-12">
                                            <div class="detail-input-style">
                                                <label for="">FIRST NAME</label>
                                                <input class="input-style-design" type="text" placeholder="First name" name="fname" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="detail-input-style">
                                                <label for="">LAST NAME</label>
                                                <input class="input-style-design" type="text" placeholder="Last name" name="lname" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="detail-input-style">
                                                <label for="">EMAIL ADDRESS</label>
                                                <input class="input-style-design" type="email" placeholder="Email id" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="detail-input-style">
                                                <label for="">MOBILE NUMBER</label>
                                                <div class="call-detail-con">
                                                    <input class="input-style-design call-detail-input" type="text" name="phone" placeholder="Contact number" value="<?php if(!empty($phone)) echo $phone ?>" required>
                                                    <select class="input-style-design call-detail"  id="">
                                                        <option value="">
                                                            <h2>+91</h2>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <select name="room[]" multiple hidden>
                                            <?php foreach($newroom as $room1){?>
                                                <option selected><?= $room1;?></option>
                                            <?php }?>
                                        </select>
                                        <input type="hidden" id="discount" value="<?= $coupon?>" name="discount">
                                        <input type="hidden" id="total_price" value="<?= $total?>" name="price">
                                        <input type="hidden" id="homestay" value="<?= $id?>" name="homestay_id">
                                        <input type="hidden" id="total_price_rooms" value="<?= $priceTotal?>" name="total_price_rooms">
                                        <input type="hidden" id="coupon_id" value="<?= $couponid?>" name="coupon_id">
                                        
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="hotel-foot-details">
                                        <h5>By proceeding, I agree to Stayverse <a style="text-decoration: underline;" href="">User
                                                Agreement,</a> <a style="text-decoration: underline;" href="">Terms of Service</a>
                                            and Cancellation & Property Booking Policies.</h5>
                                        <div class="foot-btn-con">
                                            <button class="btns" id="paymentnow" type="submit" name="submit">
                                                <h4>Pay now</h4>
                                            </button>
                                        </div>
                                    </div>
                                    <?= form_close();?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="right-booking-page">
                            <div class="hotel-details-review review-box">
                                <div class="detail-style-con">
                                    <div class="detail-style row">
                                        <div class="hotel-name">
                                            <h1>Price Breakup</h1>
                                        </div>
                                        <div class="Price-con">
                                            <ul class="ul-style price-ul-style">
                                                <li class="price-li-style">
                                                    <div class="price-li-top">
                                                        <div class="price-li-left">
                                                            <h5>2 Room x <?= $d4;?> Night</h5>
                                                        </div>
                                                        <div class="price-li-right"><span>
                                                                <h5><i class="fa-regular fa-indian-rupee-sign"></i><?= $priceTotal;?></h5>
                                                            </span></div>
                                                    </div>
                                                    <div class="price-li-bottom">
                                                        <h6>Base Price</h6>
                                                    </div>
                                                </li>
                                                <?php if($code == 1){?>
                                                <li class="price-li-style">
                                                    <div class="price-li-top">
                                                        <div class="price-li-left">
                                                            <h5>Coupon Discount</h5>
                                                        </div>
                                                        <div class="price-li-right"><span>
                                                                <h5>-<i class="fa-regular fa-indian-rupee-sign"></i><?= $coupon;?>
                                                                </h5>
                                                            </span></div>
                                                    </div>
                                                </li>
                                                <li class="price-li-style">
                                                    <div class="price-li-top">
                                                        <div class="price-li-left">
                                                            <h5>Price after Discount</h5>
                                                        </div>
                                                        <div class="price-li-right"><span>
                                                                <h5><i class="fa-regular fa-indian-rupee-sign"></i><?= $priceTotal1;?>
                                                                </h5>
                                                            </span></div>
                                                    </div>
                                                </li>
                                            <?php }?>
                                                <li class="price-li-style">
                                                    <div class="price-li-top">
                                                        <div class="price-li-left">
                                                            <h5>Taxes & Service Fee</h5>
                                                        </div>
                                                        <div class="price-li-right"><span>
                                                                <h5><i class="fa-regular fa-indian-rupee-sign"></i><?= $taxPrice;?>
                                                                </h5>
                                                            </span></div>
                                                    </div>
                                                </li>
                                                <li class="price-li-style last-total-area">
                                                    <div class="price-li-top">
                                                        <div class="price-li-left">
                                                            <h5>Total Amount to be paid</h5>
                                                        </div>
                                                        <div class="price-li-right"><span>
                                                                <h5><?= $total;?></h5>
                                                            </span></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-details-review review-box">
                                <div class="detail-style-con">
                                    <div class="detail-style row">
                                        <div class="hotel-name">
                                            <h1>Coupon</h1>
                                        </div>
                                        <?php if($code == 0){?>
                                        <div class="coupon-con">
                                            <input class="coupon-input" type="text" placeholder="Have a Coupon Code ?">
                                            <button class="coupon-btn" id="couponBtn"><h5>Apply</h5>
                                            </button>
                                        </div>
                                    <?php }else if($code == 1){?>
                                        <!-- col-lg-8 col-md-8 col-sm-8 col-8 -->
                                        <div class="coupons-area">
                                            <div class="coupon-top">
                                                <div class="coupon-top-left">
                                                    <input class="coupon-radio" type="radio" name="coupon" checked><label for="homestay" >
                                                        <h4><?= $coupon_name?></h4>
                                                    </label>
                                                </div>
                                                <div class="coupon-top-right">
                                                    <button class="remove-btn" id="removeCoupon">Remove</button>
                                                </div>
                                                <div class="coupon-rate">
                                                    <h5><i class="fa-regular fa-indian-rupee-sign"></i><?= $coupon;?></h5>
                                                </div>
                                            </div>
                                            <div class="coupon-bottom" id="couponAlert" >
                                                <h3>Congratulations! Discount of INR <?= $coupon;?> has been applied for your
                                                    Booking</h3>
                                            </div>
                                        </div>
                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    
                    $('#couponBtn').on('click',function(){
                            var value = $('.coupon-input').val();
                            $.ajax({
                                type:"POST",
                                url:"<?= base_url('userpanel/coupon/')?>"+value,
                                success:function(data){
                                    location.reload();
                                }

                            })
                    });
                    $('#removeCoupon').on('click',function(){
                            $.ajax({
                                type:"POST",
                                url:"<?= base_url('userpanel/removeCoupon/')?>",
                                success:function(data){
                                    location.reload();
                                }

                            })
                    });
                    // $('#paymentnow').on('click',function(){
                    //     var price = $('#price').val();
                    //     var homestay = $('#homestay').val();
                    //     var discount = $('#discount').val();
                    //                 $.ajax({
                    //                 url  :'<?= base_url()?>userpanel/payment_mode',
                    //                 type : "POST",
                    //                 data : {homestay:homestay,price:price,discount:discount},
                    //                 success:function(response){
                    //                     location.href ="<?= base_url()?>userpanel/payment";
                    //                         }
                    //                     });
                    //         });
                </script>
