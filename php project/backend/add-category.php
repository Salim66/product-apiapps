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
		<a href="view-category.php" class='btn btn-primary mb-2'>View Category</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add Category</h2>
				<form action="http://localhost:8000/api/categories/add" method="POST">
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" name="name" type="text">
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