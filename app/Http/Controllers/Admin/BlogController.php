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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Blog List',
            'blog'      => Blog::get(),
            'content'   => 'new-admin/blog/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Blog',
            'content' => 'new-admin/blog/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(BlogRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/blog', 'public');

        Blog::create($data);
        Alert::success('Sukses', 'Blog Added Successfully');
        return redirect()->route('blog.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Blog Details',
            'blog'      => Blog::find($id),
            'content'   => 'new-admin/blog/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Blog',
            'blog'      => Blog::find($id),
            'content'   => 'new-admin/blog/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Blog::find($id);
        $data = $request->validate([
            'name'          => 'required',
            'author'        => 'required',
            'description'   => 'required',
            'source'        => 'required',
            'source_link'   => 'required',
            'slug'          => 'string',
            'photos'        => 'mimes:png,jpg,jpeg',
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
        Alert::success('Sukses', 'Blog Updated Successfully');
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
        Alert::success('Sukses', 'Blog Deleted Successfully');
        return redirect()->route('blog.index');
    }

    public function filter(Request $request)
    {
        $blog = Blog::orderBy('id', 'desc')
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
            )->paginate(10);

        $data = [
            'blog'          => $blog,
            'request'       => $request,
            'content'       => 'new-admin/blog/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }
}
