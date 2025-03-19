<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Mf;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('mfs')->get(); // Đổi 'mfs' thành 'mf'
        return view('car.carlist', compact('cars'));
    }
    


    public function create()
    {
        $manufacturers = Mf::all();
        return view('car.create', compact('manufacturers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'description' => 'required',
        'model' => 'required',
        'produced_on' => 'required|date',
        'mf_id' => 'required|exists:mfs,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate ảnh
    ]);

    $image = null;
    if($request->hasFile('image')){
        $upload = $request->file('image');
        $filename = $upload->getClientOriginalName();
        $upload->move(public_path('car/'), $filename);
    }
    $imagePath = $filename;
        Car::create([
            'description' => $request->description,
            'model' => $request->model,
            'produced_on' => $request->produced_on,
            'mf_id' => $request->mf_id,
            'image' => $imagePath ?? null,
        ]);
        return redirect()->route('car.index')->with('success', 'Xe đã được thêm thành công!');
    }


    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $manufacturers = Mf::all();
        return view('car.edit', compact('car', 'manufacturers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
            'mf_id' => 'required|exists:mfs,id',
            'image' => 'mimes:jpg,jpeg,png,gif|max:10000'
        ]);

        $car = Car::findOrFail($id);
        
        $car->description = $request->description;
        $car->model = $request->model;
        $car->produced_on = $request->produced_on;
        $car->mf_id = $request->mf_id;

        if($request->hasFile('image')){
            if($car->image && file_exists(public_path($car->image))){
                unlink(public_path($car->image));
            }
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('car/'), $filename);
            $car->image = $filename;
        }
        $car->save();

        return redirect()->route('car.index')->with('success', 'Cập nhật thành công!');

    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('car.index')->with('success', 'Xoá thành công');
    }
}