<x-layout>
    <x-slot:title>Daftar Tugas</x-slot>
    <x-slot:header>Daftar Tugas</x-slot>
    <div class="row row-gap-4">
        @foreach ($tasks as $task)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $task['name'] }}</h4>
                        <small>Deadline: {{ $task['deadline'] }}</small><br>
                        <span class="badge bg-warning">{{ $task['status'] }}</span>
                        <p class="card-text">{{ Str::limit($task['description'], 40, '...') }}</p>

                        <div class="mt-2">
                            <a href="{{ route('tasks.show', $task['id']) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
