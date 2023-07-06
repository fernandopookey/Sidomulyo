<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Report',
            'report'        => Report::get(),
            'content'       => 'new-admin/report/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }
}
