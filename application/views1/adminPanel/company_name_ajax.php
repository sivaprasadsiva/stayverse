 <option selected disabled hidden>--- Select Company Name ---</option>
 <?php if(!empty($company_name)):foreach($company_name as $company):?>
    <option value="<?= $company['id']?>"><?= $company['company_name']?></option>
<?php endforeach;endif;?>