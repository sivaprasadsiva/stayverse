
<!-- Header top End -->

<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Confirm Details
         </h2>
         <ul class="breadcumnd__link">
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
                  Booking
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  Hotel
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  Hotel Details
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               Confirm Details
            </li>
         </ul>
      </div>
   </div>
   <!--Container-->
</section>
<!-- breadcumnd banner End -->

<!-- hotel confirm details here -->
<section class="hotel__details overflow-hidden pt__60 pb__60">
   <div class="container">
      <div class="row g-4">
         <div class="col-xl-8 col-lg-8">
            <div class="hotel__confrim__body">
               <h3 class="xs-28 dtext mb__30 fw-700">
                  Confirm Hotel
               </h3>
               <div class="skyp__hotels__wrap mb__40">
                  <div class="d-flex thumb__content gap-4 align-items-center">
                     <div class="left__thumb gap-2 d-flex align-items-center">
                         <?php if(!empty($gallery)){foreach($gallery as $g){?>
                        <img src="<?= base_url().'assets/images/'.$g['image_gallery']?>" class="w-100" alt="img" width="100px" height="150px">
                     <?php }}?>
                     </div>
                     <div class="skyp__right__content">
                        <div class="d-flex mb__15 align-items-center justify-content-between">
                           <h4 class="dtext xs-28">
                              <?= $name?>
                           </h4>
                           <span class="d-flex fz-18 fw-400 lato dtext align-items-center gap-3">
                              <img src="<?= base_url();?>assets1/img/svg/star.svg" alt="star">
                              40.7
                           </span>
                        </div>
                        <div class="fz-18 mb__15 fw-400 lato dtext d-flex align-items-center gap-2">
                           <img src="<?= base_url();?>assets1/img/svg/mlocation.svg" alt="img">
                           <?= $state.','.$district.','.$location;?>
                        </div>
                        <div class="confirms__icons mb__15 d-flex align-items-center gap-2">
                           <span class="icon d-flex align-items-center justify-content-center">
                              <img src="<?= base_url();?>assets1/img/svg/facilities-bussen.svg" alt="svg">
                           </span>
                           <span class="icon d-flex align-items-center justify-content-center">
                              <img src="<?= base_url();?>assets1/img/svg/wifis.svg" alt="svg">
                           </span>
                           <span class="icon d-flex align-items-center justify-content-center">
                              <img src="<?= base_url();?>assets1/img/svg/bedss.svg" alt="svg">
                           </span>
                           <span class="icon d-flex align-items-center justify-content-center">
                              <img src="<?= base_url();?>assets1/img/svg/gum.svg" alt="svg">
                           </span>
                        </div>
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                           <div class="d-flex align-items-center gap-2">
                              <span class="icon d-flex align-items-center justify-content-center">
                                 <img src="<?= base_url();?>assets1/img/svg/singlebess.svg" alt="svg">
                              </span>
                              <span class="fz-18 fw-400 lato textfive">
                                 Single bed room
                              </span>
                           </div>
                           <div class="d-flex align-items-center gap-2">
                              <span class="icon d-flex align-items-center justify-content-center">
                                 <img src="<?= base_url();?>assets1/img/svg/person.svg" alt="svg">
                              </span>
                              <span class="fz-18 fw-400 lato textfive">
                                 <?= $guests?> Guests
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="dating__body update__skypinfo mb__40">
                  <div class="dating__body__box align-items-end gap-2 justify-content-between">
                     <div class="date__grpp">
                        <span class="dtext mb-2 d-block fz-18 fw-500 lato">
                           Check In
                        </span>
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
                     </div>
                     <div class="date__grpp">
                        <span class="dtext mb-2 d-block fz-18 fw-500 lato">
                           Check Out
                        </span>
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
                     </div>
                     <div class="date__grpp">
                        <span class="dtext mb-2 d-block fz-18 fw-500 lato">
                           Rooms & Guests
                        </span>
                        <div class="dating__item dating__inetial select__border">
                           <select name="room">
                              <option value="1">
                                 1 Room/ 1 People
                              </option>
                              <option value="2">
                                 One Room
                              </option>
                              <option value="3">
                                 One People
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="date__grpp">
                        <a href="javascript:void(0)" class="cmn__btn">
                           <span>
                              Update Info
                           </span>
                        </a>
                     </div>
                  </div>
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
               <div class="cancellation__two">
                 <div class="d-flex mb__15 align-items-center gap-3">
                     <div class="icons d-flex align-items-center justify-content-center">
                        <img src="<?= base_url();?>assets1/img/svg/info-cancel.svg" alt="svg">
                     </div>
                     <h5 class="dtext fw-700">
                        Cancellation
                     </h5>
                 </div>
                 <p class="fz-16 fw-400 lato dtext">
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                 </p>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4">
            <div class="hotel__confirm__invocie">
               <h5 class="fw-600 lato mb__20 text-center">
                  Invoice Details
               </h5>
               <div class="d-flex product__total pb__15 mb__15 align-items-center justify-content-between">
                  <span class="fz-18 fw-600 lato dtext d-block">
                     Product
                  </span>
                  <span class="fz-18 fw-600 lato dtext d-block">
                     Total
                  </span>
               </div>
               <ul class="price__cost mb__30">
                  <li class="d-flex align-items-center justify-content-between">
                     <span class="fz-18 fw-400 lato dtext">
                        Room Price
                     </span>
                     <span class="fz-18 fw-400 lato dtext">
                        <?$price?>
                     </span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between">
                     <span class="fz-18 fw-400 lato dtext">
                        Extra Guests Cost
                     </span>
                     <span class="fz-18 fw-400 lato dtext">
                        $0
                     </span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between">
                     <span class="fz-18 fw-400 lato dtext">
                        Extra Service
                     </span>
                     <span class="fz-18 fw-400 lato dtext">
                        $15
                     </span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between">
                     <span class="fz-18 fw-400 lato dtext">
                        Total cost
                     </span>
                     <span class="fz-18 fw-400 lato dtext">
                        $457
                     </span>
                  </li>
               </ul>
               <form action="#0" class="d-flex mb__30 align-items-center justify-content-between">
                  <input type="text" placeholder="Promo Code">
                  <button class="cmn__btn" type="submit">
                     <span>
                        Apply
                     </span>
                  </button>
               </form>
               <div class="direct__transfer">
                  <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                     <div class="radio__left d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="proper1" checked>
                        <label class="form-check-label" for="proper1">
                           <span class="fz-16 lato fw-400 dtext">
                              Direct bank transfer
                           </span>
                        </label>
                     </div>
                  </div>
                  <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                     <div class="radio__left d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="proper2">
                        <label class="form-check-label" for="proper2">
                           <span class="fz-16 lato fw-400 dtext">
                              Check payments
                           </span>
                        </label>
                     </div>
                  </div>
                  <p class="textbg fz-16 fw-400">
                     Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                  </p>
                  <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                     <div class="radio__left d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="proper3">
                        <label class="form-check-label" for="proper3">
                           <span class="fz-16 lato fw-400 dtext">
                              PayPal
                           </span>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="have__condition mt__30 mb__30">
                  <div class="radio__left d-flex align-items-center gap-2">
                     <input class="form-check-input" type="checkbox" id="proper5" checked>
                     <label class="form-check-label" for="proper5">
                        <span class="fz-16 lato fw-400 dtext">
                           I have read and agree to the website terms and conditions
                        </span>
                     </label>
                  </div>
               </div>
               <div class="payment text-center mb__30">
                  <a href="hotel-payment.html" class="cmn__btn">
                     <span>
                        Payment Now
                     </span>
                  </a>
               </div>
               <div class="payment__cards mb__20 d-flex align-items-center gap-2">
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
               <div class="full__refund d-flex justify-content-center align-items-center gap-2">
                  <img src="<?= base_url();?>assets1/img/svg/info-cancel.svg" alt="img">
                  Full refund, 3-day concellation
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- hotel confirm details End -->

