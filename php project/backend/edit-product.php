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
        // Find specfici product
        $data_json = file_get_contents('http://localhost:8000/api/products/single/' . $id);
        // json data convert to array
        $data = json_decode($data_json);
        // echo "<pre>";
        // print_r($data);
    }

    ?>

    <div class="wrap mb-5">
        <a href="view-product.php" class='btn btn-primary mb-2'>View Products</a>
        <div class="card shadow">
            <div class="card-body">
                <h2>Edit Product</h2>
                <form action="http://localhost:8000/api/products/edit/<?php echo $data->data->id ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">---Select Category---</option>
                            <?php
                            $categories_json = file_get_contents('http://localhost:8000/api/categories/view');
                            $categories_arr = json_decode($categories_json);
                            foreach ($categories_arr->all_data as $category) {
                            ?>
                                <option value="<?php echo $category->id ?>" <?php if ($category->id == $data->data->category_id) echo 'selected'  ?>><?php echo $category->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" name="name" type="text" value="<?php echo $data->data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input class="form-control" name="price" type="number" value="<?php echo $data->data->price ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea class="form-control" name="short_description"><?php echo $data->data->short_description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Long Description</label>
                        <textarea class="form-control" name="long_description"><?php echo $data->data->long_description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <img style="width: 200px; height: auto;" src="http://localhost:8000/uploads/products/<?php echo $data->data->image ?>">
                        <input class="form-control" type="file" name="image">
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