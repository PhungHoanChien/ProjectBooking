<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // LIST
    public function index()
    {
        $orders = Order::with('user')
            ->orderByDesc('order_id')
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // FORM CREATE
    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required|exists:users,id',
                'order_date' => 'required|date',
                'total_price' => 'required|numeric|min:0',
                'status' => 'required|in:pending,done,cancel',
            ],
            [
                'user_id.required' => 'Vui lòng chọn khách hàng',
                'user_id.exists' => 'Khách hàng không tồn tại',

                'order_date.required' => 'Vui lòng chọn ngày đặt',
                'order_date.date' => 'Ngày đặt không hợp lệ',

                'total_price.required' => 'Vui lòng nhập tổng tiền',
                'total_price.numeric' => 'Tổng tiền phải là số',
                'total_price.min' => 'Tổng tiền không được âm',

                'status.required' => 'Vui lòng chọn trạng thái',
                'status.in' => 'Trạng thái không hợp lệ',
            ]
        );

        Order::create([
            'user_id' => $request->user_id,
            'order_date' => $request->order_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Thêm đơn hàng thành công');
    }

    // FORM EDIT
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();

        return view('admin.orders.edit', compact('order', 'users'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,shipping,done,cancel',
        ], [
            'user_id.required' => 'Vui lòng chọn khách hàng',
            'user_id.exists' => 'Khách hàng không tồn tại',
            'order_date.required' => 'Vui lòng chọn ngày đặt',
            'total_price.required' => 'Vui lòng nhập tổng tiền',
            'total_price.numeric' => 'Tổng tiền phải là số',
            'total_price.min' => 'Tổng tiền phải >= 0',
            'status.required' => 'Vui lòng chọn trạng thái',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'user_id' => $request->user_id,
            'order_date' => $request->order_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Cập nhật đơn hàng thành công');
    }

    // DELETE
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Xóa đơn hàng thành công');
    }
}
