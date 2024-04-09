

<!-- Banner two Here -->
<section class="booking__landing__one">
   <div class="booking__thumb__one">
      <img src="<?= base_url();?>assets1/img/banner/booking-landing1.jpg" alt="img">
   </div>
      <div style="padding: 0px;"  class="container">
         <div class="booking__landing__wrap1 trans50y">
            <div class="booking__landing__head pb__40">
               <ul class="nav nav-tabs fasilities__inner fasilities__innertwo" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                  <a href="javascript:void(0)" class="nav-link active" id="home-tabb1" data-bs-toggle="tab" data-bs-target="#homeb1"  role="tab" aria-controls="homeb1" aria-selected="true">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="<?= base_url();?>assets1/img/banner/three/home.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Home Stay
                           </span>
                        </span>
                     </a>
                  </li>
                   <li class="nav-item" role="presentation">
                  <a href="javascript:void(0)" class="nav-link" id="contact-tabb111" data-bs-toggle="tab" data-bs-target="#contactb111" role="tab" aria-controls="contactb111" aria-selected="false">
                     <span class="fasilities__item align-items-center d-flex">
                        <span class="icon">
                           <img src="<?= base_url();?>assets1/img/banner/three/cars.png" alt="icon">
                        </span>
                        <span class="fz-18 pratext d-block">
                           Car Rent
                        </span>
                     </span>
                  </a>
                  </li>
                  <li class="nav-item" role="presentation">
                  <a href="javascript:void(0)" class="nav-link" id="profile-tabb1" data-bs-toggle="tab" data-bs-target="#profileb1"  role="tab" aria-controls="profileb1" aria-selected="false">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="<?= base_url();?>assets1/img/banner/three/bike.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Bike Rent
                           </span>
                        </span>
                     </a>
                  </li> 
               </ul> 
            </div>

            <!-- form section -->
            <div class="booking__landing__body">
               <div class="tab-content" id="myTabContentbookin1">
                  <!-- HOME STAY -->
                  <div class="tab-pane fade show active" id="homeb1" role="tabpanel" aria-labelledby="home-tabb1">
                           <?= form_open((base_url().'userpanel/index'))?>
                     <div class="dating__body">                   
                        <p style="    text-align: center;padding: 10px;color: #767575;font-size: 16px;">	Book your ideal Homestay - Villas, Apartments & more.</p>
                        <div class="dating__body__box mb__30">
                           <div class="dating__item dating__hidden">
                                 <input type="text" class="location1" name="location" style="display: none;">
                                 <input type="text" placeholder="Enter Locality City" class="location" name="lid" autocomplete="off" required>

                           </div>
                           <div class="dating__item dating__hidden ">
                              <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                 <input class="form-control" type="text" placeholder="Check in"  name="checkin" autocomplete="off" required>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                             </div>
                           </div>
                           <div class="dating__item dating__hidden ">
                              <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                                 <input class="form-control" type="text" placeholder="Check Out"  name="checkout" autocomplete="off" required>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                             </div>
                           </div>
                           <div class="dating__item dating__hidden ">
                              <div  class="input-group date" data-date-format="dd-mm-yyyy">
                                 <input class="form-control" type="text" placeholder="Guests" name="guests" autocomplete="off" required>
                             </div>
                           </div>                          
                        </div>
                        <div class="search" style="overflow-y:auto; height:300px;display: none;"></div>
                        <?php if(!empty($place)){?>
                        <div class="recent-search">
                           <ul>
                              <li><h4>Recent Searches :</h4></li>
                              <li class="recent-1"><a href="#"><span><?php echo $place?></span> <br><?php if(!empty($checkin) && !empty($checkout)) echo date('d-M-Y',strtotime($checkin)) .' to '. date('d-M-Y',strtotime($checkout))?></a></li>
                           </ul>
                        </div>
                        <?php }?><br>
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item ">
                           <a href="">
                              <button type="submit" style="width: 25%" class="cmn__btn" name="submit">
                                 <span>
                                    Search 
                                 </span>
                              </button>
                           </a>
                        </div>
                     </div>
                     <?= form_close()?>
                  </div>

                  <!--BIKE RENT  -->
                  <div class="tab-pane fade" id="profileb1" role="tabpanel" aria-labelledby="profile-tabb1">
                     <?= form_open((base_url().'userpanel/index'))?>
                     <div class="dating__body">
                     <p style="    text-align: center;padding: 10px;color: #767575;font-size: 16px;">	Book your ideal Homestay - Villas, Apartments & more.</p>
                        <div class="dating__body__box mb__30">
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" class="location3" name="location" style="display: none;">
                                 <input type="text" class="location2" placeholder="Pick- up location" autocomplete="off" required>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       location_on
                                    </i>
                                 </span>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="time" placeholder="Time" name="time" autocomplete="off" required>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker3" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" name="pickup" placeholder="Pick - Up Date" autocomplete="off" required>
                                    <span class="calendaricon">
                                       <i class="material-symbols-outlined">
                                          calendar_month
                                       </i>
                                    </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker4" class="input-group date" data-date-format="dd-mm-yyyy">
                                   <input class="form-control" type="text" name="dropof" placeholder="Drop - of  Date" autocomplete="off" required >
                                    <span class="calendaricon">
                                       <i class="material-symbols-outlined">
                                          calendar_month
                                       </i>
                                    </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="search1" style="overflow-y:auto; height:300px;display: none;"></div>
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item">
                              <button type="submit" style="width: 25%" class="cmn__btn" name="bikerent">
                                 <span>
                                   Search 
                                 </span>
                              </button>
                        </div>
                     </div>
                     <?= form_close()?>
                  </div>
                  
                  

                  <!-- CAR RENT -->
                  <div class="tab-pane fade" id="contactb111" role="tabpanel" aria-labelledby="contact-tabb111">
                   <?= form_open((base_url().'userpanel/index'))?>
                     <div class="dating__body">
                     <p style="    text-align: center;padding: 10px;color: #767575;font-size: 16px;">	Book your ideal Homestay - Villas, Apartments & more.</p>
                    
                        <div class="dating__body__box mb__30">
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" class="location5" name="location" style="display: none;">
                                 <input type="text" class="location4" placeholder="Pick- up location" autocomplete="off" required>
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       location_on
                                    </i>
                                 </span>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="time" placeholder="Time" name="time" autocomplete="off" required>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker3" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" name="pickup" placeholder="Pick - Up Date" autocomplete="off" required>
                                    <span class="calendaricon">
                                       <i class="material-symbols-outlined">
                                          calendar_month
                                       </i>
                                    </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker4" class="input-group date" data-date-format="dd-mm-yyyy">
                                   <input class="form-control" type="text" name="dropof" placeholder="Drop - of  Date" autocomplete="off" required>
                                    <span class="calendaricon">
                                       <i class="material-symbols-outlined">
                                          calendar_month
                                       </i>
                                    </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="search2" style="overflow-y:auto; height:300px;display: none;"></div>
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item">
                           <button type="submit" style="width: 25%" class="cmn__btn" name="carrent">
                              <span>
                                 Search 
                              </span>
                           </button>
                        </div>
                     </div>
                        <?= form_close()?>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
