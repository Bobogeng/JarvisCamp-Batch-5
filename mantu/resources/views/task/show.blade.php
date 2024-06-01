<x-layout>
    <x-slot:title>Detail Tugas</x-slot>
    <x-slot:header>Detail Tugas</x-slot>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $task['name'] }}</h4>
            <small>Deadline: {{ $task['deadline'] }}</small><br>
            <span class="badge bg-warning">{{ $task['status'] }}</span>
            <p class="card-text mt-3">{{ $task['description'] }}</p>

            <div class="mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</x-layout>