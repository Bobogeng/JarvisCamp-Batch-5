<x-layout>
    @push('links')
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    @endpush
    <x-slot:title>Create New Task</x-slot>
    <x-slot:header>Create New Task</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Masukkan nama tugas">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" class="form-control" rows="3"
                        placeholder="Masukkan deskripsi tugas"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Deadline:</label>
                    <div class="input-group date" id="deadline" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#deadline" />
                        <div class="input-group-append" data-target="#deadline" data-toggle="datetimepicker">
                            <div class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('deadline'))
                        <span class="text-danger">{{ $errors->first('deadline') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Belum Selesai" {{ old('status') == 'Belum Selesai' ? 'selected' : '' }}>Belum
                            Selesai</option>
                        <option value="Sedang Dikerjakan" {{ old('status') == 'Sedang Dikerjakan' ? 'selected' : '' }}>
                            Sedang Dikerjakan
                        </option>
                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai
                        </option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori:</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Create Task</button>
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
