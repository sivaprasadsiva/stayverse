<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Events & Festival
                </h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product">ADD</button>
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
                                Name
                            </th>
                            <th>
                                Details
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($events as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/<?= $row['photo']?>" height="150px" width="150px">
                                </td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                <td class="text-wrap">
                                    <?= $row['details']; ?>
                                </td>

                                <td>
                                    <?= date('d-m-Y',strtotime($row['date'])); ?>
                                </td>
                               
                                <td>
                                    <a href="<?= base_url().'dashboard_admin/update_events/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_events"><i class="fa fa-trash"></i></a>
                                    
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


<div class="modal fade" id="product" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="form-control">
                    <div class="modal-header">
                        <h1> ADD EVENTS & FESTIVAL</h1>
                    </div>
                    <div class="modal-body">        
                            <?php echo form_open_multipart(base_url().'dashboard_admin/events')?>
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                            <textarea name="details" rows="5" class="form-control mt-2" placeholder="Details" required></textarea>
                            <input type="date" class="form-control mt-2"  name="date" required>
                            <input type="file" class="form-control mt-2" name="image" required>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                           <?php echo form_close()?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
