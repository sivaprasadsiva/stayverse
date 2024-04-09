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
                <?php echo form_open_multipart(base_url().'dashboard_admin/vehicle_update/'.$id)?>
                <label class="mt-3">Vehicle Image</label><br>
                <img src="<?= $img1?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_vehicle_img1/'.$id?>" class="btn btn-danger">change</a><br>
                <label class="mt-3">RC Boook</label><br>
                <img src="<?= $img2?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_vehicle_img2/'.$id?>" class="btn btn-danger">change</a><br>
                <label class="mt-3">Insurance</label><br>
                <img src="<?= $img3?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_vehicle_img3/'.$id?>" class="btn btn-danger">change</a><br>
                            <label class="mt-3">Vehicle Type</label>
                            <select class="form-select type ">
                                
                                <?php 
                                    foreach ($type as $value): if($value['id'] == $typeid):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['type'] ?></option>
                                    <?php elseif($value['id'] != $typeid):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['type'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>Company</label>
                            <select class="form-select company_name mt-2" name="model_id">
                                <?php 
                                    foreach ($company_name as $value): if($value['type_id'] == $typeid):if($value['mid'] == $modelid):?>
                                        <option value="<?= $value['mid'] ?>" selected><?= $value['company_name'] ?></option>
                                    <?php elseif($value['mid'] != $modelid):?>
                                        <option value="<?= $value['mid'] ?>"><?= $value['company_name'] ?></option>
                                    <?php endif;endif;endforeach; ?>
                            </select>
                            <label>Vehicle Name</label>
                            <input type="text" name="vehicle_name" class="form-control mt-2" placeholder="Vehicle Name" value="<?= $vehicle_name;?>" required>
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_number" class="form-control mt-2" placeholder="Vehicle Number" value="<?= $vehicle_number;?>" required>
                            <label>Rental Price</label>

                            <input type="text" name="rental_price" class="form-control mt-2" placeholder="Rental Price" value="<?= $rental_price;?>" required>
                            <label>Insurance Expiry Date</label>
                            <input type="date" name="insurance_exp_date" class="form-control" value="<?= $insurance;?>" required>
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>