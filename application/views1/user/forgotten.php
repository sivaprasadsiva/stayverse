

<!-- signUp here -->
<section class="signup__section bluar__shape">
   <div class="container">
      <div class="row align-items-center justify-content-between">
         <div class="col-xl-6 col-lg-6">
            <div class="signup__boxes">
               
               <?= form_open((base_url().'userpanel/forgotten_password/'.$page.'/'.$vehicle_id.'/'.$sep),array('class'=>'signup__form'))?>
                  <div class="row g-4">
                     <div class="col-lg-12">
                        <div class="input__grp">
                           <label for="email">Enter Your Email ID</label>
                           <input type="email" id="email" placeholder="Your email ID here" name="email" required>
                        </div>
                     </div>
                     <?php if($error == 2){if(!empty($this->session->flashdata('email'))){echo '<div class="alert alert-danger">'.$this->session->flashdata('email').'</div>';}?>
                     <?php }else if($error == 1){if(!empty($this->session->flashdata('success'))){echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';}}?>
                     <div class="col-lg-12">
                        <div class="input__grp">
                          <button type="submit" class="cmn__btn" name="submit">
                              <span>
                                 Submit
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

   
