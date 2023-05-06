<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List User',
            'users'      => User::get(),
            'content'   => 'new-admin/user/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'content' => 'new-admin/user/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $data['photos'] = $request->file('photos')->store('assets/user', 'public');

        User::create($data);
        Alert::success('Sukses', 'User Berhasil Ditambahkan');
        return redirect()->route('user.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail User',
            'user'      => User::find($id),
            'content'   => 'new-admin/user/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::find($id),
            'content' => 'new-admin/user/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $data = $request->validate([
            'fullname'          => 'required',
            'username'          => 'required',
            'email'             => 'email',
            'address'           => 'string',
            'phone_number'      => 'required',
            'roles'             => 'nullable|string|in:ADMIN,USER,CS',
            'status'            => 'boolean'
        ]);

        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['photos'] = $request->file('photos')->store('assets/user', 'public');
            $data['password'] = bcrypt($request->password);
        } else {
            $data['photos'] = $item->photos;
            $data['password'] = bcrypt($request->password);
        }

        $item->update($data);
        Alert::success('Sukses', 'User Berhasil Diubah');
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if ($user->photos != null) {
            $realLocation = "storage/" . $user->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($user->photos);
        $user->delete();
        Alert::success('Sukses', 'User Berhasil Dihapus');
        return redirect()->route('user.index');
    }
}
