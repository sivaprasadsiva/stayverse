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
                <?php echo form_open_multipart(base_url().'dashboard_admin/plan_update/'.$id)?>
                <label>Icon</label><br>
                            <img src="<?= $img?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_plan_img/'.$id?>" class="btn btn-danger">change</a><br><br>
                            <label>Image</label><br>
                            <img src="<?= $img2?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_plan_img1/'.$id?>" class="btn btn-danger">change</a><br><br>
                            <label>name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label class="mt-3">Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price" required value="<?= $price?>">
                            <br>
                            <label>Service</label>
                            <select class="services form-control" name="services[]" required multiple>
                                <?php foreach($services as $service){?>
                                    <option value="<?= $service['id']?>" selected><?= $service['guestlove']?></option>
                                <?php }?>
                                <?php foreach($service1 as $servic){foreach($guestlove as $g){if($g == $servic['id']){?>
                                    <option value="<?= $servic['id']?>" ><?= $servic['guestlove']?></option>
                                <?php }}}?>
                            </select><br><br>
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>

