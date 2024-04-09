

<section>
   <?php if(!empty($booking)){?>
   <br>
   <div class="container">
      <h2>My Bookings</h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
         <thead>
            <th>Sl NO</th>
            <th>Booking Date & Time</th>
            <th>Homestay Name</th>
            <th>Room Type</th>
            <th>Guests</th>
            <th>Check IN date</th>
            <th>Check OUT date</th>
            <th>Total Price</th>
            <th>Status</th>
         </thead>
         <tbody>
            <?php $n = 1;foreach($booking as $book){?>
                  <tr>
                     <td><?= $n?></td>
                     <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                     <td><?= $book['name']?></td>
                     <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',';}}?></td>
                     <td><?= $book['guests']?></td>
                     <td><?= $book['checkin']?></td>
                     <td><?= $book['checkout']?></td>
                     <td><?= '₹ '.number_format($book['total_price'],2).' /-'?></td>
                     <td><?php if($book['bstatus'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['bstatus'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}?></td>
                  </tr>
            <?php $n++;}?>
         </tbody>
      </table>
      </div>
      
   </div>
   <?php }?>
</section>
