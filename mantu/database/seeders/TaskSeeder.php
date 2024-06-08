<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Bahasa Inggris',
            'deadline' => Carbon::createFromFormat('Y-m-d', '2024-05-29')->addDays(30),
            'status' => 'Belum Selesai',
            'description' => 'Mengerjakan tugas bahasa inggris chapter 3 di buku LKS halaman 10-12.',
        ]);

        Task::factory(50)->create();
    }
}
