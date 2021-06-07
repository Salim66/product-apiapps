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

        //upload product
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_image_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $unique_image_name);
        }

        $product = Product::create([
            'name'                => $request->name,
            'slug'                => str_replace(' ', '-', $request->name),
            'price'               => $request->price,
            'short_description'   => $request->short_description,
            'long_description'    => $request->long_description,
            'image'               => $unique_image_name,
        ]);

        if ($product == true) {
            $status = true;
            $msg    = 'Product added successfully ):';
        } else {
            $status = false;
            $msg    = 'Product did not added !';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Delete product
     */
    public function deleteProduct($id)
    {
        $data = Product::find($id);
        $data->delete();

        if ($data == true) {
            if (file_exists('uploads/products/' . $data->image) && !empty($data->image)) {
                unlink('uploads/products/' . $data->image);
            }

            $status = true;
            $msg    = 'Product deleted successfully ):';
        } else {
            $status = false;
            $msg    = 'Product did not deleted !';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Single product show by product id
     */
    public function singleProduct($id)
    {
        $data = Product::find($id);

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any product !';
        } else {
            $status = true;
            $msg    = 'Get product data successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
            'data'   => $data
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Single product show by product slug
     */
    public function singleSlugProduct($slug)
    {
        $data = Product::where('slug', $slug)->first();

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any product !';
        } else {
            $status = true;
            $msg    = 'Get product data successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
            'data'   => $data
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, $id)
    {
        // Find product data
        $data = Product::find($id);
        // Check whether the product has or not
        if ($data != NULL) {

            //upload product
            $unique_image_name = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $unique_image_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/'), $unique_image_name);
                if (file_exists('uploads/products/' . $data->image) && !empty($data->image)) {
                    unlink('uploads/products/' . $data->image);
                }
            } else {
                $unique_image_name = $data->image;
            }

            $data->name              = $request->name;
            $data->slug              = str_replace(' ', '-', $request->name);
            $data->price             = $request->price;
            $data->short_description = $request->short_description;
            $data->long_description  = $request->long_description;
            $data->image             = $unique_image_name;
            $data->update();
        }

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any product !';
        } else {
            $status = true;
            $msg    = 'Product updated successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Search Product
     */
    public function searchProduct(Request $request)
    {
        $search = $request->search;

        if ($search != NULL && $search != "") {
            $all_data = Product::where('name', 'LIKE', '%' . $search . '%')->get();

            $api_data = [
                'all_data' => $all_data
            ];

            return ;
        }
    }
}
