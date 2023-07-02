<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List User',
            'users'     => User::get(),
            'content'   => 'new-admin/user/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah User',
            'content'   => 'new-admin/user/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

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
            'title'     => 'Edit User',
            'user'      => User::find($id),
            'content'   => 'new-admin/user/edit'
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

    public function filter(Request $request)
    {
        $user = User::orderBy('id', 'desc')
            ->when(
                $request->fromDate && $request->toDate,
                function (Builder $builder) use ($request) {
                    $builder->whereBetween(
                        DB::raw('DATE(created_at)'),
                        [
                            $request->fromDate,
                            $request->toDate
                        ]
                    );
                }
            )->paginate(5);

        $data = [
            'users'     => $user,
            'request'   => $request,
            'content'   => 'new-admin/user/index'
        ];

        return view('new-admin.layouts.wrapper', $data);

        // return view('employee.index', compact('employees', 'request'));




        // $fromDate = $request->startDate;
        // $toDate = $request->toDate;

        // $users = User::where('created_at', [$fromDate, $toDate])
        //     ->get();

        // dd($users);

        // // $users = User::where('created_at', '>=', $fromDate)
        // //     ->where('created_at', '<=', $toDate)
        // //     ->get();

        // $data = [
        //     'users'     => $users,
        //     'content'   => 'new-admin/user/index'
        // ];

        // return view('new-admin.layouts.wrapper', $data);
        // $formDate = $request->input('fromDate');
        // $toDate = $request->input('toDate');

        // $query = DB::table('users')->select()
        //     ->where('created_at', '>=', $formDate)
        //     ->where('created_at', '<=', $toDate)
        //     ->get();
        // // dd($query);

        // // $role = DB::table('users')
        // //     ->select('users.role_id_user', 'role_name.role_id', 'role_name.promission')
        // //     ->join('role_name', 'users.role_id_user', '=', 'role_name.role_id')
        // //     ->get();
        // $data = [
        //     'query'          => $query,
        //     // 'users'     => User::get(),
        //     'content'   => 'new-admin/user/index'
        // ];

        // return view('new-admin.layouts.wrapper', $data);
    }
}