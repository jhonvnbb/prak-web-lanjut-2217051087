<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- @vite('resources/css/app.css') -->
</head>
<body>
    <div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf 
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama">

            <label for="npm">NPM : </label>
            <input type="text" name="npm" id="npm">

            <label for="kelas">Kelas : </label>
            <input type="text" name="kelas" id="kelas">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>