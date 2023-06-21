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
            'title'     => 'Client List',
            'client'    => Client::get(),
            'content'   => 'new-admin/client/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Add New Client',
            'content'   => 'new-admin/client/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/client', 'public');

        Client::create($data);
        Alert::success('Sukses', 'Client Added Successfully');
        return redirect()->route('client.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Client',
            'client' => Client::find($id),
            'content' => 'new-admin/client/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Client::find($id);
        $data = $request->validate([
            'name'          => 'required',
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

            $data['photos'] = $request->file('photos')->store('assets/client', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Client Updated Successfully');
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
        Alert::success('Sukses', 'Client Deleted Successfully');
        return redirect()->route('client.index');
    }
}
