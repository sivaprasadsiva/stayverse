<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Rooms Booking
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <input type="text" class="form-control search_room" placeholder="Search by Room No OR Room Type" >
                <!-- <a href="" class="search"><i class="fa fa-search" style="font-size:20px"></i></a> -->
            </div>
        </div>
        <div class="row m-3 new_filter"></div>
        <div class="row m-3 old_filter">
            
            <?php foreach($rooms as $r){?>
                <div class="col-md-3">
                    <div class="card" align="center">
                        <div class="card-body my-4">
                            <?php 
                            echo '

                            <h3>Room No : '. $r['no'].'</h3><br>
                            <table class="table table-striped">
                                <tr><th>Room Type  </th><td> '.$r['roomtype'].'</td></tr>
                                <tr><th>Price </th><td> '.$r['price'].'</td></tr>
                                <tr><th>Offer Price </th><td> '.$r['offerprice'].'</td></tr>
                               
                            </table>'?>
                            <a class="btn btn-success" href="<?= base_url('homestay/booking/'.$r['rid'])?>">Book</a>
                            
                        </div>
                        
                    </div>
                </div>
            <?php }?>
        </div>
        
    </div>
</div>
</div>

<!-- <style type="text/css">
    .search {
        position: relative;
        left: 93%;
        bottom: 35px;
    }
</style> -->