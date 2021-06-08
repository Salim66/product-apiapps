<?php


$products = file_get_contents('http://localhost:8000/api/products/view');

$products_arr = json_decode($products);
