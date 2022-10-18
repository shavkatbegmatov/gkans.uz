<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<a class="btn btn-primary me-md-2" type="button" href="/products/add/">Add New Product</a>

<table class="table table-striped table-hover align-middle">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Product Name</th>
			<th scope="col">Product Price</th>
			<th scope="col">Created at</th>
			<th scope="col">Updated at</th>
			<th scope="col">Deleted at</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $product) { ?>
			<tr>
				<td scope='row'><?= $product['id'] ?></td>
				<td><?= $product['product_name'] ?></td>
				<td><?= $product['product_price'] ?></td>
				<td><?= $product['created_at'] ?></td>
				<td><?= $product['updated_at'] ?></td>
				<td><?= $product['deleted_at'] ?></td>
				<td><a class="btn btn-primary me-md-2" type="button" href="/products/change/">Change</a><button class="btn btn-danger" type="button" href="#">Delete</button></td>
			</tr>
		<?php }	?>
	</tbody>
</table>

<?php
$table = new \CodeIgniter\View\Table();
// $db = 
//$query = $db->query('SELECT * FROM products');
echo $table->generate($products);
?>

<?= $this->endSection(); ?>