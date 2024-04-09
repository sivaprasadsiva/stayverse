
<!-- Header top End -->

<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Booking Homestay
         </h2>
         <ul class="breadcumnd__link">
            <li>
               <a href="<?= base_url().'userpanel/index'?>">
                  Home
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  Booking
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  Hotel
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  Hotel Details
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  
                  chevron_right
               </i>
            </li>
            <li>
               Confirm Details
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               Booking
            </li>
         </ul>
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
            <th>Homestay Name</th>
            <th>Room Type</th>
            <th>Guests</th>
            <th>Check IN date</th>
            <th>Check OUT date</th>
            <th>Total Price</th>
            <th>Status</th>
         </thead>
         <tbody>
            <?php if(!empty($booking)){$n = 1;foreach($booking as $book){?>
                  <tr>
                     <td><?= $n?></td>
                     <td><?= date('d-m-Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                     <td><?= $book['name']?></td>
                     <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',';}}?></td>
                     <td><?= $book['guests']?></td>
                     <td><?= $book['checkin']?></td>
                     <td><?= $book['checkout']?></td>
                     <td><?= '₹ '.number_format($book['price']).' /-'?></td>
                     <td><?php if($book['bstatus'] == 1){ echo "<p style='color:red;'>Payment Failed<p>";}else if($book['bstatus'] == 2){ echo "<p style='color:green;'>Payment Success<p>";}?></td>
                  </tr>
            <?php $n++;}}?>
         </tbody>
      </table>
      </div>
      
   </div>
</section>