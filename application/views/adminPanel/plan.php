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
                                Icon
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Services
                            </th>
                            
                            
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($plan as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/plan/<?= $row['icon']?>" height="150px" width="150px">
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/plan/<?= $row['plan_image']?>" height="150px" width="150px">
                                </td>

                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['price']; ?>
                                </td>
                                 
                                <td>
                                    <?php  foreach($plan_guestlove as $plan){
                                        if($plan['plan_id'] == $row['id']){
                                            echo $plan['guestlove'].',<br>';
                                        }
                                    }?>
                                </td>
                                
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/plan_update/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_plan"><i class="fa fa-trash"></i></a>
                                    
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
                        <h1> ADD PLAN</h1>
                    </div>
                    <div class="modal-body">        
                            <?php echo form_open_multipart(base_url().'dashboard_admin/plan')?>

                            
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            <input type="text" class="form-control mt-2" placeholder="Price" name="price" required>
                            <input type="file" class="form-control mt-2" name="icon" required title="upload icon">
                            <input type="file" class="form-control mt-2" name="image" required title="upload image">
                            <select class="services" name="services[]" required multiple>
                                <?php if(!empty($services)){foreach($services as $service){?>
                                    <option value="<?= $service['id']?>"><?= $service['guestlove']?></option>
                                <?php }}?>
                            </select>
                            
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                           <?php echo form_close()?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
