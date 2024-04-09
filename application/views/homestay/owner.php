<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="table-responsive">
                    <table class="table table-striped" id="example4">
                        <tr>
                            <td colspan="2" align="center">
                                <h3>Owner Details</h3>
                            </td>
                        <tr>
                            <th>
                                Name
                            </th>
                            <td>
                                    <?= $name; ?>
                                </td>
                        </tr>
                        <tr>
                            <th>
                                Phone
                            </th>
                            <td>
                                    <?= $phone; ?>
                                </td>
                            </tr>
                        <tr>
                             <th>
                                Age
                            </th>
                            <td>
                                    <?= $age; ?>
                                </td>
                            </tr>
                        <tr>
                            
                            <th>
                                Voter ID
                            </th>
                            <td>
                                    <a href="<?= base_url('assets/images/owner/'.$voter)?>"><img src="<?= base_url('assets/images/owner/'.$voter)?>" width="130px" height="100px"></a>
                                </td>
                            </tr>
                        <tr>
                            
                            <th>
                                Aadhar Card
                            </th>
                            <td>
                                
                                    <a href="<?= base_url('assets/images/owner/'.$aadhar)?>"><img src="<?= base_url('assets/images/owner/'.$aadhar)?>" width="130px" height="100px"></a>
                                </td>
                            </tr>
                        <tr>
                             <th>
                                Homestay Lisence
                            </th>
                            <td>
                                
                                    <a href="<?= base_url('assets/images/owner/'.$license)?>"><img src="<?= base_url('assets/images/owner/'.$license)?>" width="130px" height="100px"></a>
                                </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


