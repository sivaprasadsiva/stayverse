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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_guestlove/'.$id)?>
                <img src="<?= $img?>" width="130px" height="100px"> <a href="<?= base_url().'dashboard_admin/update_guestlove_img/'.$id?>" class="btn btn-danger">change</a><br>
                            <label>Type</label>
                            <select title="select type" class="form-select" name="type">
                                <?php if($type == 'premium'){?>
                                    <option selected>premium</option>
                                    <option>gold</option>
                                <?php }else{?>
                                    <option>premium</option>
                                    <option selected>gold</option>
                                <?php }?>
                            </select>
                            <label>Guest Love</label>
                            <input type="text" class="form-control" placeholder="Guest Love" name="guestlove" required value="<?= $guestlove?>">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Guest Love" name="guestlove_price" required value="<?= $price?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>