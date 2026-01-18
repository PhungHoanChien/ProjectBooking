<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // HIỂN THỊ GIỎ HÀNG
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('shop.cart', compact('cart'));
    }

    // THÊM VÀO GIỎ
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->pro_image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    // CẬP NHẬT SỐ LƯỢNG
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Cập nhật giỏ hàng thành công');
    }

    // XÓA SẢN PHẨM
    public function destroy($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm');
    }
}
