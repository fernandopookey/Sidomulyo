<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HeaderController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Link Text Navigation Bar (Header)',
            'header'    => Header::first(),
            'content'   => 'new-admin/header/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = Header::first();
        $data = $request->validate([
            'logo'              =>  'mimes:png,jpg,jpeg,svg',
            'phone_number'      =>  'required',
            'facebook_title'    =>  'required',
            'facebook_link'     =>  'required',
            'twiter_title'      =>  'required',
            'twiter_link'       =>  'required',
            'instagram_title'   =>  'required',
            'instagram_link'    =>  'required',
        ]);

        // $data['logo'] = $request->file('logo')->store('assets/header', 'public');

        if ($request->hasFile('logo')) {

            if ($item->logo != null) {
                $realLocation = "storage/" . $item->logo;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $logo = $request->file('logo');
            $file_name = time() . '-' . $logo->getClientOriginalName();
            $data['logo'] = $request->file('logo')->store('assets/header', 'public');
        } else {
            $data['logo'] = $item->logo;
        }

        // $item->update($data);
        // Alert::success('Sukses', 'Data Berhasil Diubah');
        // return redirect('/admin/header');

        // $data['logo'] = $request->file('logo')->store('assets/header', 'public');

        $item->update($data);
        Alert::success('Sukses', 'Data Updated Successfully');
        return redirect('/admin/navbar-content');
    }
}