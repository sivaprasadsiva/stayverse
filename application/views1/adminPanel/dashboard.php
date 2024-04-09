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
                                Room No
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
                                Payment
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){?>
                                 <tr>
                                    <td><?= $n?></td>
                                    <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                                    <td><?php if($book['bstatus'] == 3){foreach($user as $u){if($u['id'] == $book['user_id']){echo $u['name'];}} }else{echo $book['first_name'].' '.$book['last_name'];}?></td>
                                    <td><?php if($book['bstatus'] == 3){foreach($user as $u){if($u['id'] == $book['user_id']){echo $u['phone'];}} }else{echo $book['uphone'];}?></td>
                                    <td><?= $book['name']?></td>
                                    <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',<br>';}}?></td>
                                    <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['no'].',<br>';}}?></td>
                                    <td><?= $book['guests']?></td>
                                    <td><?= date('d-m-Y',strtotime($book['checkin']))?></td>
                                    <td><?= date('d-m-Y',strtotime($book['checkout']))?></td>
                                    <td><?= '₹ '.number_format($book['price']).' /-'?></td>
                                    <td><?php if($book['bstatus'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['bstatus'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}else if($book['bstatus'] == 3){ echo "<p style='color:blue;'>Homestay Direct<p>";}?></td>
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