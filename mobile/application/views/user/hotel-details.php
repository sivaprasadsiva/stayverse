
   <div id="navbar">
      <!-- breadcumnd banner Here -->
      <div class="breadcrumb-area ">
         <nav class="container"style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <div class="breadcrumb-head">
               <h3>Homestay Details</h3>
            </div>
            <ul class="breadcumnd__link ">
               <li>
                  <a href="index.html">
                     Home
                  </a>
               </li>
               <li>
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </li>
               <li>
                  <a href="javascript:void(0)">
                     Homestays in Mumbai
                  </a>
               </li>
               <li>
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </li>
               <li>
                  <a href="javascript:void(0)">
                     Homestay Details
                  </a>
               </li>
               <!-- <li>
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </li>
               <li>
                  Hotel List Page
               </li> -->
            </ul>
            <div >
               <h6 style="color: white;font-size: 20px;">129 Properties in Mumbai</h6>
            </div>
          </nav>
      </div>
      <!-- breadcumnd banner end -->
         
         <!-- nav id -->
   </div>
</section>


<!-- -------------------------------------------------------- -->

<!-- hotel details here -->
<section class="hotel__details overflow-hidden pt__60">
   <div class="container">
      <div class="row g-4">
         <div class="col-xl-8 col-lg-8">
            <div class="hotel__details__wrapleft">
               <div class="details__bookslider owl-theme owl-carousel">
                  <?php if(!empty($gallery)){$n=0;foreach($gallery as $g){?>
                  <div class="item" data-hash="<?= $n;?>">
                     <img src="<?= base_url().'assets/images/'.$g['image_gallery']?>" alt="img" height="395px" width="615px">
                  </div>
               <?php $n++;}}?>
               </div>
               <div class="details__smallthumb d-flex align-items-center gap-2">
                   <?php if(!empty($gallery)){$n=0;foreach($gallery as $g){?>
                  <a class="button secondary url" href="#<?= $n;?>">
                     <img src="<?= base_url().'assets/images/'.$g['image_gallery']?>" alt="img" height="95px" width="148px">
                  </a> 
                 <?php $n+=1;}}?>
               </div> 
               <div class="text__box pt__60 pb__40">
                   <h3 class="mb__20 dtext xs-32">
                     <?= $name ?>
                   </h3>
                   <p class="mb__20 xs-16">
                     <?= $description;?>
                   </p>
               </div>
               <div class="amenities__contentbox pb__30">
                  <h4 class="mb__20 dtext">
                     Amenities
                  </h4>
                  <ul class="amenities__listdetails d-flex align-items-center flex-wrap">
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/coffee.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Breakfast
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/cable.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Cable TV
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/ironing.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Ironing service
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/bathub.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Bathub
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/lobby.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Lobby bar
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/disabled-access.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Disabled access
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/rentcar.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Rent a car
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/hairdryer.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Hair Dryer
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/singlebess.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Single bed
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/teacoffe.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Tea/Coffee
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/airconditioner.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           Air Conditioner
                        </span>
                     </li>
                     <li class="d-flex align-items-center gap-2">
                        <span class="icon d-flex align-items-center justify-content-center">
                           <img src="<?= base_url();?>assets1/img/svg/wifis.svg" alt="svg">
                        </span>
                        <span class="fz-18 fw-400 lato dtext">
                           High Speed WIFI
                        </span>
                     </li>
                  </ul>
               </div>
               <div class="house__rules mb__30">
                  <h4 class="mb__20 dtext">
                     House Rules
                  </h4>
                  <ul class="house__list d-flex align-items-center flex-wrap">
                     <?php if(!empty($rules)){foreach($rules as $rule){if($rule['homestay_id'] == $id){?>
                     <li>
                        <?= $rule['homerules']?>
                     </li>
                  <?php }}}?>
                     
                  </ul>
               </div>
               <div class="cancellation text-start pb__40 nlfbottom">
                  <h4 class="dtext mb__20">
                     Cancellation
                  </h4>
                  <p class="fz-16 fw-400 lato dtext">
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                  </p>
               </div>
               <div class="room__chooses pt__40">
                  <h3 class="dtext xs-28 mb__40">
                     Choose Room
                  </h3>
                  <div class="row g-4 justify-content-center">
                     <?php if(!empty($rooms)){foreach($rooms as $room){?>
                     <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="bits__hotel bits__hotels__details d-grid align-items-center gap-3">
                           <div class="thumb thumb2">
                              <a href="javascript:void(0)">
                                 <img src="<?= base_url();?>assets/images/<?= $room['image']?>" class="w-100" height="400px" alt="img">
                              </a>
                           </div>
                           <div class="content content__space">
                              <div class="title gap-3 d-flex justify-content-between mb__10">
                                 <h5>
                                 </h5>
                              </div>
                              <div class="d-flex flex-wrap mb__15 align-items-center gap-4">
                                 <span class="dubay gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                                    <span class="singlebed">
                                       <img src="<?= base_url();?>assets1/img/svg/singlebess.svg" alt="img">
                                    </span>
                                    <?= $room['roomtype']?>
                                 </span>
                                 <span class="dubay gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                                    <span class="singlebed">
                                       <img src="<?= base_url();?>assets1/img/svg/zoominnout.svg" alt="img">
                                    </span>
                                       4.66x4.66 sq.mtr
                                 </span>
                              </div>
                             <div class="d-flex flex-wrap align-items-center gap-4">
                                 <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">₹ <?= $room['offerprice']?></span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">₹ <?= $room['price']?></span>
                                    <span class="fz-16 fw-500 lato base d-block"><?php if($room['price'] > $room['offerprice']){$offer = ($room['price'] - $room['offerprice'])/$room['price'];echo floor($offer*100);}else{echo 0;}?>% OFF</span>
                                 </div>
                                 <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                             </div>
                             <div class="d-grid mt-3 justify-content-start">
                               <a href="hotel-details-confirm.html" class="cmn__btn">
                                 <span>
                                    Select Room
                                 </span>
                              </a>
                             </div>
                           </div>
                        </div>
                     </div>
                    <?php }}?>
                  </div>
               </div>
               <div class="comment__details__wrapper">
                  <div class="d-flex pb__40 gap-4 align-items-center">
                     <h4 class="dtext">
                        Review 
                     </h4>
                     <span class="d-flex fz-24 fw-400 lato dtext align-items-center gap-2">
                        <img src="<?= base_url();?>assets1/img/svg/star.svg" class="review__star" alt="img">
                        4.9
                     </span>
                  </div>
                  <div class="comment__box__inner mb__15 nlfbottom pb__20">
                     <div class="man">
                        <img src="<?= base_url();?>assets1/img/blog/jeromes.png" alt="img">
                     </div>
                     <div class="comment__content">
                        <h5>
                           Jerome Bell <span>2 days ago</span>
                        </h5>
                        <p class="pb__20">
                           There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be...
                        </p>
                        <div class="admin__commments">
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/flike.svg" alt="icon">
                              </span>
                              <span class="text">
                                 18
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/comments.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Reply
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/sshare.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Share
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="comment__box__inner mt__15 nlfbottom pb__10">
                     <div class="man">
                        <img src="<?= base_url();?>assets1/img/blog/bessies.png" alt="img">
                     </div>
                     <div class="comment__content">
                        <h5>
                           Courtney Henry <span>2 days ago</span>
                        </h5>
                        <p class="pb__20">
                           There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be...
                        </p>
                        <div class="admin__commments mb__15">
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/flike.svg" alt="icon">
                              </span>
                              <span class="text">
                                 18
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/comments.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Reply
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/sshare.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Share
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="comment__box__inner mt__15">
                     <div class="man">
                        <img src="<?= base_url();?>assets1/img/blog/comm3.png" alt="img">
                     </div>
                     <div class="comment__content">
                        <h5>
                           Bessie Cooper <span>2 days ago</span>
                        </h5>
                        <p class="pb__20">
                           There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be...
                        </p>
                        <div class="admin__commments mb__15">
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/flike.svg" alt="icon">
                              </span>
                              <span class="text">
                                 18
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/comments.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Reply
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/sshare.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Share
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="view__more d-flex justify-content-center pt__40">
                     <a href="javascript:void(0)" class="cmn__btn">
                        <span>
                           View All Reviews
                        </span>
                     </a>
                  </div>
               </div>
               <form action="#0" class="write__comment">
                  <h4 class="xs-28">
                     Write a review
                  </h4>
                  <input type="text" placeholder="Enter Your Name...">
                  <input type="email" placeholder="Enter Your Email...">
                  <textarea name="writecommnet" cols="30" rows="5" placeholder="Write a comment..."></textarea>
                  <button type="submit" class="cmn__btn">
                     <span>
                        Submit Now
                     </span>
                  </button>
               </form>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4">
            <div class="main__right__detaislbar">
               <div class="hotel__details__checkoungwrapper">
                  <div class="cheakout__rightbar__box">
                     <h5 class="base mb__20 text-center">
                        Cheakout
                     </h5>
                     <div class="dating__body check__hoteldetaislbody">
                        <div class="dating__body__box">
                           <div class="dating__item dating__hidden">
                              <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                 <input class="form-control" type="text" value="<?= $checkin?>" readonly>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                           </div>
                           <div class="dating__item dating__hidden">
                              <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                                 <input class="form-control" type="text" value="<?= $checkout?>" readonly>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                           </div>
                           <div class="dating__item dating__inetial select__border">
                              <select name="room">
                                 <option value="1">
                                    Adults
                                 </option>
                                 <option value="2">
                                    Adults one
                                 </option>
                                 <option value="3">
                                    Adults two
                                 </option>
                              </select>
                           </div>
                           <div class="dating__item dating__inetial select__border">
                              <select name="room">
                                 <option value="1">
                                    Children
                                 </option>
                                 <option value="2">
                                    Children one
                                 </option>
                                 <option value="3">
                                    Children two
                                 </option>
                              </select>
                           </div>
                           <div class="dating__inetial roomtype select__border">
                              <select name="room">
                                 <option>
                                    Room type
                                 </option>
                                 <?php if($roomtype){foreach ($roomtype as $key => $value) {?>
                                 <option value="<?= $value['rid']?>">
                                    <?= $value['roomtype']?>
                                 </option>
                              <?php }}?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="extra__service__item mt__30">
                        <span class=" lato fz-18 borderb text-start d-block fw-600 pb__15 mb__15 extra-title">
                           Extra Service
                        </span>
                        <div class="common__typeproperty">
                           <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                              <div class="radio__left d-flex align-items-center gap-2">
                                 <input class="form-check-input" type="checkbox" id="proper1" checked>
                                 <label class="form-check-label" for="proper1">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Vat
                                    </span>
                                 </label>
                              </div>
                              <span class="radio__right fz-16 fw-400 dtext lato">
                                 $8 / per night
                              </span>
                           </div>
                           <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                              <div class="radio__left d-flex align-items-center gap-2">
                                 <input class="form-check-input" type="checkbox" id="proper2">
                                 <label class="form-check-label" for="proper2">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Cleaning Fee
                                    </span>
                                 </label>
                              </div>
                              <span class="radio__right fz-16 fw-400 dtext lato">
                                 $11
                              </span>
                           </div>
                           <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                              <div class="radio__left d-flex align-items-center gap-2">
                                 <input class="form-check-input" type="checkbox" id="proper3">
                                 <label class="form-check-label" for="proper3">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Airport Pickup
                                    </span>
                                 </label>
                              </div>
                              <span class="radio__right fz-16 fw-400 dtext lato">
                                 $17
                              </span>
                           </div>
                           <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                              <div class="radio__left d-flex align-items-center gap-2">
                                 <input class="form-check-input" type="checkbox" id="proper4">
                                 <label class="form-check-label" for="proper4">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Wine & Dine
                                    </span>
                                 </label>
                              </div>
                              <span class="radio__right fz-16 fw-400 dtext lato">
                                 $40 / per person
                              </span>
                           </div>
                           <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                              <div class="radio__left d-flex align-items-center gap-2">
                                 <input class="form-check-input" type="checkbox" id="proper5">
                                 <label class="form-check-label" for="proper5">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Parking
                                    </span>
                                 </label>
                              </div>
                              <span class="radio__right fz-16 fw-400 dtext lato">
                                 free
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="extra__service__item mt__30">
                        <span class=" lato fz-18 borderb d-block text-start fw-600 pb__15 mb__15 extra-title">
                           Your price
                        </span>
                        <span class="fz-16 mb__30 d-flex gap-2 fw-400 lato dtext">
                           <span class="tactive">
                              $ 65 
                           </span>
                           / per room
                        </span>
                     <div class="d-flex justify-content-center mb__30">
                           <a href="<?= base_url().'userpanel/homestay_booking_confirm/'.$id?>" class="cmn__btn">
                              <span>
                                 Book Now
                              </span>
                           </a>
                     </div>
                        <div class="payment__cards d-flex align-items-center gap-2">
                           <a href="javacript:void(0)">
                              <img src="<?= base_url();?>assets1/img/payment/paypals.png" alt="payment-card">
                           </a>
                           <a href="javacript:void(0)">
                              <img src="<?= base_url();?>assets1/img/payment/visas.png" alt="payment-card">
                           </a>
                           <a href="javacript:void(0)">
                              <img src="<?= base_url();?>assets1/img/payment/fastpay.png" alt="payment-card">
                           </a>
                           <a href="javacript:void(0)">
                              <img src="<?= base_url();?>assets1/img/payment/payoneer.png" alt="payment-card">
                           </a>
                           <a href="javacript:void(0)" class="master">
                              <img src="<?= base_url();?>assets1/img/payment/mastercard.png" alt="payment-card">
                           </a>
                        </div>
                        <span class="fz-16 fw-400 lato mb__30 text-center d-block booking-time pt__20">
                           NB : Booking at 12:00 pm to 10:00 am
                        </span>
                        <div class="comment__chatboxright d-flex align-items-center gap-3">
                           <div class="icon d-flex align-items-center justify-content-center">
                              <img src="<?= base_url();?>assets1/img/svg/comments.svg" alt="img">
                           </div>
                           <div class="content">
                              <span class="dtext fz-24 fw-700 mb-1">
                                 Chat box
                              </span>
                              <p class="dtext lato fz-16 fw-400">
                                 Chat with us if you need any help
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="current__weather mt__30">
                  <h5 class="mb__30 text-center">
                     Current Weather
                  </h5>
                  <div class="d-flex weather__wrapping align-items-end">
                     <div class="could__left">
                        <div class="could__icon d-flex mb__10 align-items-center justify-content-center mb__10">
                           <img src="<?= base_url();?>assets1/img/svg/coludleft.svg" alt="svg">
                        </div>
                        <span class="fz-24 gratext lato fw-400 mb__10">
                           23°C
                        </span>
                        <span class="fz-16 d-block mb-1 fw-400 lato dtext">
                           Humindity: 91%
                        </span>
                        <span class="fz-16 fw-400 lato dtext">
                           Humindity: 91%
                        </span>
                     </div>
                     <div class="firday">
                        <img src="<?= base_url();?>assets1/img/details/friday-icon.png" alt="img">
                     </div>
                     <div class="sun__degree">
                        <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Sun
                           </span>
                           <img src="<?= base_url();?>assets1/img/svg/colud1.svg" class="d-block" alt="img">
                           <span class="fz-16 d-block dtext lato">
                              22°C
                           </span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Mon
                           </span>
                           <img src="<?= base_url();?>assets1/img/svg/colud1.svg" class="d-block" alt="img">
                           <span class="fz-16 d-block dtext lato">
                              25°C
                           </span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Tue
                           </span>
                           <img src="<?= base_url();?>assets1/img/svg/colud1.svg" class="d-block" alt="img">
                           <span class="fz-16 d-block dtext lato">
                              23°C
                           </span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Wed
                           </span>
                           <img src="<?= base_url();?>assets1/img/svg/colud1.svg" class="d-block" alt="img">
                           <span class="fz-16 d-block dtext lato">
                              24°C
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- hotel details End -->



   
