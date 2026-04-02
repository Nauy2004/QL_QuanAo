@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">O</span>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_orders'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">P</span>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Pending Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_orders'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">$</span>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['total_revenue'], 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">P</span>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_products'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-xl text-center">Manage Products</a>
            <a href="{{ route('admin.orders.index') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-xl text-center">Manage Orders</a>
            <a href="{{ route('admin.customers.index') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-4 rounded-xl text-center">Manage Customers</a>
            <a href="{{ route('admin.inventory.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-xl text-center">Manage Inventory</a>
        </div>
    </div>
</div>
@endsection