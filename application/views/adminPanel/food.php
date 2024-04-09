<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>FOOD</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD FOOD</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/food')?>

                            <div class="form-control">
                            <?php if (!empty($category)):?>
                            <select class="form-select category" name="category">
                                <option>--- Select Category ---</option>
                                <?php 
                                    foreach ($category as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['category_name'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                                <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                                <input type="text" class="form-control mt-2" placeholder="Price" name="price" required>
                                <input type="file" class="form-control mt-2" name="image" required>
                                <input type="submit" name="submit" class="form-control btn btn-primary mt-2" value="Submit">
                            </div>
                            <?php endif; echo form_close() ?>
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
                                Category
                            </th>
                            <th>
                                Food Name
                            </th>
                            <th>
                                Price
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
                                    <img src="<?php echo base_url(); ?>assets/images/<?= $row['image']; ?>" width="150px" height="150px">
                                </td>
                                <td>
                                    <?= $row['category_name']?>
                                </td>
                                <td>
                                    <?= $row['name']?>
                                </td>
                                <td>
                                    <?= $row['price']?>
                                </td>

                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/food_update/'.$row['fid']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['fid']?>" class="btn btn-danger delete_food"><i class="fa fa-trash"></i></a>
                                    
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