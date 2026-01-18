<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Thêm người dùng thành công');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'image_user' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image_user')) {
            if ($user->image_user) {
                Storage::disk('public')->delete($user->image_user);
            }
            $data['image_user'] = $request->file('image_user')->store('users', 'public');
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image_user) {
            Storage::disk('public')->delete($user->image_user);
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Xóa người dùng thành công');
    }
}
