<x-layout>
    @push('links')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    @endpush

    <x-slot:title>Table Tugas</x-slot>
    <x-slot:header>Table Tugas</x-slot>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                Tambah Data</a>
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <x-table-header sortBy="{{ $sortBy }}" sortDirection="{{ $sortDirection }}" name="No"
                            sortKey="id" />
                        <x-table-header sortBy="{{ $sortBy }}" sortDirection="{{ $sortDirection }}" name="Nama"
                            sortKey="name" />
                        <x-table-header sortBy="{{ $sortBy }}" sortDirection="{{ $sortDirection }}"
                            name="Deadline" sortKey="deadline" />
                        <x-table-header sortBy="{{ $sortBy }}" sortDirection="{{ $sortDirection }}"
                            name="Status" sortKey="status" />
                        <x-table-header sortBy="{{ $sortBy }}" sortDirection="{{ $sortDirection }}"
                            name="Category" sortKey="category_id" />
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ Str::limit($task->name, 40, '...') }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td><span class="badge {{ $boxClass }}">{{ $task->status }}</span></td>
                            <td> <span class="badge {{ $task->category ? 'bg-gray-dark' : 'bg-danger' }}">
                                    <strong>Category:</strong>
                                    {{ $task->category->name ?? 'Uncategorized' }}
                                </span></td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-eye"></i> Lihat</a>
                                <button class="btn btn-sm btn-warning edit-button"><i class="fas fa-edit"></i>
                                    Ubah</button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i>
                                        Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-center justify-content-sm-between flex-wrap" style="gap: 20px">
                {{ $tasks->appends(['sortBy' => $sortBy, 'sortDirection' => $sortDirection])->links() }}
                <!-- Pagination Links -->
            </div>
        </div>
    </div>


    @push('scripts')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script>
            $('#table').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    @endpush
</x-layout>
