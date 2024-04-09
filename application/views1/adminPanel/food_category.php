<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>FOOD CATEGORY</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD FOOD CATEGORY</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/food_category')?>

                            <div class="form-control">
                                <label class="mt-4">Starting Time</label>
                                <input type="time" class="form-control" placeholder="Starting Time" name="start" required>
                                <label class="mt-4">Ending Time</label>
                                <input type="time" class="form-control " placeholder="Ending Time" name="end" required>
                                <input type="text" class="form-control mt-2" placeholder="Category" name="category" required>
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
                                Time
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($food as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= date('h:ia',strtotime($row['starting_time'])).' to '.date('h:ia',strtotime($row['ending_time']));?>
                                </td>
                                <td>
                                    <?= $row['category_name']?>
                                </td>
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/food_category_update/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_food_category"><i class="fa fa-trash"></i></a>
                                    
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