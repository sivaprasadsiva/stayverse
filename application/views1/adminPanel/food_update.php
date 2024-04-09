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
                <?php echo form_open_multipart(base_url().'dashboard_admin/food_update/'.$id)?>
                <img src="<?= $img?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_food_img/'.$id?>" class="btn btn-danger">change</a><br>
                            <label>Category</label>
                            <select class="form-select" name="category">
                                
                                <?php 
                                    foreach ($category as $value): if($value['id'] == $cat):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['category_name'] ?></option>
                                    <?php elseif($value['id'] != $cat):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['category_name'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price" required value="<?= $price?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>