<h2>Register New Tenant</h2>
Insert details for new tenant here </br>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/tenants" method="post">
    <?= csrf_field() ?>

    <label for="tenantname">Tenant Name</label>
    <input type="input" name="tenantname" value="<?= set_value('tenantname') ?>">
    <br>

	<label for="tenantaddress">Tenant Address</label>
    <textarea name="tenantaddress" cols="45" rows="4"><?= set_value('tenantaddress') ?></textarea>
    <br>

    <label for="tenantphone">Tenant Phone No.</label>
    <textarea name="tenantphone" cols="20" rows="1"><?= set_value('tenantphone') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Add new tenant">
</form>