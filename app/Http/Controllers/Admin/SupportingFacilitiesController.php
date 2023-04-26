<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupportingFacilitiesRequest;
use App\Models\SupportingFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SupportingFacilitiesController extends Controller
{
    public function index()
    {
        $data = [
            'title'                 => 'Fasilitas Penunjang',
            'supporting_facilities' => SupportingFacilities::get(),
            'content'               => 'new-admin/supporting-facilities/index'
        ];

        if (request()->ajax()) {
            $query = SupportingFacilities::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('facility.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('facility.destroy', $item->id) . '" method="POST">
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

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Fasilitas Penunjang',
            'content' => 'new-admin/supporting-facilities/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(SupportingFacilitiesRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/facilities', 'public');

        SupportingFacilities::create($data);
        Alert::success('Sukses', 'Fasilitas Penunjang Berhasil Ditambahkan');
        return redirect()->route('facility.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'                     => 'Edit Fasilitas Penunjang',
            'supporting_facilities'     => SupportingFacilities::find($id),
            'content'                   => 'new-admin/supporting-facilities/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = SupportingFacilities::find($id);
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

            $data['photos'] = $request->file('photos')->store('assets/facilities', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Fasilitas Penunjang Berhasil Diubah');
        return redirect()->route('facility.index');
    }

    public function destroy(SupportingFacilities $facility)
    {
        if ($facility->photos != null) {
            $realLocation = "storage/" . $facility->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($facility->photos);
        $facility->delete();
        Alert::success('Sukses', 'Fasilitas Penunjang Berhasil Dihapus');
        return redirect()->route('facility.index');
    }
}
