@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6 w-full min-h-screen">
    <h1 class="my-8 text-4xl font-extrabold text-center text-indigo-600">List Users</h1>
    <div class="mb-6">
        <a href="{{ route('user.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Tambah Pengguna Baru</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white uppercase text-xs font-semibold tracking-wider">
                        <th class="py-4 px-6 text-center border-b border-gray-200">ID</th>
                        <th class="py-4 px-6 text-center border-b border-gray-200">Nama</th>
                        <th class="py-4 px-6 text-center border-b border-gray-200">NPM</th>
                        <th class="py-4 px-6 text-center border-b border-gray-200">Kelas</th>
                        <th class="py-4 px-6 text-center border-b border-gray-200">Foto</th>
                        <th class="py-4 px-6 text-center border-b border-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-medium">
                    @if(!empty($user) && $user->count())
                        @foreach($user as $users)
                            <tr class="border-b border-gray-200 bg-white hover:bg-indigo-50 transition duration-300 ease-in-out">
                                <td class="py-4 px-6 text-center">{{ $users->id }}</td>
                                <td class="py-4 px-6 text-center">{{ $users->nama }}</td>
                                <td class="py-4 px-6 text-center">{{ $users->npm }}</td>
                                <td class="py-4 px-6 text-center">{{ $users->nama_kelas }}</td>
                                <td class="py-4 px-6 text-center">
                                    <img class="h-12 w-12 rounded-full object-cover mx-auto" src="{{ asset($users->foto ?? 'assets/img/default.jpg') }}" alt="User Photo">
                                </td>
                                <td class="py-4 px-6 text-center"><a href="{{ route('user.show', $users->id) }}">Detail</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada pengguna yang ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
