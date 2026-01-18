<?php

namespace App\Http\Controllers;

use App\Models\Protype;
use Illuminate\Http\Request;

class ProtypeController extends Controller
{
    public function index()
    {
        $protypes = Protype::paginate(10);
        return view('admin.protypes.index', compact('protypes'));
    }

    public function create()
    {
        return view('admin.protypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:protypes,type_name'
        ]);

        Protype::create([
            'type_name' => $request->type_name
        ]);

        return redirect()->route('admin.protypes.index')
            ->with('success', 'Thêm loại sản phẩm thành công');
    }

    public function edit($id)
    {
        $protype = Protype::findOrFail($id);
        return view('admin.protypes.edit', compact('protype'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|unique:protypes,type_name,' . $id . ',type_id'
        ]);

        $protype = Protype::findOrFail($id);
        $protype->update([
            'type_name' => $request->type_name
        ]);

        return redirect()->route('admin.protypes.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $protype = Protype::findOrFail($id);

        // Không cho xóa nếu có sản phẩm
        if ($protype->products()->count() > 0) {
            return redirect()->route('admin.protypes.index')
                ->with('success', 'Không thể xóa vì đang có sản phẩm');
        }

        $protype->delete();

        return redirect()->route('admin.protypes.index')
            ->with('success', 'Xóa thành công');
    }
}
