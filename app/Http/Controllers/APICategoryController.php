<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class APICategoryController extends Controller
{
    /**
     * View all category
     */
    public function allCategory()
    {
        $all_data = Category::latest()->get();

        if ($all_data == null || $all_data == "") {
            $status = false;
            $msg    = 'Not found any category !';
        } else {
            $status = true;
            $msg    = 'Get all category data successfully ):';
        }

        $api_data = [
            'status'    => $status,
            'msg'       => $msg,
            'all_data'  => $all_data
        ];

        return response()->json($api_data, 200);
    }


    /**
     * Add category
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
        ]);

        $category = Category::create([
            'name'                => $request->name,
            'slug'                => str_replace(' ', '-', $request->name)
        ]);

        if ($category == true) {
            $status = true;
            $msg    = 'Category added successfully ):';
        } else {
            $status = false;
            $msg    = 'Category did not added !';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Delete Category
     */
    public function deleteCategory($id)
    {
        $data = Category::find($id);
        $data->delete();

        if ($data == true) {
            $status = true;
            $msg    = 'Category deleted successfully ):';
        } else {
            $status = false;
            $msg    = 'Category did not deleted !';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Single category show by category id
     */
    public function singleCategory($id)
    {
        $data = Category::find($id);

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any category !';
        } else {
            $status = true;
            $msg    = 'Get category data successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
            'data'   => $data
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Single category show by category slug
     */
    public function singleSlugCategory($slug)
    {
        $data = Category::where('slug', $slug)->first();

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any category !';
        } else {
            $status = true;
            $msg    = 'Get category data successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
            'data'   => $data
        ];

        return response()->json($api_data, 200);
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, $id)
    {
        // Find category data
        $data = Category::find($id);
        // Check whether the category has or not
        if ($data != NULL) {

            $data->name              = $request->name;
            $data->slug              = str_replace(' ', '-', $request->name);
            $data->update();
        }

        if ($data == null || $data == "") {
            $status = false;
            $msg    = 'Not found any category !';
        } else {
            $status = true;
            $msg    = 'Category updated successfully ):';
        }

        $api_data = [
            'status' => $status,
            'msg'    => $msg,
        ];

        return response()->json($api_data, 200);
    }
}
