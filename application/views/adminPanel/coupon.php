<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>COUPON</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD COUPON</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/coupon')?>

                            <div class="form-control">
                                <input type="text" class="form-control mt-2" placeholder="Coupon Name" name="name" required>
                                <input type="text" class="form-control mt-2" placeholder="Coupon code" name="code" required>
                                <input type="text" class="form-control mt-2" placeholder="percentage" name="percentage" required>
                                <input type="submit" name="submit" class="form-control btn btn-primary mt-2" value="Submit">
                            </div>
                            <?php  echo form_close() ?>
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
                                Coupon Name
                            </th>
                            <th>
                                Coupon Code
                            </th>
                            <th>
                                Percentage
                            </th>
                            
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($coupon as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['name']?>
                                </td>
                                <td>
                                    <?= $row['code']?>
                                </td>
                                <td>
                                    <?= $row['percentage']?> %
                                </td>

                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/coupon_update/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_coupon"><i class="fa fa-trash"></i></a>
                                    
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