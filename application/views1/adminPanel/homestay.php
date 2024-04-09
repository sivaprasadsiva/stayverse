<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <?php echo $title ?>
                </h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product">ADD</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="example4">
                        <thead>
                            <th>
                                No
                            </th>
                            <th>
                                Photo
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Email
                            </th>
                            
                            <th>
                                Rooms
                            </th>
                            
                            <th>
                                Contact Person
                            </th>
                             <th>
                                Contact Name
                            </th>
                             <th>
                                Contact Number
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Room Type
                            </th>
                            <th>
                               Location
                            </th>
                            
                            
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($homestay as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/<?= $row['photo']?>" height="150px" width="150px">
                                </td>
                                <td>
                                    <a href="<?= base_url().'dashboard_admin/view_homestay/'.$row['hid']?>"><?= $row['name']; ?></a>
                                </td>
                                <td>
                                    <?= $row['phone']; ?>
                                </td>

                                <td>
                                    <?= $row['email']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['rooms']; ?>
                                </td>
                                <td>
                                
                                    <?= $row['contact_person']; ?>
                                </td>
                                 <td>
                                
                                    <?= $row['contactname']; ?>
                                </td>
                                 <td>
                                
                                    <?= $row['contactnumber']; ?>
                                </td>
                                <td>
                                    <?= $row['password']; ?>
                                </td>
                                <td>
                                    <?php  foreach($categorys as $cat){
                                        if($cat['homestay_id'] == $row['hid']){
                                            echo $cat['category'].',<br>';
                                        }
                                    }?>
                                </td>
                                <td>
                                    <?php  foreach($roomtypes as $rt){
                                        if($rt['homestay_id'] == $row['hid']){
                                            echo $rt['roomtype'].',<br>';
                                        }
                                    }?>
                                </td>
                                <td>
                                    <?= $row['location']; ?>
                                </td>
                                
                                
                                    
                                
                                <td>
                                    <a href="<?= base_url().'dashboard_admin/rooms/'.$row['hid']?>" class="btn btn-danger ">Rooms</a>
                                    <a href="<?= base_url().'dashboard_admin/gallery/'.$row['hid']?>" class="btn btn-danger ">Gallery</a>
                                    <a href="<?= base_url().'dashboard_admin/update_homestay/'.$row['hid']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['hid']?>" class="btn btn-danger delete_homestay"><i class="fa fa-trash"></i></a>
                                    
                                </td>

                            </tr>
                            <?php $n += 1; endforeach; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>


<div class="modal fade" id="product" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="form-control">
                    <div class="modal-header">
                        <h1> ADD HOMESTAY</h1>
                    </div>
                    <div class="modal-body">        
                            <?php echo form_open_multipart(base_url().'dashboard_admin/homestay')?>

                            <?php if (!empty($state)):?>
                            <select class="form-select state mt-2" name="state" required>
                                <option>---select state---</option>
                                <?php 
                                    foreach ($state as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['state'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                             <select class="form-select district mt-2" name="district" required>
                                <option>---select district---</option>
                            </select>
                            <select class="form-select location mt-2" name="location" required>
                                <option>---select location---</option>
                            </select>
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" required>
                            <input type="email" class="form-control mt-2" placeholder="Email" name="email" required>
                            <textarea name="address" rows="5" class="form-control mt-2" placeholder="Address" required></textarea>
                            <input type="text" class="form-control mt-2" placeholder="Rooms" name="rooms" required>
                            <textarea name="description" rows="5" class="form-control mt-2" placeholder="Description" required></textarea>
                            <input type="file" class="form-control mt-2" name="image" required>
                            <input type="text" class="form-control mt-2" placeholder="Contact Name" name="contactname" required>
                            <input type="text" class="form-control mt-2" placeholder="Contact Number" name="contactnumber" required>
                            <input type="text" class="form-control mt-2" placeholder="Contact Person" name="contact_person" required>
                            <select class="roomtype " name="roomtype[]" required multiple>
                                <?php if(!empty($roomtype)){foreach($roomtype as $rt){?>
                                    <option value="<?= $rt['id']?>"><?= $rt['roomtype']?></option>
                                <?php }}?>
                            </select>
                            <br>
                            <select class="category" name="category[]" required multiple>
                                <?php if(!empty($category)){foreach($category as $cat){?>
                                    <option value="<?= $cat['id']?>"><?= $cat['category']?></option>
                                <?php }}?>
                            </select>
                            <br>
                            <select class="services" name="services[]" required multiple>
                                <?php if(!empty($services)){foreach($services as $service){?>
                                    <option value="<?= $service['id']?>"><?= $service['guestlove']?></option>
                                <?php }}?>
                            </select>
                            <br>
                            <select class="rules" name="rules[]" required multiple>
                                <?php if(!empty($rules)){foreach($rules as $rule){?>
                                    <option value="<?= $rule['id']?>"><?= $rule['homerules']?></option>
                                <?php }}?>
                            </select>
                            <br>
                            <input type="password" class="form-control mt-2" placeholder="Password" name="password" required>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                        <?php else:?>
                            <p>Update state</p>
                           <?php endif;echo form_close()?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
