<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2>Pending Payment</h2>
    
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
                                Room Type
                            </th>
                            <th>
                                Total price
                            </th>
                            <th>
                                Pending payment
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){if(($book['payment_mode'] == 'online') && ($book['status'] == 1))$balance = 0;
                                if(!empty($paid)){ foreach($paid as $pay){ if($pay['booking_id'] == $book['bid']){ $balance = $pay['payment'];}}} $bal = $book['total_price_room'] - $balance;?>
                                 <tr>
                                    <td><?= $n?></td>
                                    <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                                    <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',<br>';}}?></td>
                                    <td><?= '₹ '.number_format($book['total_price_room'],2).' /-'?></td>
                                    <td><?= '₹ '.number_format($bal,2).' /-'?></td>
                                </tr>
                            <?php $n+=1;}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        
    </div>
</div>
</div>