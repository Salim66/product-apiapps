<?php
require_once('product.php')

?>

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



	<div class="wrap-table ">
		<a href="add-product.php" class='btn btn-primary mb-2'>Add new product</a>
		<a href="view-category.php" class='btn btn-info mb-2'>View Category</a>
		<div class=" card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Id</th>
							<th>Name</th>
							<th>Price</th>
							<th>Status</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$i = 1;
						foreach ($products_arr->all_data as $data) {

						?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $data->category_id ?></td>
								<td><?php echo $data->name ?></td>
								<td><?php echo $data->price ?></td>
								<td>
									<?php

									if ($data->status == 1) {
										echo "<span class='badge badge-success'>Active</span>";
									} else {
										echo "<span class='badge badge-danger'>Inactive</span>";
									}

									?>
								</td>
								<td><img src="http://localhost:8000/uploads/products/<?php echo $data->image; ?>" alt=""></td>
								<td>
									<!-- <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#show" href="view-product.php?id=<?php echo $data->id; ?>">View</a> -->
									<a class="btn btn-sm btn-warning" href="edit-product.php?id=<?php echo $data->id; ?>">Edit</a>
									<form style="display: inline-block;" action="http://localhost:8000/api/products/delete/<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-sm btn-danger">Delete</button>
									</form>
								</td>
							</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- 
	<?php
	// Get url data 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
	}
	// $data = file_get_contents();

	?>
	<div id="show" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<!-- <img class="shadow mb-3" style="width: 200px; height: 200px; border-radius: 50%; display: block; margin: 0 auto;" src="http://localhost:8000/uploads/products/<?php echo $data->image ?>" alt="">
					<table>
						<tr>
							<td>Product Name</td>
							<td><?php echo $data->name ?></td>
						</tr>
						<tr>
							<td>Product Price</td>
							<td><?php echo $data->price ?></td>
						</tr>
						<tr>
							<td>Short Description</td>
							<td><?php echo $data->short_description ?></td>
						</tr>
						<tr>
							<td>Long Description</td>
							<td><?php echo $data->long_description ?></td>
						</tr>
					</table> -->
	</div>
	</div>
	</div>
	</div> -->







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>