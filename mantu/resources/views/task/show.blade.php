<x-layout>
    <x-slot:title>Detail Tugas</x-slot>
    <x-slot:header>Detail Tugas</x-slot>
    @php
        if ($task->status === 'Selesai') {
            $boxClass = 'bg-success';
        } elseif ($task->status === 'Sedang Dikerjakan') {
            $boxClass = 'bg-warning';
        } else {
            $boxClass = 'bg-danger';
        }
    @endphp
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $task['name'] }}</h4><br>
            <small>Deadline: {{ $task['deadline'] }}</small><br>
            <span class="badge {{ $boxClass }}">{{ $task->status }}</span>
            <span class="badge {{ $task->category ? 'bg-gray-dark' : 'bg-danger' }}">
                <strong>Category:</strong>
                {{ $task->category->name ?? 'Uncategorized' }}
            </span>
            <p class="card-text mt-3">{{ $task['description'] }}</p>

            <div class="mt-3">
                <a href="{{ route('tasks', ['sortBy' => request()->get('sortBy', 'id'), 'sortDirection' => request()->get('sortDirection', 'asc'), 'page' => request()->get('page', 1)]) }}"
                    class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('tasks.edit', ['id' => $task['id'], 'sortBy' => request()->get('sortBy', 'id'), 'sortDirection' => request()->get('sortDirection', 'asc'), 'page' => request()->get('page', 1)]) }}"
                    class="btn btn-warning"><i class="fas fa-edit"></i>
                    Edit</a>
                <form
                    action="{{ route('tasks.destroy', ['id' => $task['id'], 'sortBy' => request()->get('sortBy', 'id'), 'sortDirection' => request()->get('sortDirection', 'asc'), 'page' => request()->get('page', 1)]) }}"
                    method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
