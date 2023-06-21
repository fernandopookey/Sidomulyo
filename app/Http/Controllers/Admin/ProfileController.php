<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Company Profile',
            'profile'   => Profile::first(),
            'content'   => 'new-admin/profile/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Company Profile Details',
            'profile'   => Profile::find($id),
            'content'   => 'new-admin/profile/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = Profile::first();
        $data = $request->validate([
            'name'          => 'required',
            'visi'          => 'required',
            'misi'          => 'required',
            'proper'        => 'required',
            'description'   => 'required',
            'photos'        => 'mimes:png,jpg,jpeg',
            'document'      => 'mimes:pdf,xlxs,xlx,docx,doc,csv,txt'
        ]);

        if ($request->hasFile('document')) {

            if ($item->document != null) {
                $realLocation = "storage/" . $item->document;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $document = $request->file('document');
            $file_name = time() . '-' . $document->getClientOriginalName();

            $data['document'] = $request->file('document')->store('assets/profile', 'public');
        } else {
            $data['document'] = $item->document;
        }


        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['photos'] = $request->file('photos')->store('assets/profile', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        // dd($data);

        $item->update($data);
        Alert::success('Sukses', 'Profile Updated Successfully');
        return redirect('/admin/profile');
    }
}
