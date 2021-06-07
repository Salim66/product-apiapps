<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class APIProductController extends Controller
{
    /**
     * All product view
     */
    public function allProduct()
    {
        $all_data = Product::latest()->get();

        if ($all_data == null || $all_data == "") {
            $status = false;
            $msg    = 'Not found any products !';
        } else {
            $status = true;
            $msg    = 'Get all product data successfully ):';
        }

        $api_data = [
            'status'    => $status,
            'msg'       => $msg,
            'all_data'  => $all_data
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Add product
     */
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
        ]);
    }
}
