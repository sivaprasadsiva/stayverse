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
                <?php echo form_open_multipart(base_url().'dashboard_admin/update_homestay/'.$id)?>
                            <label>name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $name?>">
                            <label class="mt-3">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required value="<?= $phone?>">
                            <label class="mt-3">E-mail</label>
                            <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?= $email?>">
                            <label class="mt-3">Address</label>
                            <textarea name="address" rows="5" class="form-control mt-2" placeholder="Address" required><?= $address?></textarea>
                            <label class="mt-3">Rooms</label>
                            <input type="text" class="form-control" placeholder="Rooms" name="rooms" required value="<?= $rooms?>">
                            <label class="mt-3">Description</label>
                            <textarea name="description" rows="5" class="form-control mt-2" placeholder="Description" required><?= $description?></textarea>
                            <label class="mt-3">Contact Name</label>
                            <input type="text" class="form-control" placeholder="Contact Name" name="contactname" required value="<?= $contactname?>">
                             <label class="mt-3">Contact Number</label>
                            <input type="text" class="form-control" placeholder="Contact Number" name="contactnumber" required value="<?= $contactnumber?>">
                             <label class="mt-3">Contact Person</label>
                            <input type="text" class="form-control" placeholder="Contact Person" name="contact_person" required value="<?= $contact_person?>">
                            <label>State</label>
                            <select class="form-select state " name="state">
                                
                                <?php 
                                    foreach ($state as $value): if($value['id'] == $st):?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['state'] ?></option>
                                    <?php elseif($value['id'] != $st):?>
                                        <option value="<?= $value['id'] ?>"><?= $value['state'] ?></option>
                                    <?php endif;endforeach; ?>
                            </select>
                            <label>District</label>
                            <select class="form-select district mt-2" name="district">
                                <?php 
                                    foreach ($district as $value): if($value['state_id'] == $st):if($value['did'] == $dist):?>
                                        <option value="<?= $value['did'] ?>" selected><?= $value['district'] ?></option>
                                    <?php elseif($value['did'] != $dist):?>
                                        <option value="<?= $value['did'] ?>"><?= $value['district'] ?></option>
                                    <?php endif;endif;endforeach; ?>
                            </select>
                            <label class="mt-3">Location</label>
                            <select class="form-select mt-2 location" name="location" required>
                                 <?php 
                                    foreach ($location as $value): if($value['district_id'] == $dist):if($value['lid'] == $loc):?>
                                        <option value="<?= $value['lid'] ?>" selected><?= $value['location'] ?></option>
                                    <?php elseif($value['lid'] != $loc):?>
                                        <option value="<?= $value['lid'] ?>"><?= $value['location'] ?></option>
                                    <?php endif;endif;endforeach; ?>
                            </select>
                            <label class="mt-3">Password</label>
                            <input type="text" class="form-control" placeholder="Password" name="password" required value="<?= $password?>">
                            <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" name="submit">
                           <?php echo form_close()?>
            </div>
        </div>
        
    </div>
</div>
</div>

