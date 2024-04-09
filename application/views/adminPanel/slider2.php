<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1><?= $title?></h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#gallery">ADD</button>
            </div>
            <div class="modal fade" id="gallery" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Add slider 1</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/slider2')?>

                            <div class="form-control">
                                <input type="file" name="image" class="form-control" accept=".jpeg,.jpg,.png">
                            </div>

                            <div class="form-control">
                                <input type="submit" name="submit" class="form-control btn btn-primary" value="Submit">
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
                                Image
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                        <?php $n=1; foreach($slide as $s){?>
                             <tr>
                             <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/<?= $s['image']?>" height="150px" width="150px">
                                </td>
                                <td>
                                    <a data-id="<?=  $s['id']?>" class="btn btn-danger delete_slide1"><i class="fa fa-trash"></i></a>
                                    
                                </td>
                            </tr>
                        <?php $n+=1;}?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
</div>