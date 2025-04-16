<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    // Hiển thị danh sách tất cả các slide
    public function index()
    {
        // Lấy tất cả các slide từ cơ sở dữ liệu
        $slides = Slide::all();
    
        // Trả về view và truyền dữ liệu slides
        return view('admin.slides.index', compact('slides'));
    }
    
    // Hiển thị form thêm slide mới
    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'link' => 'required|url',
        'image' => 'required|image',
    ]);

    $image = $request->file('image');
    
    // Lấy tên gốc của file
    $imageName = $image->getClientOriginalName();
    
    // Đảm bảo tên file không trùng
    $destinationPath = public_path('images');
    $i = 1;
    while (file_exists($destinationPath . '/' . $imageName)) {
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . $i . '.' . $image->getClientOriginalExtension();
        $i++;
    }

    // Di chuyển file vào thư mục lưu trữ (public/images)
    $image->move($destinationPath, $imageName);

    // Tạo slide mới và lưu vào cơ sở dữ liệu
    Slide::create([
        'link' => $request->link,
        'image' => $imageName,  // Lưu tên file
    ]);

    return redirect()->route('admin.slides.index')->with('success', 'Thêm slide thành công!');
}

    
    



    // Hiển thị form chỉnh sửa slide
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slides.edit', compact('slide'));
    }

    // Cập nhật slide
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'link' => 'required|string',
        ]);

        // Nếu có file mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($slide->image && Storage::disk('public')->exists($slide->image)) {
                Storage::disk('public')->delete($slide->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('slides', 'public');
            $slide->image = $imagePath;
        }

        $slide->link = $request->link;
        $slide->save();

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully!');
    }

    // Xóa slide
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        // Xóa ảnh trong storage nếu tồn tại
        if ($slide->image && Storage::disk('public')->exists($slide->image)) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()->route('admin.slides.index')->with('success', 'Slide deleted successfully!');
    }
}
