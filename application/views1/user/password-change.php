
<!-- breadcumnd banner Here -->
<section class="breadcumnd__banner">
   <!--Container-->
   <div class="container">
      <div class="breadcumnd__wrapper">
         <h2 class="bread__title">
            Change Password
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
               Change Password
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
                     <a href="<?= base_url().'userpanel/passwordChange'?>" class="nav-link active">
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
         <div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="personal__favorit">
               <div class="personal__info__boxtwo">
                  <div class="per__ittle d-flex align-items-center">
                     <h5>
                        Change Password
                     </h5>
                  </div>
                  <form action="<?= base_url('userpanel/passwordChange')?>" class="change__password" method="post">
                     <div class="form__grp mb__20">
                        <label for="present">Present Password</label>
                        <input type="password" id="presentpass" placeholder="Present Password" required>
                     </div>
                     <div class="form__grp mb__20">
                        <label for="new">New Password</label>
                        <input type="password" id="newpass" placeholder="New Password" required>
                     </div>
                     <div class="form__grp mb__40">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" id="confirmpass" placeholder="Confirm Password" name="confirm" required>
                     </div>
                     <div class="form__grp">
                        <button type="submit" class="cmn__btn" id="passbtn" name="submit">
                           <span>
                              Update Password
                           </span>
                        </button>
                        <p style="color:red;font-size:14px;display: none;" id="current_password_error">Enter correct current password.</p>
                        <p style="color:red;font-size:14px;display: none;" id="confirm_password_error">Confirm password mismatch.</p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- order End -->
