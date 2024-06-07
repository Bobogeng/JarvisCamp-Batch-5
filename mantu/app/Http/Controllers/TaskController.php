<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category')->get();

        foreach ($tasks as &$task) {
            $task['deadline'] = Carbon::parse($task['deadline'])->diffForHumans();
        }

        return view('task.index', compact('tasks'));
    }

    public function show(string $id)
    {
        $task = Task::with('category')->find($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->format('d M Y');

        return view('task.show', compact('task'));
    }
}
