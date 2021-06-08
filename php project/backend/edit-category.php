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

    <?php
    //Check whether the url data has or not
    if (isset($_GET['id'])) {
        // Get url data
        $id = $_GET['id'];
        // Find specfici category
        $data_json = file_get_contents('http://localhost:8000/api/categories/single/' . $id);
        // json data convert to array
        $data = json_decode($data_json);
        // echo "<pre>";
        // print_r($data);
    }

    ?>

    <div class="wrap mb-5">
        <a href="view-category.php" class='btn btn-primary mb-2'>View Category</a>
        <div class="card shadow">
            <div class="card-body">
                <h2>Edit Category</h2>
                <form action="http://localhost:8000/api/categories/edit/<?php echo $data->data->id ?>" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" name="name" type="text" value="<?php echo $data->data->name ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update product">
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