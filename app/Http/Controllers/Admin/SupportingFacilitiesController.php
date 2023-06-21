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
            'title'                 => 'Supporting Facilities List',
            'supportingFacilities'  => SupportingFacilities::get(),
            'content'               => 'new-admin/supporting-facilities/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Facilities',
            'content' => 'new-admin/supporting-facilities/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(SupportingFacilitiesRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/facilities', 'public');

        SupportingFacilities::create($data);
        Alert::success('Sukses', 'Data Added Successfully');
        return redirect()->route('facility.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'                     => 'Edit Facilities',
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
        Alert::success('Sukses', 'Data Updated Successfully');
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
        Alert::success('Sukses', 'Data Deleted Successfully');
        return redirect()->route('facility.index');
    }
}
