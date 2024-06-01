<x-layout>
    <div class="container-fluid">
        <div class="row">
            @foreach ($groupedTasks as $status => $tasks)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $tasks->count() }}</h3>
                            <p>{{ $status }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('tasks') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $nearestDeadline['name'] }}</h3>
                        <p>Deadline: {{ \Carbon\Carbon::parse($nearestDeadline['deadline'])->format('Y-m-d') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="{{ route('tasks.show', $nearestDeadline['id']) }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
