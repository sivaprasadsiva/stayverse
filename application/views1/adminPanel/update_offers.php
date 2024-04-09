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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_offers/'.$id)?>
                <img src="<?= $img?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_offers_img/'.$id?>" class="btn btn-danger">change</a><br>
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label>Percentage</label>
                            <input type="text" class="form-control" placeholder="Percentage" name="percentage" required value="<?= $percentage?>">
                            <label>Terms & Conditions</label>
                            <textarea class="form-control" placeholder="Terms & Conditions" name="terms" required><?= $terms?></textarea> 
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>