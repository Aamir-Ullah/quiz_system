<nav class=" bg-white shadow-md px-4 py-3">
    <div class="flex justify-between item-center">
        <div class="text-2xl text-gray-700 hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>
        <div class=" space-x-4">
            <a class="text-gray-700 hover:text-blue-500" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="text-gray-700 hover:text-blue-500" href="{{ route('admin.categories') }}">Categories</a>
            <a class="text-gray-700 hover:text-blue-500" href="">Quiz</a>
            <a class="text-gray-700 hover:text-blue-500" href="">Welcome {{$name}}</a>
            <a class="text-gray-700 hover:text-blue-500" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>
</nav>
