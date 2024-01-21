<h2>Register New transaction</h2>
Insert details for new transaction here </br>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/transactions" method="post">
    <?= csrf_field() ?>
	
	<label for="selectcustomerid">Customer ID</label>
	<select name="selectedcustomerid">
		<?php foreach($allcustomerids as $customerid): ?>
			<option value="<?php print $fruit['fruitid'] ?>"><?php print $fruit['fruitname']?></option>
		<?php endforeach; ?>
	</select>
    <br>
	
	<label for="transactiontotal">Customer Name</label>
    <input type="input" name="transactionname" value="<?= set_value('transactionname') ?>">
    <br>
	
	<label for="transactiontotal">Tenant ID</label>
    <input type="input" name="transactionname" value="<?= set_value('transactionname') ?>">
    <br>
	
	<label for="transactiontotal">Tenant Name</label>
    <input type="input" name="transactionname" value="<?= set_value('transactionname') ?>">
    <br>
	
    <label for="transactiontotal">transaction Total Price</label>
    <input type="input" name="transactionname" value="<?= set_value('transactionname') ?>">
    <br>

	<label for="transactiontotal">Input Coupon Codes here (one by one)</label>
    <input type="input" name="transactionname" value="<?= set_value('transactionname') ?>">
    <br>

    <input type="submit" name="submit" value="Add new transaction">
</form>