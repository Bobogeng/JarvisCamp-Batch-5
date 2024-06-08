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
        $sortBy = $request->query('sortBy', 'id');
        $sortDirection = $request->query('sortDirection', 'asc');

        $tasks = Task::orderBy($sortBy, $sortDirection)->paginate(10);

        foreach ($tasks as &$task) {
            $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');
        }

        return view('task.index', compact('tasks', 'sortBy', 'sortDirection'));
    }

    public function show(Request $request, string $id)
    {
        $task = Task::with('category')->findOrFail($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');

        $sortBy = $request->query('sortBy', 'id');
        $sortDirection = $request->query('sortDirection', 'asc');
        $currentPage = $request->query('page', 1);

        return view('task.show', compact('task', 'sortBy', 'sortDirection', 'currentPage'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('task.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $deadline = Carbon::parse($request->deadline)->translatedFormat('d/m/Y');

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'deadline' => 'required|date',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $task = new Task([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $deadline,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        $task->save();

        return redirect()->route('tasks.show', $task->id);
    }

    public function edit(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d/m/Y');

        $categories = Category::all();

        $sortBy = $request->query('sortBy', 'id');
        $sortDirection = $request->query('sortDirection', 'asc');
        $currentPage = $request->query('page', 1);

        return view('task.edit', compact('task', 'categories', 'sortBy', 'sortDirection', 'currentPage'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'deadline' => 'required|date_format:d/m/Y',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $task = Task::findOrFail($id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->deadline = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d H:i:s');
        $task->status = $request->status;
        $task->category_id = $request->category_id;

        $task->save();

        $sortBy = $request->sortBy ?? 'id';
        $sortDirection = $request->sortDirection ?? 'asc';
        $currentPage = $request->page ?? 1;

        return redirect()->route('tasks.show', ['id' => $task->id, 'sortBy' => $sortBy, 'sortDirection' => $sortDirection, 'page' => $currentPage]);
    }


    public function destroy(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        $sortBy = $request->sortBy ?? 'id';
        $sortDirection = $request->sortDirection ?? 'asc';
        $currentPage = $request->page ?? 1;
        $lastPage = Task::paginate(10)->lastPage();
        if ($currentPage > $lastPage) {
            return redirect()->route('tasks', ['sortBy' => $sortBy, 'sortDirection' => $sortDirection, 'page' => $lastPage]);
        }

        return redirect()->route('tasks', ['sortBy' => $sortBy, 'sortDirection' => $sortDirection, 'page' => $currentPage]);
    }

    public function list()
    {
        $tasks = Task::with('category')->paginate(10);

        foreach ($tasks as &$task) {
            $task['deadline'] = Carbon::parse($task['deadline'])->diffForHumans();
        }

        return view('task.list.index', compact('tasks'));
    }

    public function detail(Request $request, string $id)
    {
        $task = Task::with('category')->find($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->translatedFormat('d F Y');

        $currentPage = $request->query('page', 1);

        return view('task.list.detail', compact('task', 'currentPage'));
    }
}
