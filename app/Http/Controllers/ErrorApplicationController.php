<?php

namespace App\Http\Controllers;

use App\Models\ErrorLogModel;
use Illuminate\Http\Request;

class ErrorApplicationController extends Controller
{
    public function index()
    {
        $data = ErrorLogModel::paginate(10);
        return view('admin.error', compact('data'));
    }
}
