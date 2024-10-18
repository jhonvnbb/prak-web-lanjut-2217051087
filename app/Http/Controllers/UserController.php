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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->move(('uploads/img'),$foto);
            // $fotoPath = $foto->move(('uploads/img'), $foto->getClientOriginalName());
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath,
        ]);
    
        // $user = $this->userModel->create($validatedData);
        // $user->load('kelas');
    
        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan', 
        // ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }

    // public function show($id){
    //     $user = UserModel::findOrFail($id);
    //     $kelas = Kelas::findOrFail($user->kelas_id);

    //     $title = 'Detail'. $user->nama;

    //     return view('profile', compact('user','kelas', 'title'));
    // }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;
        
        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $request -> foto->move(('uploads'),$fileName);
            $user->foto = 'uploads/' . $fileName;
        }
        $user->save();

        return redirect()->to('/user')->with('success', 'User berhasil diedit');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}
