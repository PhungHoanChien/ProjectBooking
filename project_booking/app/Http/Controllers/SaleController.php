<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::latest()->get();
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        return view('admin.sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Sell_number' => 'required|integer|min:0',
        ], [
            'Sell_number.required' => 'Vui lòng nhập số lượng bán',
            'Sell_number.integer' => 'Số lượng bán phải là số',
            'Sell_number.min' => 'Số lượng bán không được âm',
        ]);

        Sale::create($request->all());

        return redirect()
            ->route('admin.sales.index')
            ->with('success', 'Thêm sale thành công');
    }

    public function edit(Sale $sale)
    {
        return view('admin.sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'Sell_number' => 'required|integer|min:0',
        ]);

        $sale->update($request->all());

        return redirect()
            ->route('admin.sales.index')
            ->with('success', 'Cập nhật sale thành công');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()
            ->route('admin.sales.index')
            ->with('success', 'Xóa sale thành công');
    }
}
