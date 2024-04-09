<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2><?= $title?></h2>
    
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
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody id="data">
                            <?php if(!empty($contact)){$n = 1;foreach($contact as $c){?>
                                 <tr>
                                    <td><?= $n?></td>
                                    <td><?= $c['name'];?></td>
                                    <td><?= $c['email']?></td>
                                    <td><?= $c['phone']?></td>
                                    <td><?= $c['subject']?></td>
                                    <td class="text-wrap"><?= $c['message']?></td>
                                    <td><?= date('d/m/Y',strtotime($c['created_at']))?></td>
                                    <td>
                                    <a data-id="<?=  $c['id']?>" class="btn btn-danger delete_contact"><i class="fa fa-trash"></i></a>
                                    
                                </td>
                                </tr>
                            <?php $n+=1;}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        
    </div>
</div>
</div>