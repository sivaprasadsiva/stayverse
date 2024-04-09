<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>LOCATION</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD LOCATION</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/location')?>
                            <?php if (!empty($state)):?>
                            <select class="form-select state mt-2" name="state">
                                <option>---select category---</option>
                                <?php 
                                    foreach ($state as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['state'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                             <select class="form-select district mt-2" name="district">
                                <option>---select district---</option>
                            </select>
                                <input type="text" name="location" class="form-control mt-2" placeholder="Location" required>
                                <input type="submit" name="submit" class="form-control btn btn-primary mt-2" value="Submit">
                            <?php endif;echo form_close() ?>
                        </div>

                    </div>
                </div>
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
                                State
                            </th>
                            <th>
                                District
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
                            foreach ($location as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['state']; ?>
                                </td>
                                 <td>
                                    <?= $row['district']; ?>
                                </td>
                                 <td>
                                    <?= $row['location']; ?>
                                </td>
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/update_location/'.$row['lid']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['lid']?>" class="btn btn-danger delete_location"><i class="fa fa-trash"></i></a>
                                    
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