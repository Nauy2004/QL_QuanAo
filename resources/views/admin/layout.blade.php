<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white/20 backdrop-blur-lg shadow-lg min-h-screen">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-6 text-gray-700 hover:bg-white/30 rounded-l-xl {{ request()->routeIs('admin.dashboard') ? 'bg-white/30' : '' }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-6 text-gray-700 hover:bg-white/30 rounded-l-xl {{ request()->routeIs('admin.products.*') ? 'bg-white/30' : '' }}">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-6 text-gray-700 hover:bg-white/30 rounded-l-xl {{ request()->routeIs('admin.orders.*') ? 'bg-white/30' : '' }}">Orders</a>
                <a href="{{ route('admin.customers.index') }}" class="block py-2 px-6 text-gray-700 hover:bg-white/30 rounded-l-xl {{ request()->routeIs('admin.customers.*') ? 'bg-white/30' : '' }}">Customers</a>
                <a href="{{ route('admin.inventory.index') }}" class="block py-2 px-6 text-gray-700 hover:bg-white/30 rounded-l-xl {{ request()->routeIs('admin.inventory.*') ? 'bg-white/30' : '' }}">Inventory</a>
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-6">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 px-6 text-red-600 hover:bg-red-50 rounded-l-xl">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>
</body>
</html>