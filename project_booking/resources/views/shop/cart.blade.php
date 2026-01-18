@extends('layout')

@section('content')
    <div class="container">

        <h3 class="mb-4">Giỏ hàng</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @php $total = 0; @endphp

        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Xóa</th>
                </tr>
            </thead>

            <tbody>
                @forelse($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp

                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item['image']) }}" width="60" class="img-thumbnail">

                        </td>

                        <td>{{ $item['name'] }}</td>

                        <td>{{ number_format($item['price']) }} đ</td>

                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                    class="form-control d-inline w-50">

                                <button class="btn btn-sm btn-warning">OK</button>
                            </form>
                        </td>

                        <td>{{ number_format($item['price'] * $item['quantity']) }} đ</td>

                        <td>
                            <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">X</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Giỏ hàng trống</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h4 class="text-end">Tổng tiền: {{ number_format($total) }} đ</h4>

    </div>
@endsection