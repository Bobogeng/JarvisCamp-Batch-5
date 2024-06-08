<x-layout>
    <div class="container-fluid">
        <div class="row">
            @foreach ($groupedTasks as $status => $tasks)
                @php
                    if ($status === 'Selesai') {
                        $boxClass = 'bg-gradient-success';
                    } elseif ($status === 'Sedang Dikerjakan') {
                        $boxClass = 'bg-gradient-warning';
                    } else {
                        $boxClass = 'bg-gradient-danger';
                    }
                @endphp
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box {{ $boxClass }}">
                        <div class="inner">
                            <h3 class="text-truncate">{{ $tasks->count() }}</h3>
                            <p class="text-truncate">{{ $status }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('tasks.list') }}" class="small-box-footer">Daftar Tugas <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-blue">
                    <div class="inner">
                        <h3 class="text-truncate">{{ $nearestDeadline['name'] }}</h3>
                        <p class="text-truncate">Deadline:
                            {{ \Carbon\Carbon::parse($nearestDeadline['deadline'])->diffForHumans() }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="{{ route('tasks.list.show', $nearestDeadline['id']) }}" class="small-box-footer">Lihat
                        Tugas
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Selamat Datang, Admin!</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Selamat datang di Dashboard Admin. Di sini Anda dapat mengelola tugas dan melihat
                            statistik tugas Anda. Gunakan menu di sebelah kiri untuk menjelajahi
                            berbagai menu.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</x-layout>
