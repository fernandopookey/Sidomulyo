<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Bank List',
            'bank'      => Bank::get(),
            'content'   => 'new-admin/bank/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Bank',
            'content' => 'new-admin/bank/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate([
            'name'  => 'required|max:250'
        ]);

        Bank::create($data);
        Alert::success('Sukses', 'Bank Added Successfully');
        return redirect()->route('bank.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Bank',
            'bank'      => Bank::find($id),
            'content'   => 'new-admin/bank/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Bank::find($id);
        $data = $request->validate([
            'name'  => 'required'
        ]);

        $item->update($data);
        Alert::success('Sukses', 'Bank Updated Successfully');
        return redirect()->route('bank.index');
    }

    public function destroy(Bank $bank)
    {


        $bank->delete();
        Alert::success('Sukses', 'Bank Deleted Successfully');
        return redirect()->route('bank.index');
    }
}
