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
                <?php echo form_open_multipart(base_url().'dashboard_admin/vehicle_model_update/'.$id)?>
                            <label>Vehicle Type</label>
                            <select class="form-select" name="type">
                                
                                <?php 
                                    foreach ($type as $value): if($value['id'] == $typeid):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['type'] ?></option>
                                    <?php elseif($value['id'] != $typeid):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['type'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>Model Name</label>
                            <input type="text" class="form-control" placeholder="Model Name" name="company_name" required value="<?= $company_name?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>