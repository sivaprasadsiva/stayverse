<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Offers
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
                                Offer Name
                            </th>
                            <th>
                                Percentage
                            </th>
                            <th>
                                Terms & Condition
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($offers as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url()?>assets/images/offers/<?= $row['image']?>" height="150px" width="150px">
                                </td>
                                <td>
                                    <?= $row['offer_name']; ?>
                                </td>
                                <td>
                                    <?= $row['percentage'].'%'; ?>
                                </td>
                                <td class="text-wrap">
                                    <?= $row['terms&cond']; ?>
                                </td>
                               
                                <td>
                                    <a href="<?= base_url().'dashboard_admin/update_offers/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    <a data-id="<?=  $row['id']?>" class="btn btn-danger delete_offers"><i class="fa fa-trash"></i></a>
                                    
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
                        <h1> ADD OFFERS & DEALS</h1>
                    </div>
                    <div class="modal-body">        
                            <?php echo form_open_multipart(base_url().'dashboard_admin/offers')?>
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            <input type="text" class="form-control mt-2" placeholder="Percentage" name="percentage" required >
                            <textarea class="form-control mt-2" placeholder="Terms & Conditions" name="terms" required></textarea> 
                            <input type="file" class="form-control mt-2" name="image" required>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                           <?php echo form_close()?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
