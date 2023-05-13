<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Client',
            'client'    => Client::get(),
            'content'   => 'admin/client/index'
        ];

        if (request()->ajax()) {
            $query = Client::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('client.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('client.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                        </ul>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 80px;" />' : '';
            })->rawColumns(['action', 'photos'])->make();
        }

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Client',
            'content' => 'admin/client/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/client', 'public');

        Client::create($data);
        Alert::success('Sukses', 'Client Berhasil Ditambahkan');
        return redirect()->route('client.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Client',
            'client' => Client::find($id),
            'content' => 'admin/client/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Client::find($id);
        $data = $request->validate([
            'name'          => 'required',
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

            $data['photos'] = $request->file('photos')->store('assets/client', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Client Berhasil Diubah');
        return redirect()->route('client.index');
    }

    public function destroy(Client $client)
    {
        if ($client->photos != null) {
            $realLocation = "storage/" . $client->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($client->photos);
        $client->delete();
        Alert::success('Sukses', 'Client Berhasil Dihapus');
        return redirect()->route('client.index');
    }
}
