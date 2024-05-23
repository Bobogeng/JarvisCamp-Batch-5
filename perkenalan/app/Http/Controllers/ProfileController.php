<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(): View
    {
        $data = [
            'name' => 'Irsal Fathi Farhat',
            'bio' => 'Saya adalah seorang Frontend Developer & UI Designer.',
            'image' => 'profile.jpg',
        ];

        return view('profile.index', $data);
    }
}
