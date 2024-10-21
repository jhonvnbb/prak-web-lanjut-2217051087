<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = [
            'nama' => 'Jhon V Nababan',
            'kelas' => 'C',
            'npm' => '2217051087'
        ];

        return view('profile', $data);
    }
}
