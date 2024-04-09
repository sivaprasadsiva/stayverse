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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_rooms/'.$room.'/'.$id)?>
                <img src="<?= $img?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_rooms_img/'.$room.'/'.$id?>" class="btn btn-danger">change</a><br>
                            
                            <label>Name</label>
                            <select class="form-select mt-2" name="roomtype">
                                <?php 
                                    foreach ($roomtype as $value): if($value['id'] == $roomt):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['roomtype'] ?></option>
                                    <?php elseif($value['id'] != $roomt):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['roomtype'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>Details</label>
                            <textarea class="form-control" name="details" rows="5"><?= $details?></textarea>
                            <label>Offer Price</label>
                            <input type="text" class="form-control" placeholder="Offer Price" name="offerprice" required value="<?= $offerprice?>">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price" required value="<?= $price?>">
                            <label>Room No</label>
                            <input type="text" class="form-control" placeholder="Room No" name="no" required value="<?= $no?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>