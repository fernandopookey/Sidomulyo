<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Slider',
            'slider'   => Slider::get(),
            'content'   => 'admin/slider/index'
        ];

        if (request()->ajax()) {
            $query = Slider::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('slider.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('slider.destroy', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
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
            'title' => 'Tambah Slider',
            'content' => 'admin/slider/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function store(SliderRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/slider', 'public');

        Slider::create($data);
        Alert::success('Sukses', 'Slider Berhasil Ditambahkan');
        return redirect()->route('slider.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail Slider',
            'slider'   => Slider::find($id),
            'content'   => 'admin/slider/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Slider',
            'slider' => Slider::find($id),
            'content' => 'admin/slider/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Slider::find($id);
        $data = $request->validate([
            'photos'        => 'required|mimes:png,jpg,jpeg',
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
            $data['photos'] = $request->file('photos')->store('assets/slider', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Slider Berhasil Diubah');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->photos != null) {
            $realLocation = "storage/" . $slider->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($slider->photos);
        $slider->delete();
        Alert::success('Sukses', 'Slider Berhasil Dihapus');
        return redirect()->route('slider.index');
    }
}
