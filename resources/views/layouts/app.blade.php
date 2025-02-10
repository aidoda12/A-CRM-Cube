<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <!-- Main Wrapper -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-white w-64 shadow-md">
            <div class="p-4">
                <img src="http://127.0.0.1:8000/images/logo.svg" alt="logo" class="w-32 mx-auto mt-[-42px]">
            </div>
            <nav class="mt-4">
                <ul class="space-y-4 text-gray-700">
                    <li><a href="/dashboard" class="block px-4 py-2 hover:bg-gray-200 rounded">Dashboard</a></li>
                    <li><a href="/leads" class="block px-4 py-2 hover:bg-gray-200 rounded">Leads</a></li>
                    <li><a href="/contacts" class="block px-4 py-2 hover:bg-gray-200 rounded">Contacts</a></li>
                    <li><a href="/reports" class="block px-4 py-2 hover:bg-gray-200 rounded">Reports</a></li>
                    <li><a href="/settings" class="block px-4 py-2 hover:bg-gray-200 rounded">Settings</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm py-4 px-6 flex items-center justify-between">
                <!-- Search Bar -->
                <div class="flex-1">
                    <form action="{{ route('search.global') }}" method="GET" class="w-full">
                        <input type="text" name="query" placeholder="Search leads, contacts, or reports..."
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                               required>
                    </form>
                </div>

                <!-- Profile Menu -->
                <div class="ml-4 relative">
                    @auth
                        <button
                            onclick="openProfileModal()"
                            class="flex items-center space-x-2 bg-gray-100 px-4 py-2 rounded hover:bg-gray-200">
                            <span>{{ auth()->user()->name }}</span>
                            <img src="{{ asset('images/profile.svg') }}" alt="Profile Picture" class="w-8 h-8 rounded-full">
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                    @endauth
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Profile Modal -->
    <div id="profileModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <!-- Close Button -->
            <button
                onclick="closeProfileModal()"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                ✖
            </button>

            <!-- Profile Content -->
            @auth
                <h2 class="text-xl font-bold mb-4">Your Profile</h2>
                <div class="space-y-4">
                    <div>
                        <label class="text-gray-700 font-medium">Name:</label>
                        <p class="text-gray-800">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <label class="text-gray-700 font-medium">Email:</label>
                        <p class="text-gray-800">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @else
                <p class="text-gray-700">You are not logged in. Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a>.</p>
            @endauth
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        function openProfileModal() {
            document.getElementById('profileModal').classList.remove('hidden');
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
        }
    </script>
</body>
</html>