<!-- Banner two End -->
<section class="landing-page-flyer">
      <div class="container">
         <div class="flyer-align">
            <?php if($slide){foreach($slide as $s){if($s['status'] == 1){?>
            <div class="flyer3 flyer1">
               
               <img src="<?= base_url();?>assets/images/<?= $s['image']?>" alt=""main-image>

               <img class="hyper" src="<?= base_url();?>assets1/img/flyer/link.png" alt="hyper" >
            </div>
         <?php }}}?>
          </div>
      </div>
   </section>


<div id="container">
   <div class="section__header homestays-head">
      <h2>Events & Festivals</h2>
   </div>
   <div class="container">
     <span onclick="slideRight()" class="btn"></span>
       <div id="slider">
         <?php if(!empty($events)){foreach($events as $e){?>
            <a href="<?= base_url().'userpanel/events/'.$e['id']?>">
         <div class="slide grid-content">
                  <div class="images">
                     <img src="<?= base_url();?>assets/images/<?= $e['photo']?>" alt="" >
                  </div>
                  <div class="grid-content-text">
                     <h2><?= $e['name']?></h2>
                     <h4><?=substr($e['details'],0,15).'<br>'.substr($e['details'],15,20);?></h4>
                  </div>
         </div></a>
      <?php }}?>
        
     </div>
     <span onclick="slideLeft()" class="btn"></span>
   </div>
 </div>





    <!--poster flyer-->
    <section class="landing-page-flyer">
      <div class="container">
         <div class="flyer-align">
             <?php if($slide){foreach($slide as $s){if($s['status'] == 2){?>
            <div class="flyer flyer1">
               
               <img src="<?= base_url();?>assets/images/<?= $s['image']?>" alt=""main-image>

               <img class="hyper" src="<?= base_url();?>assets1/img/flyer/link.png" alt="hyper" >
            </div>
         <?php }}}?>
          </div>
      </div>
   </section>


<!-- Banner two here -->
<section class="specilabooking__slider ">
   <div class="container">
      <div class="section__header homestays-head text-center">
         <h2>Find Your wonderland </h2>
      </div>
      <div class="homestay-slider">
         <div class="row  ">
            <div class="col-lg-6">
            </div>
         </div>
         <div class="hurray__booking owl-theme owl-carousel">
            <?php if(!empty($wonderland)){foreach($wonderland as $wonder){?>
            <a href="<?= base_url().'userpanel/wonderland/'.$wonder['id']?>" class="hurray__offer">
               <img src="<?= base_url();?>assets/images/<?= $wonder['image']?>" alt="img" height="193px">
               <h4><?= $wonder['name']?></h4>
            </a>
            <?php }}?>
         </div>
      </div>
   </div>
</section>
<!-- Banner two End -->











