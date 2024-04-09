

<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               <h4>
                 Sign in to Rechargio
               </h4>
               <p class="head__pra mb__30">
                 Sign in to your account and make recharges. payments and bookings faster
               </p>
               <?= form_open((base_url().'userpanel/login'),array('class'=>'signup__form'))?>
                  <div class="row g-4">
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="email">Enter Your Email ID</label>
                           <input type="email" id="email" placeholder="Your email ID here" name="email" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="pass">Enter Your Password</label>
                           <input type="password" id="pass" placeholder="Your Password" name="password" required>
                        </div>
                     </div>
                     <a href="<?= base_url().'userpanel/forgotten_password/0/0/0'?>" class="forgot">
                        Forgot Password?
                     </a>
                     <?php if($this->session->flashdata('error')){echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';}?>
                     <div class="col-lg-12">
                        <div class="input__grp">
                          <button type="submit" class="cmn__btn" name="submit">
                              <span>
                                 Sign In
                              </span>
                          </button>
                        </div>

                     </div>
                  </div>
                  
               <?= form_close()?>
               <p>Don't you have an account click to <a href="<?= base_url().'userpanel/otp'?>" style="color: blue;">Sign up</a> here.</p>
            </div>

         </div>
         <div class="col-xl-5 col-lg-6">
            <div class="signup__thumb">
               <img src="<?= base_url();?>assets1/img/signup/signup.png" alt="img">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- signUp End -->

   
