<h2>Register New Customer</h2>
Insert details for new customer here </br>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/customers" method="post">
    <?= csrf_field() ?>

    <label for="customername">Customer Name</label>
    <input type="input" name="customername" value="<?= set_value('customername') ?>">
    <br>

	<label for="customeraddress">Customer Address</label>
    <textarea name="customeraddress" cols="45" rows="4"><?= set_value('customeraddress') ?></textarea>
    <br>

    <label for="customerphone">Customer Phone No.</label>
    <textarea name="customerphone" cols="20" rows="1"><?= set_value('customerphone') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Add new customer">
</form>