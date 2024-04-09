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
                               Approval
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
                                    <?php if(!empty($owner)){
                                        foreach($owner as $own){
                                            if($own['homestay_id'] == $row['hid']){
                                                if($own['approval'] == 1){?>
                                                    <a class="btn " style="background-color: red;color:white;">Approved</a>
                                               <?php }else{?>
                                                    <a  class="btn approve_btn" style="background-color: red;color:white;" data-id="<?= $row['hid'];?>"><i class="fa fa-check"></i>  Approve</a> <br><br>
                                                    <a  class="btn btn-success dismiss_btn" data-id="<?= $row['hid'];?>"><i class="fa fa-close"></i> Dismiss</a>
                                               <?php }
                                            }
                                        }
                                    }?>
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


<div class="modal fade" id="product" aria-hidden="true" >
    <div class="modal-dialog modal-fullscreen" style="padding:50px 20px;bottom: 20px;">
        <div class="modal-content">
            <div class="form-control">
                <div class="modal-header">
                    <h3> ADD HOMESTAY</h3>
                    <button  class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart(base_url() . 'dashboard_admin/homestay') ?>
                    <div class="row">
                        <div class="col-md-6 ">
                            <?php if (!empty($state)): ?>
                                <select class="form-select state mt-2" name="state" required>
                                    <option>---select state---</option>
                                    <?php
                                    foreach ($state as $value): ?>
                                        <option value="<?= $value['id'] ?>">
                                            <?= $value['state'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <select class="form-select district mt-2" name="district" required>
                                    <option>---select district---</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <select class="form-select location mt-2" name="location" required>
                                    <option>---select location---</option>
                                </select>
                            </div>
                            <div class="col-md-6 ">

                                <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control mt-2" placeholder="Email" name="email" required>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 ">
                                <textarea name="description" rows="5" class="form-control mt-2" placeholder="Description"
                                    required></textarea>
                            </div>
                            <div class="col-md-6 ">
                                <textarea name="address" rows="5" class="form-control mt-2" placeholder="Address"
                                    required></textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <input type="file" class="form-control mt-2" name="image" title="Image" accept=".jpeg,.jpg,.png" required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="text" class="form-control mt-2" placeholder="Contact Name" name="contactname"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <input type="text" class="form-control mt-2" placeholder="Contact Number"
                                    name="contactnumber" required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="text" class="form-control mt-2" placeholder="Contact Person"
                                    name="contact_person" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <input type="text" class="form-control mt-2" placeholder="Rooms" name="rooms" required>
                            </div>
                            <div class="col-md-6 ">
                                <select class="roomtype " name="roomtype[]" required multiple>
                                    <?php if (!empty($roomtype)) {
                                        foreach ($roomtype as $rt) { ?>
                                            <option value="<?= $rt['id'] ?>">
                                                <?= $rt['roomtype'] ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="category" name="category[]" required multiple>
                                    <?php if (!empty($category)) {
                                        foreach ($category as $cat) { ?>
                                            <option value="<?= $cat['id'] ?>">
                                                <?= $cat['category'] ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="services" name="services[]" required multiple>
                                    <?php if (!empty($services)) {
                                        foreach ($services as $service) { ?>
                                            <option value="<?= $service['id'] ?>">
                                                <?= $service['guestlove'] ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <select class="rules" name="rules[]" required multiple>
                                    <?php if (!empty($rules)) {
                                        foreach ($rules as $rule) { ?>
                                            <option value="<?= $rule['id'] ?>">
                                                <?= $rule['homerules'] ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <input type="password" class="form-control mt-2" placeholder="Password" name="password"
                                    required>
                            </div>
                        </div>
                        <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                    <?php else: ?>
                        <p>Update state</p>
                    <?php endif;
                            echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>