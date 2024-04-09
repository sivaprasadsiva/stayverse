
<!-- Header top End -->

<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Booking Vehicle
         </h2>
      </div>
   </div>
   <!--Container-->
</section>
<!-- breadcumnd banner End -->

<section>
   <br>
   <div class="container">
      <div class="table-responsive">
         <table class="table table-bordered">
         <thead>
            <th>Sl NO</th>
            <th>Booking Date & Time</th>
            <th>Vehicle Name</th>
            <th>Vehicle Model</th>
            <th>Vehicle Type</th>
            <th>Location</th>
            <th>Pick up date</th>
            <th>Drop of date</th>
            <th>Time</th>
            <th>Price</th>
            <th>Payment</th>
         </thead>
         <tbody>
            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){?>
                  <tr>
                     <td><?= $n?></td>
                     <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
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
</section>