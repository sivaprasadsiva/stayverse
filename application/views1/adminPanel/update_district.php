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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_district/'.$id)?>
                            <label>State</label>
                            <select class="form-select" name="state">
                                
                                <?php 
                                    foreach ($state as $value): if($value['id'] == $st):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['state'] ?></option>
                                    <?php elseif($value['id'] != $st):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['state'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>District</label>
                            <input type="text" class="form-control" placeholder="District" name="district" required value="<?= $district?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>