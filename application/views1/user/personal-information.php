
<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Personal information
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
               Personal information
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
                    <a href="<?= base_url().'userpanel/personalInfo'?>" class="nav-link active">
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
                     <a href="<?= base_url().'userpanel/transaction'?>" class="nav-link">
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
               </ul>            </div>
         </div>
         <div class="col-xxl-6 col-xl-6 col-lg-8">
            <div class="personal__infobody">
               <div class="personal__info__box">
                  <div class="per__ittle d-flex align-items-center">
                     <h5>
                        Personal information
                     </h5>
                     <a href="javascript:void(0)" class="edit d-flex align-items-center gap-2">
                        <span class="icon">
                           <img src="<?= base_url()?>assets1/img/svg/edits.svg" alt="img">
                        </span>
                        <span class="fz-18 fw-600">
                           Edit
                        </span>
                     </a>
                  </div>
                  <ul class="personal__details__name">
                     <li>
                        <span class="namebold fz-18 fw-600">
                           Name
                        </span>
                        <span>
                           <?= $name?>
                        </span>
                     </li>
                     <li>
                        <span class="namebold fz-18 fw-600">
                           Account Status
                        </span>
                        <span class="actbe">
                           Active
                        </span>
                     </li>
                     <li>
                        <span class="namebold fz-18 fw-600">
                           Email
                        </span>
                        <span>
                           <?= $email?>
                        </span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- order End -->

