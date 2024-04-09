
<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               <h4>
                  Let's Get Started!
               </h4>
               <p class="head__pra">
                  Please Enter your Email Addredd to Start your Online Application
               </p>
               <?= form_open(base_url().'userpanel/signup_page1')?>
                  <div class="row g-4">
                     <div class="col-lg-6">
                        <div class="input__grp">
                           <label for="fname">First Name</label>
                           <input type="text" id="fname" placeholder="Jone" name="fname" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="input__grp">
                           <label for="lname">Last Name</label>
                           <input type="text" id="lname" placeholder="Fisher" name="lname" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="email">Enter Your Email ID</label>
                           <input type="email" id="email" placeholder="Your email ID here" name="email" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="code">Enter Your Refferal ID</label>
                           <input type="text" id="code" placeholder="Enter the referral code" name="referral">
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <p class="tag__pra">
                              By clicking submit, you agree to <a href="#">Terms of Use</a>, <a href="#0">Privacy Policy</a>, <a href="#0">E-sign</a> & <a href="#0">communication Authorization</a>.
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp mt-2">
                          <button type="submit" class="cmn__btn" name="submit">
                              <span>
                                 Signup
                              </span>
                          </button>
                        </div>
                     </div>
                  </div>
               <?= form_close()?>
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
