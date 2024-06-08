<x-layout>
    @push('links')
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    @endpush
    <x-slot:title>Edit Task - {{ $task->name }}</x-slot>
    <x-slot:header>Edit Task - {{ $task->name }}</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Tugas:</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Masukkan nama tugas" value="{{ $task->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Tugas:</label>
                    <textarea name="description" id="description" class="form-control" rows="3"
                        placeholder="Masukkan deskripsi tugas">{{ $task->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deadline Tugas:</label>
                    <div class="input-group date" id="deadline" data-target-input="nearest">
                        <input name="deadline" type="text" class="form-control datetimepicker-input"
                            data-target="#deadline" value="{{ $task->deadline }}"
                            placeholder="Masukkan deadline tugas" />
                        <div class="input-group-append" data-target="#deadline" data-toggle="datetimepicker">
                            <div class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    @error('deadline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status Tugas:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Belum Selesai" {{ $task->status == 'Belum Selesai' ? 'selected' : '' }}>Belum
                            Selesai</option>
                        <option value="Sedang Dikerjakan" {{ $task->status == 'Sedang Dikerjakan' ? 'selected' : '' }}>
                            Sedang Dikerjakan
                        </option>
                        <option value="Selesai" {{ $task->status == 'Selesai' ? 'selected' : '' }}>Selesai
                        </option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori Tugas:</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="page" value="{{ $currentPage }}">
                <input type="hidden" name="sortBy" value="{{ $sortBy }}">
                <input type="hidden" name="sortDirection" value="{{ $sortDirection }}">

                <div class="mt-3">
                    <a href="{{ route('tasks', ['sortBy' => request()->get('sortBy', 'id'), 'sortDirection' => request()->get('sortDirection', 'asc'), 'page' => request()->get('page', 1)]) }}"
                        class="btn btn-danger"><i class="fas fa-ban"></i> Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Update Task</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/moment/locale/id.js"></script>
        <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script>
            moment.locale('id');
            $("#deadline").datetimepicker({
                format: 'L',
                locale: 'id'
            });
        </script>
    @endpush
</x-layout>
