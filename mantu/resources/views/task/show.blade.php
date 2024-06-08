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
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</x-layout>
