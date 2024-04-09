
<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Transaction
         </h2>
         <ul class="breadcumnd__link">
            <li>
               <a href="<?= base_url().'index'?>">
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
                  Pages
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               <a href="javascript:void(0)">
                  My Profile
               </a>
            </li>
            <li>
               <i class="material-symbols-outlined">
                  chevron_right
               </i>
            </li>
            <li>
               Transaction
            </li>
         </ul>
      </div>
   </div>
   <!--Container-->
</section>
<!-- breadcumnd banner End -->

<!-- order here -->
<section class="personal__information pt__60 pb__60">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xxl-4 col-xl-4 col-lg-4">
            <div class="personal__infotabs">
               <ul class="nav">
                  <li class="nav-item">
                    <a href="<?= base_url().'userpanel/personalInfo'?>" class="nav-link">
                     <span class="icon">
                        <img src="<?= base_url()?>assets1/img/svg/log.svg" alt="login">
                     </span>
                     <span>
                        Personal Information
                     </span>
                     </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                     <span class="icon">
                        <img src="<?= base_url()?>assets1/img/svg/log.svg" alt="login">
                     </span>
                     <span>
                        Login and security
                     </span>
                  </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                      <span class="icon">
                         <img src="<?= base_url()?>assets1/img/svg/badge.svg" alt="login">
                      </span>
                      <span>
                         Favourites
                      </span>
                   </a>
                   </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                     <span class="icon">
                        <img src="<?= base_url()?>assets1/img/svg/creadits.svg" alt="login">
                     </span>
                     <span>
                        Credit or Debit Cards
                     </span>
                  </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url().'userpanel/transaction'?>" class="nav-link  active">
                        <span class="icon">
                           <img src="<?= base_url()?>assets1/img/svg/file-transfer.svg" alt="login">
                        </span>
                        <span>
                           Transaction
                        </span>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="<?= base_url().'userpanel/passwordChange'?>" class="nav-link">
                        <span class="icon">
                           <img src="<?= base_url()?>assets1/img/svg/password-change.svg" alt="login">
                        </span>
                        <span>
                           Change Password
                        </span>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="<?= base_url().'userpanel/notification'?>" class="nav-link">
                        <span class="icon">
                           <img src="<?= base_url()?>assets1/img/svg/notifications.svg" alt="login">
                        </span>
                        <span>
                           Notifications
                        </span>
                     </a>
                   </li>
               </ul>
            </div>
         </div>
         <div class="col-xxl-8 col-xl-8 col-lg-8">
            <div class="personal__favorites">
               <div class="personal__info__box">
                  <div class="per__ittle d-flex align-items-center">
                     <h5>
                        All History
                     </h5>
                     <a href="javascript:void(0)" class="edit d-flex align-items-center gap-2">
                        <span class="icon delete">
                           <i class="material-symbols-outlined">
                              delete
                           </i>
                        </span>
                        <span class="fz-18 fw-600">
                           Clear Data
                        </span>
                     </a>
                  </div>
                  <div class="calender__date">
                     <input type="text" id="datepicker2" placeholder="01/01/2022 - 01/06/2023">
                     <i class="material-symbols-outlined">
                        calendar_month
                     </i>
                  </div>
                  <div class="table__system pb__24">
                     <table class="table1">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Transaction</th>
                            <th>Amount</th>
                            <th>Fee</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>01 Jan</td>
                            <td>Mobile Recharge</td>
                            <td>$750.00</td>
                            <td>-$50.00</td>
                           <td>
                              <a href="javascript:void(0)" class="edi">
                                 <img src="assets/img/payment/g-check.png" alt="img">
                              </a>
                           </td>
                          </tr>
                          <tr>
                           <td>27 Jan</td>
                           <td>Electric Bill</td>
                           <td>$320.00</td>
                           <td>-$15.00</td>
                          <td>
                             <a href="javascript:void(0)" class="edi">
                                <img src="assets/img/payment/g-cross.png" alt="img">
                             </a>
                          </td>
                         </tr>
                         <tr>
                           <td>24 Feb</td>
                           <td>Cable TV Bill</td>
                           <td>$410.00</td>
                           <td>-$30.00</td>
                          <td>
                             <a href="javascript:void(0)" class="edi">
                                <img src="assets/img/payment/g-check.png" alt="img">
                             </a>
                          </td>
                         </tr>
                         <tr>
                           <td>7 Mar</td>
                           <td>Flight Booking</td>
                           <td>$777.00</td>
                           <td>-$20.00</td>
                          <td>
                             <a href="javascript:void(0)" class="edi">
                                <img src="assets/img/payment/g-check.png" alt="img">
                             </a>
                          </td>
                         </tr>
                         <tr>
                           <td>27 Apr</td>
                           <td>Gas Bill</td>
                           <td>$450.00</td>
                           <td>-$5.00</td>
                          <td>
                             <a href="javascript:void(0)" class="edi">
                                <img src="assets/img/payment/g-cross.png" alt="img">
                             </a>
                          </td>
                         </tr>
                         <tr>
                           <td>01 Jun</td>
                           <td>Flight Booking</td>
                           <td>$440.00</td>
                           <td>-$10.00</td>
                          <td>
                             <a href="javascript:void(0)" class="edi">
                                <img src="assets/img/payment/g-worning.png" alt="img">
                             </a>
                          </td>
                         </tr>
                        </tbody>
                      </table>
                  </div>
                  <ul class="pagination justify-content-end">
                     <li>
                        <a href="#">
                           <span class="icon">
                              <i class="material-symbols-outlined">
                                 chevron_left
                              </i>
                           </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           1
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           2
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           3
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           ...
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           30
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <span class="icon">
                              <i class="material-symbols-outlined">
                                 chevron_right
                              </i>
                           </span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- order End -->
