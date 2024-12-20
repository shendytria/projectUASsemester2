<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Dashboard()
    {

        $task = Todolist::where('user_id', '=', Auth::id())->get();
        return view('admin.dashboard', compact('task'));
    }
}
