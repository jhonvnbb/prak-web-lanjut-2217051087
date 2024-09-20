<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Profile Page</title>
</head>
<body class="bg-gradient-to-br from-gray-900 to-black min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 shadow-xl rounded-xl p-10 max-w-5xl w-full flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-10 transform transition-all hover:shadow-2xl">

        <div class="flex-shrink-0 relative group">
            <img class="rounded-full object-cover border-4 border-gray-700 shadow-lg group-hover:scale-105 transition-transform duration-300 ease-out" src="{{ asset('assets/img/pp.jpg') }}" alt="Profile Picture" width="250" height="250">
        </div>

        <div class="flex-1 text-white">
            <h1 class="text-5xl font-extrabold text-center md:text-left mb-6">My Profile</h1>
            <div class="space-y-4">
                <h2 class="text-2xl font-semibold text-yellow-400">{{$nama}}</h2>
                <p class="text-lg text-gray-300">{{$npm}}</p>
                <p class="text-lg text-gray-300"><span class="font-medium">Kelas : </span>{{$kelas}}</p>
                <blockquote class="text-gray-400 text-lg italic border-l-4 pl-4 border-yellow-500 max-w-lg">
                    Embrace challenges as stepping stones to success. Your resilience defines you. Believe in your journey, stay focused, and conquer every obstacle. You've got this!
                </blockquote>
            </div>
            
            <div class="flex space-x-6 mt-6 justify-center md:justify-start">
                <a href="https://github.com/jhonvnbb" class="text-gray-400 hover:text-yellow-400 transition-colors duration-300"><i class="fab fa-github fa-2x"></i></a>
                <a href="https://www.instagram.com/jhonnvnbb/?igshid=OGQ5ZDc2ODk2ZA%3D%3D" class="text-gray-400 hover:text-yellow-400 transition-colors duration-300"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="https://wa.me/6281375839812" class="text-gray-400 hover:text-yellow-400 transition-colors duration-300"><i class="fab fa-whatsapp fa-2x"></i></a>
            </div>
        </div>

    </div>
</body>
</html>
