<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2>Vehicle Booking</h2>
    
    <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="example4">
                        <thead>
                            <th>Sl NO</th>
                            <th>Booking <br>Date & Time</th>
                            <th>Customer Name</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Model</th>
                            <th>Vehicle Type</th>
                            <th>Location</th>
                            <th>Pick up date</th>
                            <th>Drop of date</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Payment</th>
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){?>
                  <tr>
                     <td><?= $n?></td>
                     <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                     <td><?= $book['vehicle_name']?></td>
                     <td><?= $book['vehicle_name']?></td>
                     <td><?= $book['company_name']?></td>
                     <td><?= $book['type']?></td>
                     <td><?= $book['loc']?></td>
                     <td><?= $book['pick_date']?></td>
                     <td><?= $book['drop_date']?></td>
                     <td><?= date('h:ma',strtotime($book['time']))?></td>
                     <td><?= '₹ '.number_format($book['price']).' /-'?></td>
                     <td><?php if($book['status'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['status'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}?></td>
                  </tr>
            <?php $n++;}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        
    </div>
</div>
</div>