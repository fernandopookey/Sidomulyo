<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MachineRequest;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MachineController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Machine List',
            'machine'   => Machine::get(),
            'content'   => 'admin/machine/index'
        ];

        if (request()->ajax()) {
            $query = Machine::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item text-success" href="' . route('machine.show', $item->id) . '">
                                    Detail
                                </a>
                                <a class="dropdown-item" href="' . route('machine.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('machine.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm("Yakin Dek ?");">Hapus</button>
                                </form>
                        </ul>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="height: 100px; width: 120px; object-fit: cover;" />' : '';
            })->rawColumns(['action', 'photos'])->make();
        }

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mesin',
            'content' => 'admin/machine/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(MachineRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/machine', 'public');

        Machine::create($data);
        Alert::success('Sukses', 'Mesin Berhasil Ditambahkan');
        return redirect()->route('machine.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail Mesin',
            'machine'   => Machine::find($id),
            'content'   => 'admin/machine/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Mesin',
            'machine' => Machine::find($id),
            'content' => 'admin/machine/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Machine::find($id);
        $data = $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'slug'          => 'string',
            'photos'        => 'image',
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

            $data['slug'] = Str::slug($request->name);
            $data['photos'] = $request->file('photos')->store('assets/machine', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Mesin Berhasil Diubah');
        return redirect()->route('machine.index');
    }

    public function destroy(Machine $machine)
    {
        if ($machine->photos != null) {
            $realLocation = "storage/" . $machine->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($machine->photos);
        $machine->delete();
        Alert::success('Sukses', 'Mesin Berhasil Dihapus');
        return redirect()->route('machine.index');
    }
}
