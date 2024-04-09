<!-- Full Calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                      <?php echo $title ?>
                </h1>
            </div>
            <div class="col-md-2"><button data-bs-toggle="modal" data-bs-target="#event_entry_modal" class="btn btn-danger">Book</button></div>
        </div>
        <div class="row">
            <p class="calendar_id" data-id="<?= $id?>"></p>
            <div class="col-md-6 offset-md-3">
        <div id='calendar'></div>
    </div>
       
    </div>
</div>





<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Booking</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <?php echo form_open_multipart(base_url().'homestay/booking/'.$id)?>
                    <div class="row">
                        <div class="col-sm-12">  
                            <div class="form-group">
                              <label for="name">Customer  name</label>
                              <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(!empty($this->session->flashdata('name')))echo $this->session->flashdata('name');?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">  
                            <div class="form-group">
                              <label for="phone">Customer  phone</label>
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php if(!empty($this->session->flashdata('phone')))echo $this->session->flashdata('phone');?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">  
                            <div class="form-group">
                              <label for="guests">Guests</label>
                              <input type="text" name="guests" id="guests" class="form-control" placeholder="Max. <?= $allowed;?> Guests allowed." value="<?php if(!empty($this->session->flashdata('guests')))echo $this->session->flashdata('guests');?>" max="2"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">  
                            <div class="form-group">
                              <label for="guests">Address Proof</label>
                              <div class="row">
                        <div class="col-sm-12"> 
                              <input type="radio" name="proof" id="aadhar_select"  value ="aadhar"  class="radio" required checked><label class="mx-2">AADHAR</label>
                              <input type="radio" name="proof" id="voter_select"  value ="voter_id" class="radio"  required><label class="mx-2">VOTER ID</label>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12"> 
                              <input type="text" name="proofno" id="aadhar" class="form-control" placeholder="AADHAR NUMBER"  required>
                              <input type="text"  id="voter" class="form-control" placeholder="VOTER ID NUMBER" style="display:none;">
                          </div>
                      </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="form-group">
                              <label for="checkin">Check IN</label>
                              <input type="date" name="checkin" id="checkin" class="form-control onlydatepicker" min="<?= date('Y-m-d')?>" value="<?php if(!empty($this->session->flashdata('checkin'))){echo $this->session->flashdata('checkin');}else{ date('Y-m-d');}?>" required>
                             </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                              <label for="checkout">Check Out</label>
                              <input type="date" name="checkout" id="checkout" class="form-control"  value="<?php if(!empty($this->session->flashdata('checkout'))){echo $this->session->flashdata('checkout');}else{ date('Y-m-d');}?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Book</button>
                
            </div>
            <?php if(!empty($this->session->flashdata('popup_error'))){echo $this->session->flashdata('popup_error');}?>
        </div>
    </div>
</div>


