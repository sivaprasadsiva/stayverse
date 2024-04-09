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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_pricerange/'.$id)?>
                            <label>Starting Price</label>
                            <input type="text" class="form-control" placeholder="Starting Price" name="starting_price" required value="<?= $starting_price?>">
                            <label>Ending Price</label>
                            <input type="text" class="form-control" placeholder="Ending Price" name="ending_price" required value="<?= $ending_price?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>