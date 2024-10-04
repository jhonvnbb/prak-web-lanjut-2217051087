<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function create()
    {
        $kelas = $this->kelas->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    // public function store(Request $request) 
    // { 
    //     $data = $request->all(); 
    //     dd($data); 
    // }

    public $userModel;
    public $kelas;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelas = new Kelas();
    }

    public function index(){
        
        $data=[
            'title' => 'List User',
            'user' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function store(UserRequest $request) 
    { 
        $validatedData = $request->validate([ 
            'nama' => 'required|string|max:255', 
            'npm' => 'required|string|max:255', 
            'kelas_id' => 'required|exists:kelas,id', 
        ]); 
    
        $user = $this->userModel->create($validatedData);
        $user->load('kelas');
    
        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan', 
        // ]);

        return redirect()->to('/user');
    }
}
