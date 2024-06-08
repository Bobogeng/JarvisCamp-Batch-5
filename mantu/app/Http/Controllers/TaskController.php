<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->get('sortBy', 'id');
        $sortDirection = $request->get('sortDirection', 'asc');

        $tasks = Task::orderBy($sortBy, $sortDirection)->paginate(10);

        foreach ($tasks as &$task) {
            $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');
        }

        return view('task.index', compact('tasks', 'sortBy', 'sortDirection'));
    }

    public function show(string $id)
    {
        $task = Task::with('category')->find($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');

        return view('task.show', compact('task'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('task.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'description' => 'nullable|string|max:5000',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $task = Task::create($validatedData);

        return redirect()->route('tasks.show', $task->id);
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();

        return view('task.edit', compact('task', 'categories'));
    }


    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks');
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'description' => 'nullable|string|max:5000',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.show', $task->id);
    }

    public function list()
    {
        $tasks = Task::with('category')->paginate(10);

        foreach ($tasks as &$task) {
            $task['deadline'] = Carbon::parse($task['deadline'])->diffForHumans();
        }

        return view('task.list.index', compact('tasks'));
    }

    public function detail(string $id)
    {
        $task = Task::with('category')->find($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');

        return view('task.list.detail', compact('task'));
    }
}
