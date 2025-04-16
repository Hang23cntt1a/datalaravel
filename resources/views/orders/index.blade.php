@extends('admin.master')
@section('title', 'orders')


@section('content')
<div id="page-wrapper">
<div class="card">
    <h1>Orders</h1>
    <div class="container-fluid pt-5">
        <div class="col card">
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Ship</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Note</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
    <div class="input-group input-group-static mb-4">
        <select name="status" class="form-control select-status"
            data-action="{{ route('admin.orders.update_status', ['id' => $item->id]) }}">

            {{-- Trạng thái hiện tại (disabled) --}}
            <option selected disabled>{{ ucfirst($item->status) }}</option>

            {{-- Trạng thái được phép chuyển tiếp --}}
            @isset($item->statusOptions)
                @foreach ($item->statusOptions as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            @endisset
        </select>
    </div>
</td>

                                
                                <td>{{ number_format($item->total, 0, ',', '.') }} VND</td>
                                <td>{{ number_format($item->ship, 0, ',', '.') }} VND</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->payment }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.select-status').forEach(select => {
                select.addEventListener('change', function () {
                    const action = this.dataset.action;
                    const status = this.value;
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ status })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message || 'Cập nhật trạng thái thành công!');
                    })
                    .catch(() => {
                        alert('Có lỗi xảy ra khi cập nhật trạng thái!');
                    });
                });
            });
        });
    </script>
@endsection
