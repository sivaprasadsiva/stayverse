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
                <?php echo form_open_multipart(base_url().'dashboard_admin/coupon_update/'.$id)?>
                            <label>Coupon name</label>
                            <input type="text" class="form-control" placeholder="Coupon name" name="name" required value="<?= $name?>">
                            <label>Coupon code</label>
                            <input type="text" class="form-control" placeholder="Coupon code" name="code" required value="<?= $code?>">
                            <label>Percentage</label>
                            <input type="text" class="form-control" placeholder="Percentage" name="percentage" required value="<?= $percentage?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>