<x-layout>
    <x-slot:title>Daftar Tugas</x-slot>
    <x-slot:header>Daftar Tugas</x-slot>
    <div class="row row-gap-4">
        @foreach ($tasks as $task)
            @php
                if ($task->status === 'Selesai') {
                    $boxClass = 'bg-success';
                } elseif ($task->status === 'Sedang Dikerjakan') {
                    $boxClass = 'bg-warning';
                } else {
                    $boxClass = 'bg-danger';
                }
            @endphp
            <div class="col-12 col-sm-6 col-md-4 d-flex">
                <div class="card w-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <div class="mb-3">
                            <h4 class="card-title">{{ Str::limit($task->name, 40, '...') }}</h4><br>
                            <small>Deadline: {{ $task->deadline }}</small><br>
                            <span class="badge {{ $boxClass }}">{{ $task->status }}</span>
                            <span class="badge {{ $task->category ? 'bg-gray-dark' : 'bg-danger' }}">
                                <strong>Category:</strong>
                                {{ $task->category->name ?? 'Uncategorized' }}
                            </span>
                            <p class="card-text mt-3">{{ Str::limit($task->description, 40, '...') }}</p>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('tasks.list.show', ['id' => $task->id, 'page' => $tasks->currentPage()]) }}"
                                class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="py-4 d-flex justify-content-center justify-content-sm-between row-gap-4 flex-wrap" style="gap: 20px">
        {{ $tasks->links() }} <!-- Pagination Links -->
    </div>
</x-layout>
