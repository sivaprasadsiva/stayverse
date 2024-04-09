
            <section class="container section-style">
                <div class="heading-styel">
                    <h1>Find your wonderland</h1>
                </div>
            </section>
            <section class="section-style blue-bg">
                <div class="container">
                <div class="event-section-con row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="img-box-con">
                            <div class="event-img-con">
                                <img src="<?= base_url();?>assets/images/<?= $image?>"
                                    alt="">
                            </div>
                            <div class="event-name">
                                <h2><?= $name?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="review-box description-con">
                            <div class="description-head">
                                <h2>Description</h2>
                            </div>
                            <div class="description-content">
                                <h5><?= $details?>
                                </h5>
                            </div>
                            <!-- <div class="description-booking">
                                <a href="" class="description-btn login-btn">
                                    <h5>Book now</h5>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="related-box-area row">
                            <div class="related-head left-align">
                                <h2>Related wonderlands</h2>
                            </div>

                            <?php if(!empty($wonderlands)){foreach($wonderlands as $wonderland){if($wonderland['id']  != $id){?>
                            <a href="<?= base_url('userpanel/wonderland/'.$wonderland['id'])?>" class="ralated-boxs-con col-lg-3 col-md-3 col-sm-6 col-12">
                                <div class="ralated-boxs">
                                    <img src="<?= base_url();?>assets/images/<?= $wonderland['image']?>" alt="">
                                </div>
                                <div class="ralated-box-name">
                                    <h4><?= $wonderland['name']?></h4>
                                </div>
                            </a>
                        <?php }}}?>
                            
                        </div>
                    </div>
                </div>
                </div>
            </section>


       