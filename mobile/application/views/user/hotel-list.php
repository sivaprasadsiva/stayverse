
   
   <div id="navbar">
      <!-- breadcumnd banner Here -->
      <div class="breadcrumb-area ">
         <nav class="container"style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <div class="breadcrumb-head">
               <h3>Home Stays</h3>
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
                     Homestays and more in Mumbai
                  </a>
               </li>
               <!-- <li>
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
                  Hotel List Page
               </li> -->
            </ul>
            <div >
               <h6 style="color: white;font-size: 20px;">129 Properties in Mumbai</h6>
            </div>
          </nav>
      </div>
      <!-- breadcumnd banner end -->
         <section class="bottom-nav-bg">
            <div class="bottom-navs container">
               <div class="bottom-nav-box">
                  <a class="active" href="javascript:void(0)"><span>SORT BY:</span></a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)"><span>Popular</span></a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)"><span>User Rating</span> (Highest First)</a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)"><span>Price</span> (Highest First)</a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)" class=""><span>Price</span> (Lowest First)</a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)" >
                     <button class="map-view-btn" style="background-image: url(<?= base_url();?>assets1/img/details/map-bg.jpg);">
                        <i class="fa-solid fa-location-dot"></i> View-map
                     </button>
                  </a>
               </div>
               <div class="bottom-nav-box">
                  <a href="javascript:void(0)">
                     <input type="text" placeholder="Search.." name="search">
                     <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                  </a>
               </div>
            </div>
         </section>
         <!-- nav id -->
   </div>
</section>


<!-- -------------------------------------------------------- -->






<!-- hotel list here -->
<section class="hotel__list__common pb__60"style="padding-top:40px;">
   <div class="container">
      <div class="row justify-content-between">
         <div class="col-xxl-3 col-xl-3 col-lg-3">
            <div class="common__filter__wrapper">
               <h3 class="filltertext borderb text-start pb__20 mb__20"style="font-size: 25px;">
                  Select Filters
               </h3> 
               <!-- suggestions -->
               <div class="search__item borderb pb__10 mb__20">
                  <div class="common__sidebar__head">
                     <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                         Category
                         <img src="<?= base_url();?>assets1/img/svg/dropdown.svg" alt="svg">
                     </button>
                  </div>
                <div class="common__sidebar__content">
                  <div class="common__typeproperty">
                    <?php if(!empty($category)){foreach($category as $cat){?>
                     <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                        <div class="radio__left d-flex align-items-center gap-2">
                           <input class="form-check-input" type="checkbox" id="proper5">
                           <label class="form-check-label" for="proper5">
                              <span class="fz-16 lato fw-400 dtext">
                                 <?= $cat['category']?>
                              </span>
                           </label>
                        </div>
                        <span class="radio__right fz-16 fw-400 dtext lato">
                        </span>
                     </div>
                     <?php }}?>
                  </div>
                </div>
               </div>
               <div class="search__item borderb pb__10 mb__20">
                  <div class="common__sidebar__head">
                     <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                         Room Type
                         <img src="<?= base_url();?>assets1/img/svg/dropdown.svg" alt="svg">
                     </button>
                  </div>
                <div class="common__sidebar__content">
                  <div class="common__typeproperty">
                    <?php if(!empty($roomtypes)){foreach($roomtypes as $roomtype){?>
                     <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                        <div class="radio__left d-flex align-items-center gap-2">
                           <input class="form-check-input" type="checkbox" id="proper5">
                           <label class="form-check-label" for="proper5">
                              <span class="fz-16 lato fw-400 dtext">
                                 <?= $roomtype['roomtype']?>
                              </span>
                           </label>
                        </div>
                        <span class="radio__right fz-16 fw-400 dtext lato">
                        </span>
                     </div>
                     <?php }}?>
                  </div>
                </div>
               </div>
               <div class="search__item borderb pb__10 mb__20">
                  <div class="common__sidebar__head">
                     <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                         Guest Love
                         <img src="<?= base_url();?>assets1/img/svg/dropdown.svg" alt="svg">
                     </button>
                  </div>
                <div class="common__sidebar__content">
                  <div class="common__typeproperty">
                    <?php if(!empty($guests)){foreach($guests as $guest){?>
                     <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                        <div class="radio__left d-flex align-items-center gap-2">
                           <input class="form-check-input" type="checkbox" id="proper5">
                           <label class="form-check-label" for="proper5">
                              <span class="fz-16 lato fw-400 dtext">
                                 <?= $guest['guestlove']?>
                              </span>
                           </label>
                        </div>
                        <span class="radio__right fz-16 fw-400 dtext lato">
                        </span>
                     </div>
                     <?php }}?>
                  </div>
                </div>
               </div>
               <!-- price -->
               <div class="search__item borderb pb__10 mb__20">
                  <div class="common__sidebar__head">
                     <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                         Price Range
                         <img src="<?= base_url();?>assets1/img/svg/dropdown.svg" alt="svg">
                     </button>
                  </div>
                <div class="common__sidebar__content">
                  <div class="common__typeproperty">
                     <?php if(!empty($range)){foreach($range as $price){?>
                     <div class="type__radio d-flex align-items-center justify-content-between">
                        <div class="radio__left d-flex align-items-center gap-2">
                           <input class="form-check-input" type="checkbox" id="proper5s">
                           <label class="form-check-label" for="proper5s">
                              <span class="star">
                              </span>
                              <span class="fz-16 lato fw-400 dtext">
                                 ₹ <?= number_format($price['starting_price'])?> - ₹ <?= number_format($price['ending_price'])?>
                              </span>
                           </label>
                        </div>
                        <span class="radio__right fz-16 fw-400 dtext lato">
                        </span>
                     </div>
                  <?php }}?>
                  </div>
                </div>
               </div>
               
               <!--  House Rules -->
               <div class="search__item borderb pb__10 mb__20">
                  <div class="common__sidebar__head">
                     <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                        House Rules
                        <img src="<?= base_url();?>assets1/img/svg/dropdown.svg" alt="svg">
                     </button>
                  </div>
                  <div class="common__sidebar__content">
                     <div class="common__typeproperty">
                        <?php if(!empty($rules)){foreach($rules as $rule){?>
                        <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                           <div class="radio__left d-flex align-items-center gap-2">
                              <input class="form-check-input" type="checkbox" id="proper1" >
                              <label class="form-check-label" for="proper1">
                                 <span class="fz-16 lato fw-400 dtext">
                                    <?= $rule['homerules']?>
                                 </span>
                              </label>
                           </div>
                        </div>
                        <?php }}?>
                     </div>
                  </div>
               </div>
                  <div class="back-top-btn">
                     <a href="#">Back to top</a>
                  </div><br><br>
