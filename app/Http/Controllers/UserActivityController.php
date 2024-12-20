<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function index(){

        $data = UserActivity::paginate(10);

        return view('admin.userActivity', compact('data'));
    }
}
