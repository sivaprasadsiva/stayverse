<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>GALLERY</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#gallery">ADD</button>
            </div>
            <div class="modal fade" id="gallery" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Add gallery</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/gallery/'.$id)?>

                            <div class="form-control">
                                <input type="file" name="image[]" class="form-control" accept=".jpeg,.jpg,.png" multiple>
                            </div>

                            <div class="form-control">
                                <input type="submit" name="submit" class="form-control btn btn-primary" value="Submit">
                            </div>
                            <?php echo form_close() ?> 
                        </div>

                    </div>
                </div>
            </div>
    <div class="row">
        <?php foreach ($gallery as $p) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <table >
                            <tr>
                                <td >
                                    <div style="min-height:230px;">
                                        <img src="<?php echo base_url(); ?>assets/images/<?= $p['image_gallery']; ?>" style='height: 100%; width: 100%; object-fit: fill'>
                                    </div>
                                    
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">
                                    <a data-id="<?=  $p['id']?>" class="btn btn-danger delete_gallery"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>