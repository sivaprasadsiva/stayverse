<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>GUEST LOVE</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD GEUST LOVE</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/guestlove')?>

                            <div class="form-control">
                                <input type="text" name="guestlove" class="form-control" placeholder="Guest Love" required>
                                <input type="submit" name="submit" class="form-control btn btn-primary mt-2" value="Submit">
                            </div>
                            <?php echo form_close() ?>
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
                                Guest Love
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($guestlove as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['guestlove']; ?>
                                </td>
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/update_guestlove/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_guestlove"><i class="fa fa-trash"></i></a>
                                    
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