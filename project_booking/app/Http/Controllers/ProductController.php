<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->leftJoin('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->select(
                'products.*',
                'manufactures.manu_name as manu_name',
                'protypes.type_name as type_name'
            )
            ->orderBy('products.id', 'desc')
            ->paginate(10); // 👈 mỗi trang 10 sản phẩm

        return view('admin.product.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manufactures = DB::table('manufactures')->get();
        $protypes = DB::table('protypes')->get();

        return view('admin.product.create', compact('manufactures', 'protypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'manu_id' => 'nullable',
            'type_id' => 'nullable',
            'price' => 'required|numeric',
            'pro_image' => 'nullable|image|max:2048',
            'description' => 'nullable',
        ]);

        $data['feature'] = 0;
        $data['pro_image'] = '';
        $data['created_at'] = now();
        $data['updated_at'] = now();


        // upload ảnh
        if ($request->hasFile('image')) {
            $data['pro_image'] = $request->file('image')->store('products', 'public');
        }

        DB::table('products')->insert($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $manufactures = DB::table('manufactures')->get();
        $protypes = DB::table('protypes')->get();

        return view('admin.product.edit', compact(
            'product',
            'manufactures',
            'protypes'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'manu_id' => 'nullable',
            'type_id' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $data['pro_image'] = $request->file('image')->store('products', 'public');
        }

        $data['updated_at'] = now();

        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lấy sản phẩm
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('admin.products.index')
                ->with('error', 'Sản phẩm không tồn tại');
        }

        // Xóa ảnh nếu có
        if ($product->pro_image && Storage::disk('public')->exists($product->pro_image)) {
            Storage::disk('public')->delete($product->pro_image);
        }

        // Xóa sản phẩm
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Xóa sản phẩm thành công');
    }
}