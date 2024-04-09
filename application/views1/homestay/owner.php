<div class="content-body">
    <div class="container-fluid">
        <?php if(!empty($owner)):?>
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <?php echo $title ?>
                </h1>
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
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                             <th>
                                Age
                            </th>
                            
                            <th>
                                Voter ID
                            </th>
                            
                            <th>
                                Aadhar Card
                            </th>
                             <th>
                                Homestay Lisence
                            </th>
                            
                            
                            
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php $n = 1;
                            foreach ($owner as $row): ?>
                                <tr>
                                <td>
                                    <?= $n; ?>
                                </td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                <td>
                                    <?= $row['phone']; ?>
                                </td>

                                <td>
                                    <?= $row['age']; ?>
                                </td>
                                
                                <td>
                                    <a href="<?= base_url('assets/images/owner/'.$row['voter_id'])?>"><img src="<?= base_url('assets/images/owner/'.$row['voter_id'])?>" width="130px" height="100px"></a>
                                </td>
                                <td>
                                
                                    <a href="<?= base_url('assets/images/owner/'.$row['aadharcard'])?>"><img src="<?= base_url('assets/images/owner/'.$row['aadharcard'])?>" width="130px" height="100px"></a>
                                </td>
                                 <td>
                                
                                    <a href="<?= base_url('assets/images/owner/'.$row['homestay_license'])?>"><img src="<?= base_url('assets/images/owner/'.$row['homestay_license'])?>" width="130px" height="100px"></a>
                                </td>
                               
                                 
                                <td>
                                    
                                    <a href="<?= base_url().'homestay/owner_update/'.$row['id']?>" class="btn btn-danger "><i class="fa fa-pencil"></i></a>
                                    
                                </td>

                            </tr>
                            <?php $n += 1; endforeach; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
       <?php else:?>
        <div class="row">
            <div class="col-md-10">
                <h1>
                     ADD <?php echo $title ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php echo form_open_multipart(base_url().'homestay/owner')?>

                            
                            <input type="text" class="form-control mt-2" placeholder="Name" name="name" required>
                            <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" required>
                            <input type="text" class="form-control mt-2" placeholder="Age" name="age" required>
                            <input type="file" class="form-control mt-2" title ="Upload Voter ID" name="voter_id" accept=".png,.jpeg,.jpg" required>
                            <input type="file" class="form-control mt-2" title ="Upload Aadhar Card" name="aadhar" accept=".png,.jpeg,.jpg" required>
                            <input type="file" class="form-control mt-2" title ="Upload Homestay License" name="license" accept=".png,.jpeg,.jpg" required>
                            <input type="submit" class="form-control btn btn-primary mt-2" value="Submit" name="submit">
                        
                           <?php echo form_close()?>
            </div>
        </div>
    <?php endif;?>
    </div>
</div>


