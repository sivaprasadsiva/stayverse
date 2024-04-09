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
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Email
                            </th>
                            
                            <th>
                                Place
                            </th>
                            
                            <th>
                                Designation
                            </th>
                             <th>
                                Password
                            </th>
                             <th>
                                Age
                            </th>
                            
                            
                            
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($staff as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                <td>
                                    <?= $row['phone']; ?>
                                </td>

                                <td>
                                    <?= $row['email']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['place']; ?>
                                </td>
                                <td>
                                
                                    <?= $row['designation']; ?>
                                </td>
                                 <td>
                                
                                    <?= $row['password']; ?>
                                </td>
                                <td>
                                
                                    <?= $row['age']; ?>
                                </td>
                                 
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/staff_update/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_staff"><i class="fa fa-trash"></i></a>
                                    
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
                        <h1> ADD STAFF</h1>
                    </div>
                    <div class="modal-body">        
                            <?php echo form_open_multipart(base_url().'dashboard_admin/staff')?>

                            
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" value="<?php if(!empty($this->session->flashdata('name_staff')))echo $this->session->flashdata('name_staff')?>" required>
                            <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" value="<?php if(!empty($this->session->flashdata('phone_staff')))echo $this->session->flashdata('phone_staff')?>" required>
                            <input type="email" class="form-control mt-2" placeholder="Email" name="email" value="<?php if(!empty($this->session->flashdata('email_staff')))echo $this->session->flashdata('email_staff')?>" required>
                            <input type="text" class="form-control mt-2" placeholder="Place" name="place" value="<?php if(!empty($this->session->flashdata('place_staff')))echo $this->session->flashdata('place_staff')?>" required>
                            <input type="text" class="form-control mt-2" placeholder="Designation" name="designation" value="<?php if(!empty($this->session->flashdata('designation_staff')))echo $this->session->flashdata('designation_staff')?>" required>
                            <input type="text" class="form-control mt-2" placeholder="Age" name="age" value="<?php if(!empty($this->session->flashdata('age_staff')))echo $this->session->flashdata('age_staff')?>" required>
                            <input type="password" class="form-control mt-2" placeholder="Password" name="password" value="<?php if(!empty($this->session->flashdata('password_staff')))echo $this->session->flashdata('password_staff')?>" required>
                            <?php if(!empty($this->session->flashdata('email')))echo $this->session->flashdata('email')?>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                        
                           <?php echo form_close()?>
                    </div>
                    </div>
                </div>
            </div>
        </div>