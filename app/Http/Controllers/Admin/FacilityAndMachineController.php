<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacilityAndMachine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FacilityAndMachineController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Fasilitas Dan Mesin',
            'facilityandmachine'   => FacilityAndMachine::first(),
            'content'   => 'new-admin/facilityandmachine/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function show(string $id)
    {
        $data = [
            'title'                 => 'Detail Fasilitas Dan Mesin',
            'facilityandmachine'    => FacilityAndMachine::find($id),
            'content'               => 'new-admin/facility&machine/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $facilityandmachine = FacilityAndMachine::first();
        $data = $request->validate([
            'head'         => 'required',
            'description'  => 'required',
        ]);

        $facilityandmachine->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/facilityandmachine');
    }
}
