

<!-- Banner two Here -->
<section class="booking__landing__one">
 
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
                              <input type="text" placeholder="Enter Locality City" class="location" name="lid" required>

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
                                 <input class="form-control" type="text" placeholder="Guests" name="guests" required>
                             </div>
                           </div>                          
                        </div>
                        <div class="search"></div>
                        <div class="recent-search">
                           <ul>
                              <li><h4>Recent Searches :</h4></li>
                              <li class="recent-1"><a href="#"><span><?php if(!empty($place))echo $place?></span> <br><?php if(!empty($checkin) && !empty($checkout)) echo date('d-M-Y',strtotime($checkin)) .' to '. date('d-M-Y',strtotime($checkout))?></a></li>
                           </ul>
                        </div><br>
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item ">
                           <a href="<?= base_url().'userpanel/homestay_list'?>">
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
                     <div class="dating__body">
                     <p style="    text-align: center;padding: 10px;color: #767575;font-size: 16px;">	Book your ideal Homestay - Villas, Apartments & more.</p>
                        <div class="dating__body__box mb__30">
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" placeholder="Pick- up location">
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       location_on
                                    </i>
                                 </span>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" placeholder="Time">
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker3" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Pick - Up Date" readonly>
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
                                   <input class="form-control" type="text" placeholder="Drop - of  Date" readonly >
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
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item">
                              <button type="submit" style="width: 25%" class="cmn__btn">
                                 <span>
                                   Search 
                                 </span>
                              </button>
                        </div>
                     </div>
                  </div>
                  
                  

                  <!-- CAR RENT -->
                  <div class="tab-pane fade" id="contactb111" role="tabpanel" aria-labelledby="contact-tabb111">
                     <div class="dating__body">
                     <p style="    text-align: center;padding: 10px;color: #767575;font-size: 16px;">	Book your ideal Homestay - Villas, Apartments & more.</p>
                        <div class="dating__body__box mb__30">
                           <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" placeholder="Pick- up location">
                                 <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       location_on
                                    </i>
                                 </span>
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <input type="text" placeholder="Time">
                              </div>
                           </div>
                           <div class="col-xxl-2 col-xl-6 col-lg-3 col-md-6 col-sm-12">
                              <div class="dating__item dating__hidden">
                                 <div id="datepicker3" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Pick - Up Date" readonly>
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
                                   <input class="form-control" type="text" placeholder="Drop - of  Date" readonly>
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
                         <div style=" margin: 0px 37%; margin-bottom: -95px; border: none;" class="dating__item">
                           <button type="submit" style="width: 25%" class="cmn__btn">
                              <span>
                                 Search 
                              </span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
<!-- Banner two End -->



<div id="container">
   <div class="section__header homestays-head">
      <h2>Events & Festivals</h2>
   </div>
   <div class="container">
     <span onclick="slideRight()" class="btn"></span>
       <div id="slider">
         <?php if(!empty($events)){foreach($events as $e){?>
         <div class="slide grid-content">
                  <div class="images">
                     <img src="<?= base_url();?>assets/images/<?= $e['photo']?>" alt="" >
                  </div>
                  <div class="grid-content-text">
                     <h2><?= $e['name']?></h2>
                     <h4><?=substr($e['details'],0,15).'<br>'.substr($e['details'],15,20);?></h4>
                  </div>
         </div>
      <?php }}?>
        
     </div>
     <span onclick="slideLeft()" class="btn"></span>
   </div>
 </div>





    <!--poster flyer-->
    <section class="landing-page-flyer">
      <div class="container">
         <div class="flyer-align">
            <div class="flyer flyer1">
               
               <img src="<?= base_url();?>assets1/img/flyer/flyer-1.jfif" alt=""main-image>

               <img class="hyper" src="<?= base_url();?>assets1/img/flyer/link.png" alt="hyper" >
            </div>
            <div class="flyer flyer2">
               <img src="<?= base_url();?>assets1/img/flyer/flyer-2.jfif" alt=""main-image>

               <img class="hyper" src="<?= base_url();?>assets1/img/flyer/link.png" alt="hyper" >
            </div>
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
            <a href="" class="hurray__offer">
               <img src="<?= base_url();?>assets/images/<?= $wonder['image']?>" alt="img">
               <h4><?= $wonder['name']?></h4>
            </a>
            <?php }}?>
         </div>
      </div>
   </div>
</section>
<!-- Banner two End -->











