<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-success text-success">
                                <?php if(!empty($available)){echo $available;}else{ echo 0;}?>
                            </span>
                            <div class="media-body">
                                <p class="mt-3">AVAILABLE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                               <?php if(!empty($booked)){echo $booked;}else{ echo 0;}?>
                            </span>
                            <div class="media-body">
                                <a href="<?= base_url('homestay/today_booking')?>"><p class="mt-3">BOOKED</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-warning text-warning">
                                <?php if(!empty($total_rooms)){echo $total_rooms;}else{ echo 0;}?>
                            </span>
                            <div class="media-body">
                                <p class="mt-3">TOTAL ROOMS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-success text-success">
                                &#x20B9;
                            </span>
                            <div class="media-body">
                                <p class="mb-1">DAY INCOME</p>
                                <h4 class="mb-0"><?php if(!empty($dayincome)){echo $dayincome;}else{ echo 0;}?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                &#x20B9;
                            </span>
                            <div class="media-body">
                                <p class="mb-1">MONTHLY INCOME</p>
                                <h4 class="mb-0"><?php if(!empty($monthincome)){echo $monthincome;}else{ echo 0;}?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-warning text-warning">
                                &#x20B9;
                            </span>
                            <div class="media-body">
                                <p class="mb-1">TOTAL INCOME</p>
                                <h4 class="mb-0"><?php if(!empty($totalincome)){echo $totalincome;}else{ echo 0;}?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           


            <div class="col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12 col-xxl-6">
                        <div class="card dlab-join-card h-auto">
                            <div class="card-body">
                                <div class="dlab-media d-flex justify-content-between">
                                    <div class="dlab-content">
                                        <h4 class="mx-5">Welcome To <?php echo $role ?> </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 bt-order">
                        <h3>Rooms</h3>
                        <div class="row">
                        <?php if(!empty($rooms)){
                                foreach($rooms as $r){
                                    $rid = 0;
                                if(!empty($checking)){
                                    foreach($checking as $check){
                                        if($check['rid'] == $r['rid']){
                                            $time = strtotime(date('Y-m-d'));
                                            $checkin = strtotime(date('y-m-d',strtotime($check['checkin'])));
                                            $checkout = strtotime(date('y-m-d',strtotime($check['checkout'])));
                                            if(($time >= $checkin && $time <= $checkout)||($time <= $checkin && $time >= $checkout)||($time > $checkin && $time <= $checkout )||($time <= $checkin && $time >= $checkin)){  $rid = 1;}}}}
                                            if($rid == 1){?>
                                            <div class="col-xl-1 col-sm-2">
                                                <a href="<?= base_url('homestay/booking/'.$r['rid'])?>">
                                                     <div class="dlab-cource " style="background-color: #45fc03;">
                                                    <div class="d-flex align-items-center">
                                                    <div class="">

                                                        <span> <?= $r['roomtype'].'<br>'. $r['no'];?></span>

                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                        <?php }if($rid == 0){?>
                                            <div class="col-xl-1 col-sm-2">
                                                <a href="<?= base_url('homestay/booking/'.$r['rid'])?>">
                                                    <div class="dlab-cource" style="background-color: #adbbc4;">
                                                    <div class="d-flex align-items-center">
                                                    <div class="">

                                                        <span> <?= $r['roomtype'].'<br>'. $r['no'];?></span>

                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                        <?php }}}?>

                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>