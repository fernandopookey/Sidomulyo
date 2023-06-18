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
            'title'     => 'List Mesin',
            'machine'   => Machine::get(),
            'content'   => 'new-admin/machine/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Mesin',
            'content'   => 'new-admin/machine/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
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
            'content'   => 'new-admin/machine/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Mesin',
            'machine' => Machine::find($id),
            'content' => 'new-admin/machine/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
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
