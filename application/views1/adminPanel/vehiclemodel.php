<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    VEHICLE MODEL
                </h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#category">ADD</button>
            </div>
        </div>



        <div class="modal fade" id="category" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="form-control">
                    <div class="modal-header">
                        <h1> ADD VEHICLE MODEL</h1>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart(base_url().'dashboard_admin/vehicle_model') ?>
                        
                           
                            <?php if (!empty($type)):?>
                            <select class="form-select" name="type">
                                <option>---select type---</option>
                                <?php 
                                    foreach ($type as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['type'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                            <input type="text" name="company_name" class="form-control mt-2" placeholder="Company Name">
                            <input type="submit" name="submit" class="form-control btn btn-primary mt-2" value="Submit">
                        
                        <?php endif; echo form_close() ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-striped" id="example4">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Company Name
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php
                    $n = 1;
                    foreach ($model as $row): ?>
                        <tr>
                            <td>
                                <?= $n ?>
                            </td>
                            <td>
                                <?= $row['type'] ?>
                            </td>
                            <td>
                                <?= $row['company_name'] ?>
                            </td>
                            <td>
                                <a href="<?= base_url().'dashboard_admin/vehicle_model_update/'.$row['mid']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger delete_vehicle_model" data-id="<?=  $row['mid'] ?>"><i
                                        class="fa fa-trash"></i></a>
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