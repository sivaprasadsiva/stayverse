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
                <?php echo form_open_multipart(base_url().'dashboard_admin/staff_update/'.$id)?>
                            <label>name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label class="mt-3">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required value="<?= $phone?>">
                            <label class="mt-3">E-mail</label>
                            <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?= $email?>">
                            <label class="mt-3">Age</label>
                            <input type="text" class="form-control" placeholder="Age" name="age" required value="<?= $age?>">
                            <label class="mt-3">Place</label>
                            <input type="text" class="form-control" placeholder="Place" name="place" required value="<?= $place?>">
                             <label class="mt-3">Designation</label>
                            <input type="text" class="form-control" placeholder="Designation" name="designation" required value="<?= $designation?>">
                            <label class="mt-3">Password</label>
                            <input type="text" class="form-control" placeholder="Password" name="password" required value="<?= $password?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>

