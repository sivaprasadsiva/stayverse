
<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               <h4>
                  Set Up Your Password 
               </h4>
               <p class="head__pra">
                  Your security is our top priority. You'll need this to log into your account
               </p>
               <?php if(!empty($id))echo form_open((base_url().'userpanel/signup_page3/'.$id.'/'.$vehicle_id.'/'.$sep),array('class'=>'signup__form password__box pt__40'));
               else
                echo form_open((base_url().'userpanel/signup_page2'),array('class'=>'signup__form password__box pt__40'));
               ?> 
                  <div class="row g-4">
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="password-field" class="form-label">Choose Password</label>
                           <div class="form-group">
                              <input id="password-field" type="password" class="form-control pass" placeholder="Enter Your Password" name="password" value="">
                              <span id="#password-field" class="fa fa-fw field-icon toggle-password">
                                 <i class="material-symbols-outlined">
                                    visibility
                                 </i>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="password-field" class="form-label">Confirm Password</label>
                           <div class="form-group">
                              <input id="toggle-password2" type="password" class="form-control cpass" placeholder="Password" name="cpassword" value="">
                              <span id="#toggle-password2" class="fa fa-fw field-icon toggle-password2">
                                 <i class="material-symbols-outlined">
                                    visibility
                                 </i>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp mt-3">
                           <p style="color: red;display: none;" id="password_error">Password matching error.</p>
                          <button type="submit" class="cmn__btn" name="submit" id="password_btn">
                              <span>
                                 Submit Now
                              </span>
                          </button>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp mt-2">
                          <a href="<?php if(!empty($id)) echo base_url().'userpanel/signup_page/'.$id.'/'.$vehicle_id.'/'.$sep;else echo base_url().'userpanel/signup_page1'?>" class="back__btn">
                              <span class="icon">
                                 <i class="material-symbols-outlined">
                                    keyboard_backspace
                                 </i>
                              </span>
                              <span>
                                 Back
                              </span>
                          </a>
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

   
