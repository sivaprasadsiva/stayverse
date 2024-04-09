<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2>Booking</h2>
    
    <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="example4">
                        <thead>
                            <th>
                                No
                            </th>
                            <th>
                                Booking <br>Date & Time
                            </th>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Customer Phone
                            </th>
                            <th>
                                Homestay Name
                            </th>
                            <th>
                                Room Type
                            </th>
                            <th>
                                Guests
                            </th>
                            <th>
                                Check In date
                            </th>
                            <th>
                                Check out date
                            </th>
                            <th>
                                Total price
                            </th>
                            <th>
                                Payment Mode
                            </th>
                            <th>
                                Payment
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){if($book['payment_mode'] == 'online'){?>
                                 <tr>
                                    <td><?= $n?></td>
                                    <td><?= date('d M Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                                    <td><?php echo $book['customer_name'];?></td>
                                    <td><?php echo $book['customer_phone'];?></td>
                                    <td><?php echo $book['homestay_name'];?></td>
                                    <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',<br>';}}?></td>
                                    <td><?= $book['guests']?></td>
                                    <td><?= date('d M Y',strtotime($book['checkin'])).'<br> 12 : 00 P.M.';?></td>
                                    <td><?= date('d M Y',strtotime($book['checkout'])).'<br> 11 : 59 A.M.';?></td>
                                    <td><?= '₹ '.number_format($book['total_price'],2).' /-'?></td>
                                    <td><?php echo $book['payment_mode'];?></td>
                                    <td><?php if($book['bstatus'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['bstatus'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}?></td>
                                </tr>
                            <?php $n+=1;}}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        
    </div>
</div>
</div>