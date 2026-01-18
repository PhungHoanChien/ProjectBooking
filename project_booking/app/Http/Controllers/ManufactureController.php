<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    // LIST
    public function index()
    {
        $manufactures = Manufacture::paginate(10);
        return view('admin.manufactures.index', compact('manufactures'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.manufactures.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'manu_name' => 'required|string|max:255'
        ]);

        Manufacture::create($request->all());

        return redirect()
            ->route('admin.manufactures.index')
            ->with('success', 'Thêm nhà sản xuất thành công');
    }

    // FORM EDIT
    public function edit($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        return view('admin.manufactures.edit', compact('manufacture'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'manu_name' => 'required|string|max:255'
        ]);

        $manufacture = Manufacture::findOrFail($id);
        $manufacture->update($request->all());

        return redirect()
            ->route('admin.manufactures.index')
            ->with('success', 'Cập nhật thành công');
    }

    // DELETE
    public function destroy($id)
    {
        Manufacture::findOrFail($id)->delete();

        return redirect()
            ->route('admin.manufactures.index')
            ->with('success', 'Xóa thành công');
    }
}
