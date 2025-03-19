@extends('layout.master')

@section('css')
    <style>
        body {
            font-family: Time new roman;
            background: linear-gradient(45deg,#ff9a9e , #fad0c4 , #66a6ff) no-repeat;
            margin: 0;
            padding: 0;
            height: 900px;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg,#30cfd0 , #330867) no-repeat;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(45deg,#ff8177 , #ff867a , #ff8c7f , #f99185 , #cf556c , #b12a5b) no-repeat;       
         }

        .form-group {
            margin-bottom: 15px;
            width: 710px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2>Thêm xe mới</h2>
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Hãng xe:</label>
                <select name="mf_id">
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả xe</label>
                <input type="text" name="description" required>
            </div>

            <div class="form-group">
                <label>Model:</label>
                <input type="text" name="model" required>
            </div>

            <div class="form-group">
                <label>Ngày sản xuất:</label>
                <input type="date" name="produced_on" required>
            </div>
            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <button type="submit">Thêm xe</button>
        </form>
    </div>
@endsection

