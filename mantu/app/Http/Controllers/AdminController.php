<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $groupedTasks = collect($tasks)->groupBy('status');
        $nearestDeadline = collect($tasks)->sortBy('deadline')->first();

        return view('index', compact('groupedTasks', 'nearestDeadline'));
    }
}
