
<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               <?php if(!empty($page))echo form_open(base_url().'userpanel/otp_sender1/'.$page.'/'.$vid.'/'.$sep);
               else echo form_open(base_url().'userpanel/otp_sender');?>
                  <div class="row g-4">
                    
                     
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="phone">Enter Your Phone</label>
                           <input type="text" id="phone" placeholder="Your phone here" name="phone" pattern="[0-9]{10}" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp mt-2">
                          <button type="submit" class="cmn__btn" name="submit">
                              <span>
                                 Send OTP
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
