<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <?php echo $title ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php echo form_open_multipart(base_url().'homestay/owner_update/'.$id)?>
                            <label>Voter ID</label><br>
                            <img src="<?= $voter?>" width="150px" height="100px"> <a href="<?= base_url().'homestay/update_voter_id/'.$id?>" class="btn btn-danger">change</a><br><br>
                            <label>Aadhar Card</label><br>
                            <img src="<?= $aadhar?>" width="150px" height="100px"> <a href="<?= base_url().'homestay/update_aadhar_card/'.$id?>" class="btn btn-danger">change</a><br><br>
                            <label>Homestay License</label><br>
                            <img src="<?= $license?>" width="150px" height="100px"> <a href="<?= base_url().'homestay/update_homestay_license/'.$id?>" class="btn btn-danger">change</a><br><br>
                            <label>name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label class="mt-3">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required value="<?= $phone?>">
                            <label class="mt-3">Age</label>
                            <input type="text" class="form-control" placeholder="Age" name="age" required value="<?= $age?>">
                            
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>

