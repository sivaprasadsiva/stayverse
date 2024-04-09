<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>
                    <?php echo $title ?>
                </h3>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 ">
                <?php echo form_open_multipart(base_url() . 'dashboard_admin/update_homestay/' . $id) ?>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <img src="<?= $img ?>" width="130px" height="100px"> <a
                            href="<?= base_url() . 'dashboard_admin/update_homestay_img/' . $id ?>"
                            class="btn btn-danger">change</a><br>
                    </div>
                    <div class="col-md-6 col-6">
                        <label>name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" required
                            value="<?= $name ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" required
                            value="<?= $phone ?>">
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required
                            value="<?= $email ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Address</label>
                        <textarea name="address" rows="5" class="form-control mt-2" placeholder="Address"
                            required><?= $address ?></textarea>
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Description</label>
                        <textarea name="description" rows="5" class="form-control mt-2" placeholder="Description"
                            required><?= $description ?></textarea>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Rooms</label>
                        <input type="text" class="form-control" placeholder="Rooms" name="rooms" required
                            value="<?= $rooms ?>">
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Contact Name</label>
                        <input type="text" class="form-control" placeholder="Contact Name" name="contactname" required
                            value="<?= $contactname ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact Number" name="contactnumber"
                            required value="<?= $contactnumber ?>">
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Contact Person</label>
                        <input type="text" class="form-control" placeholder="Contact Person" name="contact_person"
                            required value="<?= $contact_person ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label>State</label>
                        <select class="form-select state " name="state">

                            <?php
                            foreach ($state as $value):
                                if ($value['id'] == $st): ?>
                                    <option value="<?= $value['id'] ?>" selected>
                                        <?= $value['state'] ?>
                                    </option>
                                <?php elseif ($value['id'] != $st): ?>
                                    <option value="<?= $value['id'] ?>">
                                        <?= $value['state'] ?>
                                    </option>
                                <?php endif; endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-6">
                        <label>District</label>
                        <select class="form-select district mt-2" name="district">
                            <?php
                            foreach ($district as $value):
                                if ($value['state_id'] == $st):
                                    if ($value['did'] == $dist): ?>
                                        <option value="<?= $value['did'] ?>" selected>
                                            <?= $value['district'] ?>
                                        </option>
                                    <?php elseif ($value['did'] != $dist): ?>
                                        <option value="<?= $value['did'] ?>">
                                            <?= $value['district'] ?>
                                        </option>
                                    <?php endif; endif; endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Location</label>
                        <select class="form-select mt-2 location" name="location" required>
                            <?php
                            foreach ($location as $value):
                                if ($value['district_id'] == $dist):
                                    if ($value['lid'] == $loc): ?>
                                        <option value="<?= $value['lid'] ?>" selected>
                                            <?= $value['location'] ?>
                                        </option>
                                    <?php elseif ($value['lid'] != $loc): ?>
                                        <option value="<?= $value['lid'] ?>">
                                            <?= $value['location'] ?>
                                        </option>
                                    <?php endif; endif; endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Room Type</label>
                        <select class="roomtype " name="roomtype[]" required multiple>
                                    <?php foreach($roomtypes as $rt){?>
                                    <option value="<?= $rt['rid']?>" selected><?= $rt['roomtype']?></option>
                                <?php }?>
                                <?php foreach($roomtypes1 as $rt1){foreach($roomtype as $rt2){if($rt2 == $rt1['id']){?>
                                    <option value="<?= $rt1['id']?>" ><?= $rt1['roomtype']?></option>
                                <?php }}}?>
                                </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Category</label>
                        <select class="category" name="category[]" required multiple>
                                    <?php foreach($categorys as $c){?>
                                    <option value="<?= $c['cid']?>" selected><?= $c['category']?></option>
                                <?php }?>
                                <?php foreach($category1 as $c1){foreach($category as $c2){if($c2 == $c1['id']){?>
                                    <option value="<?= $c1['id']?>" ><?= $c1['category']?></option>
                                <?php }}}?>
                                </select>
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Guest Love</label>
                        <select class="services" name="services[]" required multiple>
                                    <?php foreach($services as $s){?>
                                    <option value="<?= $s['gid']?>" selected><?= $s['guestlove']?></option>
                                <?php }?>
                                <?php foreach($service1 as $s1){foreach($service as $s2){if($s2 == $s1['id']){?>
                                    <option value="<?= $s1['id']?>" ><?= $s1['guestlove']?></option>
                                <?php }}}?>
                                </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Home Rules</label>
                        <select class="rules" name="rules[]" required multiple>
                                    <?php foreach($rules as $r){?>
                                    <option value="<?= $r['rid']?>" selected><?= $r['homerules']?></option>
                                <?php }?>
                                <?php foreach($rule1 as $r1){foreach($rule as $r2){if($r2 == $r1['id']){?>
                                    <option value="<?= $r1['id']?>" ><?= $r1['homerules']?></option>
                                <?php }}}?>
                                </select>
                    </div>
                    <div class="col-md-6 col-6">
                        <label class="mt-3">Password</label>
                        <input type="text" class="form-control" placeholder="Password" name="password" required
                            value="<?= $password ?>">
                    </div>
                </div>
                <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                <?php echo form_close() ?>
            </div>
        </div>

    </div>
</div>
</div>




 
