<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Library</li>
	</ol>
</nav>

<form class="row g-3" method="post" action="/products/add">
	<div class="col-md-6">
		<label for="productName" class="form-label">Product Name</label>
		<input name="product_name" type="text" class="form-control" id="productName">
	</div>
	<div class="col-md-6">
		<label for="productPrice" class="form-label">Product Price</label>
		<input name="product_price" type="number" class="form-control" id="productPrice">
	</div>
	<div class="col-12">
		<label for="inputAddress" class="form-label">Address</label>
		<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
	</div>
	<div class="col-12">
		<label for="inputAddress2" class="form-label">Address 2</label>
		<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
	</div>
	<div class="col-md-6">
		<label for="inputCity" class="form-label">City</label>
		<input type="text" class="form-control" id="inputCity">
	</div>
	<div class="col-md-4">
		<label for="inputState" class="form-label">State</label>
		<select id="inputState" class="form-select">
			<option selected>Choose...</option>
			<option>...</option>
		</select>
	</div>
	<div class="col-md-2">
		<label for="inputZip" class="form-label">Zip</label>
		<input type="text" class="form-control" id="inputZip">
	</div>
	<div class="col-12">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="gridCheck">
			<label class="form-check-label" for="gridCheck">
				Check me out
			</label>
		</div>
	</div>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">Sign in</button>
	</div>
</form>

<script>
	const toastTrigger = document.getElementById('liveToastBtn')
	const toastLiveExample = document.getElementById('liveToast')
	if (toastTrigger) {
		toastTrigger.addEventListener('click', () => {
			const toast = new bootstrap.Toast(toastLiveExample)

			toast.show()
		})
	}
</script>

<h1><?= $product_name ?></h1>

<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="toast-container position-fixed top-0 end-0 p-3">
	<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header text-bg-primary">
			<img src="..." class="rounded me-2" alt="...">
			<strong class="me-auto">Bootstrap</strong>
			<small>11 mins ago</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>




<?= $this->endSection(); ?>