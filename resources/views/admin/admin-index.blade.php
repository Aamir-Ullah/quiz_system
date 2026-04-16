<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class=" bg-white shadow-md px-4 py-3">
        <div class="flex justify-between item-center">
            <div class="text-2xl text-gray-700 hover:text-blue-500 cursor-pointer">
                Quiz System
            </div>
            <div class=" space-x-4">
                <a class="text-gray-700 hover:text-blue-500" href="">Dashboard</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Categories</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Quiz</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Welcome {{$admin->name}}</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Logout</a>
            </div>
        </div>
    </nav>
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">

    </div>
</body>
</html>
