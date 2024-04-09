
<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               <?php if(!empty($page))echo form_open(base_url().'userpanel/otp_checker1/'.$page.'/'.$vid.'/'.$sep.'/'.$phone);
               else echo form_open(base_url().'userpanel/otp_checker/'.$phone);?>
                  <div class="row g-4">
                    
                     
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="phone">Phone Number</label>
                           <input type="text" id="phone" placeholder="Your phone here" name="phone" value="<?= $phone?>" readonly>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="otp">OTP</label>
                           <input type="text" id="otp" placeholder="Enter OTP here." name="otp"  required>
                        </div>
                     </div>
                     <div class="row">
                     <div class="col-lg-6">
                        <div class="input__grp mt-2">
                          <button type="submit" class="cmn__btn" name="submit">
                              <span>
                                 Submit
                              </span>
                          </button>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="input__grp mt-2">
                           <?php if(!empty($page)){?>
                              <p id="sep" data-id="<?= $sep?>"></p>
                              <p id="page" data-id="<?= $page?>"></p>
                              <p id="vid" data-id="<?= $vid?>"></p>
                          <a  class="cmn__btn" onclick="resend_otp1()">
                          <?php }else{?>
                           <a  class="cmn__btn" onclick="resend_otp()">
                           <?php }?>
                              <span>
                                 Resend
                              </span>
                          </a>
                        </div>
                     </div>
                  </div>
                  <?php if(!empty($this->session->flashdata('otp_error')))echo $this->session->flashdata('otp_error');?>
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
