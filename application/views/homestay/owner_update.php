<div class="content-body">
    <div class="container-fluid">
        <?php if(empty($owner)){?>
        <div class="row">
            <div class="col-md-10">
                <h1>
                     ADD <?php echo $title ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php echo form_open_multipart(base_url().'homestay_owner/index')?>

                            
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" required>
                            <input type="text" class="form-control mt-2" placeholder="Age" name="age" required>
                            <label class="mt-2">Voter ID</label>
                            <input type="file" class="form-control" title ="Upload Voter ID" name="voter_id" accept=".png,.jpeg,.jpg" required>
                            <label class="mt-2">Aadhar Card</label>
                            <input type="file" class="form-control" title ="Upload Aadhar Card" name="aadhar" accept=".png,.jpeg,.jpg" required>
                            <label class="mt-2">License</label>
                            <input type="file" class="form-control " title ="Upload Homestay License" name="license" accept=".png,.jpeg,.jpg" required>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                        
                           <?php echo form_close()?>
            </div>
        </div>
    <?php }else{?>
        <div class="row">
            <div class="col-md-6 offset-3">
        <?php
        if($approval == 0){
            echo "<h2>Waiting for Admin approval....</h2>";
        }?>
    </div>
</div>
    <?php }?>
    </div>
</div>


