<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Blog',
            'blog'      => Blog::get(),
            'content'   => 'admin/blog/index'
        ];

        if (request()->ajax()) {
            $query = Blog::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item text-success" href="' . route('blog.show', $item->id) . '">
                                    Detail
                                </a>
                                <a class="dropdown-item" href="' . route('blog.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('blog.destroy', $item->id) . '" method="POST">
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

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Blog',
            'content' => 'admin/blog/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(BlogRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/blog', 'public');

        Blog::create($data);
        Alert::success('Sukses', 'Blog Berhasil Ditambahkan');
        return redirect()->route('blog.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail Blog',
            'blog'      => Blog::find($id),
            'content'   => 'admin/blog/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Blog',
            'blog'      => Blog::find($id),
            'content'   => 'new-admin/blog/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Blog::find($id);
        $data = $request->validate([
            'name'          => 'required',
            'author'        => 'required',
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
            $data['photos'] = $request->file('photos')->store('assets/blog', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Blog Berhasil Diubah');
        return redirect()->route('blog.index');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->photos != null) {
            $realLocation = "storage/" . $blog->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($blog->photos);
        $blog->delete();
        Alert::success('Sukses', 'Blog Berhasil Dihapus');
        return redirect()->route('blog.index');
    }
}
