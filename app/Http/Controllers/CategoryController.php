<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // ✅ Đúng

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // DANH SÁCH SẢN PHẨM
    public function getProlist()
    {
        $products = Product::all();
        return view('admin.products.pro_list', compact('products'));
    }

    public function getProadd()
    {
        return view('admin.products.pro_add');
    }

    // DANH SÁCH LOẠI SẢN PHẨM
    public function getCateList()
    {
        $categories = Category::all();
        return view('admin.category.cate_list', compact('categories'));
    }

    public function getCateAdd()
    {
        return view('admin.category.cate_add');
    }

    public function postCateAdd(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:type_products,name',
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Vui lòng nhập tên loại sản phẩm.',
                'name.unique' => 'Tên loại sản phẩm đã tồn tại.',
                'image.image' => 'File không phải là hình ảnh.',
                'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
                'image.max' => 'Kích thước hình ảnh không được quá 2MB.',
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('source/image/product');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);
            $category->image = $imageName;
        }

        $category->save(); // Quan trọng!

        Session::flash('success', 'Thêm loại sản phẩm thành công!');
        return redirect()->route('admin.cate.list');
    }
    

    // SỬA LOẠI SẢN PHẨM
    public function getCateEdit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            Session::flash('error', 'Không tìm thấy loại sản phẩm!');
            return redirect()->route('admin.cate.list');
        }

        return view('admin.category.cate_edit', compact('category'));
    }

    public function postCateEdit(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:type_products,name,' . $id,
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Vui lòng nhập tên loại sản phẩm.',
                'name.unique' => 'Tên loại sản phẩm đã tồn tại.',
                'image.image' => 'File không phải là hình ảnh.',
                'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
                'image.max' => 'Kích thước hình ảnh không được quá 2MB.',
            ]
        );

        $category = Category::find($id);

        if (!$category) {
            Session::flash('error', 'Không tìm thấy loại sản phẩm!');
            return redirect()->route('admin.cate.list');
        }

        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            if ($category->image) {
                $oldImagePath = public_path('source/image/product/' . $category->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('source/image/product'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        Session::flash('success', 'Cập nhật loại sản phẩm thành công!');
        return redirect()->route('admin.cate.list');
    }

    // XÓA LOẠI SẢN PHẨM
    public function getCateDelete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            Session::flash('error', 'Không tìm thấy loại sản phẩm!');
        } else {
            if ($category->image) {
                $imagePath = public_path('source/image/product/' . $category->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $category->delete();
            Session::flash('success', 'Xóa loại sản phẩm thành công!');
        }

        return redirect()->route('admin.cate.list');
    }


    // DANH MỤC SẢN PHẨM
    // CategoryController.php


// CategoryController.php
public function showCategory($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('id_type', $id)->get(); // id_type là foreign key đến loại sản phẩm

    return view('product_type', compact('category', 'products'));

}


}
