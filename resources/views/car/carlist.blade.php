@extends('layout.master')

@section('css')
    <style>
        body {
            font-family: Time new roman;
            background: #eef1f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }


        .container {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }


        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }


        .btn-add {
            display: block;
            width: max-content;
            padding: 10px 15px;
            background: linear-gradient(45deg,#69EACB , #EACCF8 , #6654F1) no-repeat;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 auto 15px;
            text-align: center;
            transition: 0.3s;
        }



        .btn-add:hover {
            background: linear-gradient(45deg,#DFFFCD , #90F9C4 , #39F3BB) no-repeat;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background: linear-gradient(45deg,#2CD8D5 , #C5C1FF , #FFBAC3) no-repeat;
            color: white;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }


        tr:hover {
            background: #e9ecef;
        }
        

        .actions a, .actions button {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            border: none;
            cursor: pointer;

        }

        .btn-edit {
            background: linear-gradient(45deg,#d5dee7 , #ffafbd , #c9ffbf) no-repeat;
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(45deg,#20E2D7 , #F9FEA5) no-repeat;
        }

        .btn-delete {
            background: linear-gradient(45deg,#FFE29F , #FFA99F , #FF719A) no-repeat;
            color: white;
        }

        .btn-delete:hover {  
            background: linear-gradient(45deg,#20E2D7 , #F9FEA5) no-repeat;
        }

        form {
            display: inline;
        }
        /* Responsive */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .btn-add {
                width: 100%;
                text-align: center;
            }

            .actions {
                flex-direction: column;
            }
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <h1>Danh sách xe</h1>
        <a href="{{ route('cars.create') }}" class="btn-add">Thêm xe mới</a>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Mô tả</th>
                <th>Model</th>
                <th>Ngày sản xuất</th>
                <th>Nhà sản xuất</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
            @foreach ($cars->sortByDesc('id')->values() as $key => $car)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->description }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->produced_on }}</td>
                    <td>{{ $car->mfs->name ?? 'Không có dữ liệu' }}</td>

                    
                    <td>
                        <img src="{{ asset('car/' . $car->image) }}" alt="Car Image" width="100">
                    </td>



                    <td class="actions">
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn-edit">Sửa</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
