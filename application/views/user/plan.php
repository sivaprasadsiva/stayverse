
    
            <section class="container section-style">
                <div class="heading-styel">
                    <h1>Plan</h1>
                </div>
            </section>
            <section class="section-style blue-bg">
                <div class="container">
                <div class="event-section-con row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="img-box-con">
                            <div class="event-img-con">
                                <img src="<?= base_url();?>assets/images/plan/<?= $plan_image?>"
                                    alt="">
                            </div>
                            <div class="event-name">
                                <h2><?= $plan_name?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="review-box description-con">
                            <div class="description-head">
                                <h2>Services</h2>
                            </div>
                            <div class="description-content">
                                <h5><ul>
                                    <?php if(!empty($services)){
                                        foreach($services as $service){
                                            echo '<li>'.$service['guestlove'].'</li>';
                                        }
                                    }?></ul>
                                </h5>
                            </div>
                            
                            <div class="description-booking" >
                                <?php if($payment == 0){?>
                                <a href="<?= base_url('userpanel/plan_payment/'.$id)?>" class="description-btn login-btn" style="background:red;">
                                    <h5>₹ <?= $plan_price?></h5>
                                </a>
                            <?php }?>
                            </div>
                        
                        </div>
                    </div>
                </div>
                </div>
            </section>





   