<?php if(!empty($homestay)){foreach($homestay as $room){?>
            <div class="hotel__list__box">
               <div class="row g-4">
                  <!-- homestay -->
                  
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                     <a href="">
                        <div class="bits__hotel d-flex justify-content-between  gap-2">
                           <div class="thumb d-flex col-md-8">
                                 <img src="<?= base_url();?>assets/images/<?= $room['hphoto']?>" alt="img" height="auto" width="300px" height="auto">
                              </a>

                              <div class="content">
                                 <div class="title gap-3 d-flex ">
                                    <h5>
                                       <?= $room['name']?>
                                    </h5>
      
                                 </div>
                                 <span class="dubay mb__10  gap-2 d-flex align-items-center fz-16 fw-400 lato " style="font-size: 19px;color: #0084ff;  font-weight: 800;">
                                    <img src="<?= base_url();?>assets1/img/svg/mlocation.svg" alt="svg" >
                                    <?= $room['state'].','.$room['district']?>
                                 </span>
                                 <!-- <div class="  d-flex ">
                                    <div>
                                       <span style="  font-weight: 700;">Entire Aaprtment:</span>
                                    </div>
                                    <div style=" font-weight: 600;">
                                       <span>Beds:2</span>
                                    </div>
                                    <div style="  font-weight: 600;">
                                       <span>Baths:2</span>
                                    </div>
                                 </div> -->
                              <br>
                              <span class=" d-block  mb__20 lato textfive"style="color:#00a19c;font-size:15px;font-weight:600;">Free Cancellation till 24 hours before Check in</span>
                                 <span class=" d-block  mb__20 lato textfive"style="color:#8b572a;font-size:16px;font-weight:700;">Offers Free Wifi</span>
                                 <a href="<?= base_url().'userpanel/homestay/'.$room['hid']?>" class="cmn__btn" style="padding: 5px 5px;">
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
                                 </div>
                                 <div class="rating-content-fee2">
                                 </div>
                                 <div class="rating-content-p">
                                    <p>Starting price<br>
                                       <?php echo '₹ '.$room['offer']; ?>
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
               <p style="background-color:grey;" class="text-center"><?php echo $link;?></p>
