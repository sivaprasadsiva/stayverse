<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    District
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
                        <h1> ADD DISTRICT</h1>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart(base_url().'dashboard_admin/district') ?>
                        
                           
                            <?php if (!empty($state)):?>
                            <select class="form-select" name="state">
                                <option>---select state---</option>
                                <?php 
                                    foreach ($state as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['state'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                            <input type="text" name="district" class="form-control mt-2" placeholder="District">
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
                            State
                        </th>
                        <th>
                            District
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php
                    $n = 1;
                    foreach ($district as $row): ?>
                        <tr>
                            <td>
                                <?= $n ?>
                            </td>
                            <td>
                                <?= $row['state'] ?>
                            </td>
                            <td>
                                <?= $row['district'] ?>
                            </td>
                            <td>
                                <a href="<?= base_url().'dashboard_admin/update_district/'.$row['did']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger delete_district" data-id="<?=  $row['did'] ?>"><i
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