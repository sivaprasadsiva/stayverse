
<section>
   <?php if(!empty($booking_plan)){?>
   <br>
   <div class="container">
      <h2>Booked Plans</h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
         <thead>
            <th>Sl NO</th>
            <th>Plan Name</th>
            <th>Price</th>
            <!-- <th>Status</th> -->
         </thead>
         <tbody>
            <?php $n = 1;foreach($booking_plan as $book){if($book['status'] == 1){?>
                  <tr>
                     <td><?= $n?></td>
                     <td><?= $book['name']?></td>
                     <td><?= '₹ '.number_format($book['plan_price'],2);?></td>
                     <!-- <td><?php if($book['status'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['status'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}?></td> -->
                  </tr>
            <?php $n++;}}?>
         </tbody>
      </table>
      </div>
      
   </div>
   <?php }?>
</section>