<!--home three support here-->
<section class="refer__section__three pt-120 pb-120">
   <div class="container">
      <div class="row justify-content-between align-items-center">
         <div class="col-lg-6">
            <div class="section__header">
               <h2>
                  Enjoy our Speacial supports
               </h2>
               <p class="pb__40">
                  There are many variations of passages of Lorem Ipsum available, but the         have suffered alteration in some form, by injected humour, or randomised         words which don't look even slightly believable. If you are going to use...
               </p>
               <a href="contact.html" class="cmn__btn">
                  <span>
                     Contact us
                  </span>
               </a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="refer__boxes__wrap refer__boxes__wrapthree">
               <div class="row g-4 align-items-center">
                  <div class="col-lg-6 col-md-6">
                     <div class="refer__items__thregrid">
                        <div class="refer__item refer__item__grid">
                           <div class="icon">
                              <img src="<?= base_url();?>assets1/img/working/mobilepro.png" alt="img">
                           </div>
                           <div class="content">
                              <h5>
                                 Secure Payment
                              </h5>
                              <p>There are many variations of passages of Lorem...</p>
                           </div>
                        </div>
                        <div class="refer__item refer__item__grid">
                           <div class="icon">
                              <img src="<?= base_url();?>assets1/img/working/walletpro.png" alt="img">
                           </div>
                           <div class="content">
                              <h5>
                                Trust pay
                              </h5>
                              <p>There are many variations of passages of Lorem...</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 updown__support">
                     <div class="refer__items__thregrid">
                        <div class="refer__item refer__item__grid">
                           <div class="icon">
                              <img src="<?= base_url();?>assets1/img/working/soundpro.png" alt="img">
                           </div>
                           <div class="content">
                              <h5>
                                Refer Payment
                              </h5>
                              <p>There are many variations of passages of Lorem...</p>
                           </div>
                        </div>
                        <div class="refer__item refer__item__grid">
                           <div class="icon">
                              <img src="<?= base_url();?>assets1/img/working/supportpro.png" alt="img">
                           </div>
                           <div class="content">
                              <h5>
                                27X7 Support
                              </h5>
                              <p>There are many variations of passages of Lorem...</p>
                           </div>
                        </div> 
                     </div>
                  </div>
               </div>
               <div class="refer__dotthree1">
                  <img src="<?= base_url();?>assets1/img/refer/dots.png" alt="img">
               </div>
               <div class="refer__dotthree2">
                  <img src="<?= base_url();?>assets1/img/refer/dots.png" alt="img">
               </div>
               <div class="refer__dotthree3">
                  <img src="<?= base_url();?>assets1/img/refer/dots.png" alt="img">
               </div>
               <div class="refer__dotthree4">
                  <img src="<?= base_url();?>assets1/img/refer/dots.png" alt="img">
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="refer__ball">
      <img src="<?= base_url();?>assets1/img/refer/referball.png" alt="img">
   </div>
</section>
<!--home three support end-->
