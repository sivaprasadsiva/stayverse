<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
    <div class="col-md-10">
                <h1>Change Image</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
<?php if(!empty($img1)){?>
                    <?php echo form_open_multipart(base_url().'homestay/update_voter_id/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($img2)){?>
                    <?php echo form_open_multipart(base_url().'homestay/update_aadhar_card/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($img3)){?>
                    <?php echo form_open_multipart(base_url().'homestay/update_homestay_license/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($rooms)){?>
                    <?php echo form_open_multipart(base_url().'homestay/update_rooms_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
<?php }?>
</div>
        </div>
    </div>
</div>