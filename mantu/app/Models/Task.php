<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected static $tasks = [
        [
            'id' => 1,
            'name' => 'Bahasa Inggris',
            'deadline' => '2024-05-29',
            'status' => 'Belum Selesai',
            'description' => 'Mengerjakan tugas bahasa inggris chapter 3 di buku LKS halaman 10-12.',
        ],
        [
            'id' => 2,
            'name' => 'Matematika',
            'deadline' => '2024-05-30',
            'status' => 'Belum Selesai',
            'description' => 'Mengerjakan soal-soal matematika di buku PR halaman 20-25.',
        ],
        [
            'id' => 3,
            'name' => 'Fisika',
            'deadline' => '2024-05-31',
            'status' => 'Belum Selesai',
            'description' => 'Mengerjakan soal-soal fisika di buku PR halaman 30-35.',
        ],
        [
            'id' => 4,
            'name' => 'Kimia',
            'deadline' => '2024-06-01',
            'status' => 'Belum Selesai',
            'description' => 'Mengerjakan soal-soal kimia di buku PR halaman 40-45.',
        ],
    ];

    public static function getAll()
    {
        return self::$tasks;
    }

    public static function findById($id)
    {
        foreach (self::$tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }

        abort(404, 'Task not found');
    }
}
