<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>



	<div class="wrap mb-5">
		<a href="view-product.php" class='btn btn-primary mb-2'>View Products</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add Product</h2>
				<form action="http://localhost:8000/api/products/add" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Category</label>
						<select name="category_id" id="category_id" class="form-control">
							<option value="0">---Select Category---</option>
							<?php
							$categories_json = file_get_contents('http://localhost:8000/api/categories/view');
							$categories_arr = json_decode($categories_json);
							foreach ($categories_arr->all_data as $category) {
							?>
								<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" name="name" type="text">
					</div>
					<div class="form-group">
						<label for="">Price</label>
						<input class="form-control" name="price" type="number">
					</div>
					<div class="form-group">
						<label for="">Short Description</label>
						<textarea class="form-control" name="short_description"></textarea>
					</div>
					<div class="form-group">
						<label for="">Long Description</label>
						<textarea class="form-control" name="long_description"></textarea>
					</div>
					<div class="form-group">
						<label for="">Image</label>
						<input class="form-control" type="file" name="image">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add new">
					</div>
				</form>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>