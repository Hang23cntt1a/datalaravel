<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProList()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.pro_list', compact('products'));
    }

    public function getProAdd()
{
    $types = Category::all(); // ✅ Lấy danh sách loại sản phẩm
    return view('admin.products.pro_add', compact('types')); // ✅ Truyền sang view
}

    public function postProAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'unit_price' => 'required|numeric|min:0',
            'promotion_price' => 'nullable|numeric|min:0',
            'unit' => 'required|max:50',
            'id_type' => 'required|exists:type_products,id', // 🔧 validate loại sản phẩm
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('source/image/product/'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'promotion_price' => $request->promotion_price,
            'unit' => $request->unit,
            'id_type' => $request->id_type, // 🔧 Thêm loại sản phẩm vào bảng
            'image' => $imageName,
            'top' => 0,
            'new' => 1,
        ]);

        return redirect()->route('admin.pro.list')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function getProDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin.pro.list')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function getProEdit($id)
    {
        $product = Product::findOrFail($id);
        $types = Category::all(); // ✅ Thêm dòng này
        return view('admin.products.pro_edit', compact('product', 'types'));
    } 
    

    public function postProEdit(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'unit_price' => 'required|numeric|min:0',
        'promotion_price' => 'nullable|numeric|min:0',
        'unit' => 'required|max:50',
        'id_type' => 'required|exists:type_products,id', // 🔧 validate lại
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

    // Nếu có hình ảnh mới, xóa hình ảnh cũ
    if ($request->hasFile('image')) {
        // Xóa hình ảnh cũ nếu có
        if ($product->image && file_exists(public_path('source/image/product/' . $product->image))) {
            unlink(public_path('source/image/product/' . $product->image));
        }

        // Lưu hình ảnh mới
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('source/image/product/'), $imageName);
        $product->image = $imageName;
    }

    // Cập nhật thông tin sản phẩm
    $product->name = $request->name;
    $product->description = $request->description;
    $product->unit_price = $request->unit_price;
    $product->promotion_price = $request->promotion_price;
    $product->unit = $request->unit;
    $product->id_type = $request->id_type; // Cập nhật loại sản phẩm

    $product->save();

    return redirect()->route('admin.pro.list')->with('success', 'Cập nhật sản phẩm thành công!');
}




    
    public function search(Request $request)
    {
        $query = $request->input('s');
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(12);
        
        return view('admin.products.search', compact('products', 'query'));
    }

///////////////////////////////////////////////



}