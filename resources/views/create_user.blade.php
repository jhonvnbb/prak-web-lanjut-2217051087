<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-300 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md transform transition-all hover:scale-105">
        <h1 class="text-3xl font-extrabold text-center mb-6 text-gray-900">Create User</h1>
        <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
            @csrf 
            <div>
                <div class="relative mt-1">
                    <input type="text" placeholder="Nama" name="nama" id="nama" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm sm:text-sm transition duration-300 ease-in-out hover:shadow-lg">
                    <div class="absolute inset-y-1.5 pl-3">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    @foreach($errors->get('nama') as $error)
                        <p class="mt-1 text-sm text-red-600 bg-red-100 border border-red-300 rounded-md p-2">{{ $error }}</p>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="relative mt-1">
                    <input type="text" placeholder="NPM" name="npm" id="npm" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm sm:text-sm transition duration-300 ease-in-out hover:shadow-lg">
                    <div class="absolute inset-y-1.5 pl-3">
                        <i class="fas fa-id-card text-gray-400"></i>
                    </div>
                    @foreach($errors->get('npm') as $error)
                        <p class="mt-1 text-sm text-red-600 bg-red-100 border border-red-300 rounded-md p-2">{{ $error }}</p>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="relative mt-1">
                    <select placeholder="Kelas" name="kelas_id" id="kelas_id" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm sm:text-sm transition duration-300 ease-in-out hover:shadow-lg">
                        <option value="" disabled selected>Pilih kelas</option>
                        @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-1.5 pl-3">
                        <i class="fas fa-school text-gray-400"></i>
                    </div>
                    @foreach($errors->get('kelas_id') as $error)
                        <p class="mt-1 text-sm text-red-600 bg-red-100 border border-red-300 rounded-md p-2">{{ $error }}</p>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2 rounded-lg hover:from-indigo-600 hover:to-purple-700 transition duration-300 ease-in-out transform hover:scale-105">
                <i class="fas fa-paper-plane mr-2"></i> Submit
            </button>
        </form>
    </div>

</body>
</html>
