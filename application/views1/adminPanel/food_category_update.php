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
                <?php echo form_open_multipart(base_url().'dashboard_admin/food_category_update/'.$id)?>
                            <label>Starting Time</label>
                            <input type="time" class="form-control" placeholder="Starting Time" name="start" required value="<?= $start?>">
                            <label>Ending Time</label>
                            <input type="time" class="form-control" placeholder="Ending Time" name="end" required value="<?= $end?>">
                            <label>Category</label>
                            <input type="text" class="form-control" placeholder="Category" name="category" required value="<?= $cat?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>