<!-- coloum end -->
            </div>
         </div>
<!--filter box end  -->
         <div class="col-xxl-9 col-xl-9 col-lg-9">
            <div>
               <h3 style="font-size: 25px;">Showing Properties In Mumbai</h3>
            </div>
            <?php if(!empty($rooms)){foreach($rooms as $room){?>
            <div class="hotel__list__box">
               <div class="row g-4">
                  <!-- homestay -->
                  
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                     <a href="">
                        <div class="bits__hotel d-flex justify-content-between  gap-2">
                           <div class="thumb d-flex col-md-8">
                                 <img src="<?= base_url();?>assets/images/<?= $room['image']?>" alt="img" height="auto" width="300px">
                              </a>

                              <div class="content">
                                 <div class="title gap-3 d-flex ">
                                    <h5>
                                       <?= $room['name']?>
                                    </h5>
      
                                 </div>
                                 <span class="dubay mb__10  gap-2 d-flex align-items-center fz-16 fw-400 lato " style="font-size: 19px;color: #0084ff;  font-weight: 800;">
                                    <img src="<?= base_url();?>assets1/img/svg/mlocation.svg" alt="svg">
                                    <?= $room['state'].','.$room['district']?>
                                 </span>
                                 <div class="  d-flex ">
                                    <div>
                                       <span style="  font-weight: 700;">Entire Aaprtment:</span>
                                    </div>
                                    <div style=" font-weight: 600;">
                                       <span>Beds:2</span>
                                    </div>
                                    <div style="  font-weight: 600;">
                                       <span>Baths:2</span>
                                    </div>
                                 </div>
                              <br>
                              <span class=" d-block  mb__20 lato textfive"style="color:#00a19c;font-size:15px;font-weight:600;">Free Cancellation till 24 hours before Check in</span>
                                 <span class=" d-block  mb__20 lato textfive"style="color:#8b572a;font-size:16px;font-weight:700;">Offers Free Wifi</span>
                                 <a href="<?= base_url().'userpanel/room/'.$room['rid']?>" class="cmn__btn" style="padding: 5px 5px;">
                                    <span>
                                       Book Now
                                    </span>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-4 homestay-right">
                              <div class="rating-fee-content ">
                                 <!-- <h5>Excellent <span>4.6</span></h5>
                                 <h6>(31 Ratings)</h6><br> -->
                                 <div class="rating-content-fee1">
                                    <h4>₹ <?= number_format($room['price'],2)?></h4>
                                 </div>
                                 <div class="rating-content-fee2">
                                    <h3>₹<?= number_format($room['offerprice'],2)?></h3>
                                 </div>
                                 <div class="rating-content-p">
                                    <p>+ ₹1500 Taxes and fees <br>
                                       per Night
                                 </p>
                                 </div><br>  
                                 <div class="rating-content-login">
                                    <h3>Login to Book now And Pay Later</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <!-- <div class="homstay-bottom">
                        <span>Last minute deal! This a special rock bottom price offered by the property for clearance!</span>
                     </div> -->
                  </div>
               <?php }}?>
               </div>
         </div>
      </div>
   </div>
</section>
<!-- hotel list End -->


   
