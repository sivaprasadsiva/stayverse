<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>VEHICLE</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#room">ADD</button>
            </div>
            <div class="modal fade" id="room" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>ADD VEHICLE</h2>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'dashboard_admin/vehicle')?>
                            <?php if (!empty($type)):?>
                            <select class="form-select type" name="type">
                                <option>--- Select Type ---</option>
                                <?php 
                                    foreach ($type as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['type'] ?></option>
                                    <?php endforeach; ?>
                            </select>

                             <select class="form-select company_name mt-2" name="model_id">
                                <option>--- Select Company Name ---</option>
                            </select>
                                <input type="text" name="vehicle_name" class="form-control mt-2" placeholder="Vehicle Name" required>
                                <input type="text" name="vehicle_number" class="form-control mt-2" placeholder="Vehicle Number" required>

                                <input type="text" name="rental_price" class="form-control mt-2" placeholder="Rental Price" required>
                                <label class="mt-4">Insurance Expiry Date</label>
                                <input type="date" name="insurance_exp_date" class="form-control"  required>
                                <label class="mt-4">RC BOOK</label>
                                <input type="file" name="rcbook" class="form-control" required>
                                <label class="mt-4">Insurance</label>
                                <input type="file" name="insurance" class="form-control" required>
                                <label class="mt-4">Vehicle Image</label>
                                <input type="file" name="image" class="form-control" required>
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
                                Company Name
                            </th>
                            <th>
                                Vehicle Name
                            </th>
                            <th>
                                Vehicle Number
                            </th>
                            <th>
                                Rental Price
                            </th>
                            <th>
                                Insurance Expiry Date
                            </th>
                            <th>
                                RC Book
                            </th>
                            <th>
                                Insurance
                            </th>
                            <th>
                                Vehicle Image
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($vehicle as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['company_name']; ?>
                                </td>
                                 <td>
                                    <?= $row['vehicle_name']; ?>
                                </td>
                                 <td>
                                    <?= $row['vehicle_number']; ?>
                                </td>
                                <td>
                                    <?= $row['rental_price']; ?>
                                </td>
                                 <td>
                                    <?= $row['insurance_exp_date']; ?>
                                </td>
                                 <th>
                               <img src="<?= base_url().'assets/images/'.$row['rcbook']?>" width="150px" height="150px">
                                </th> 
                                <th>
                               <img src="<?= base_url().'assets/images/'.$row['insurance']?>" width="150px" height="150px">
                                </th> 
                                <th>
                               <img src="<?= base_url().'assets/images/'.$row['vehicle_image']?>" width="150px" height="150px">
                                </th> 
                                <td>
                                    
                                    <a href="<?= base_url().'dashboard_admin/vehicle_update/'.$row['vid']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['vid']?>" class="btn btn-danger delete_vehicle"><i class="fa fa-trash"></i></a>
                                    
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