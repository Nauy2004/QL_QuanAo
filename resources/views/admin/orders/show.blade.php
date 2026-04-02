@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl">Back to Orders</a>
    </div>

    <!-- Order Information -->
    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Order Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <strong>Order ID:</strong> #{{ $order->id }}
            </div>
            <div>
                <strong>Status:</strong>
                <span class="px-2 py-1 rounded-full text-xs font-medium
                    @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                    @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                    @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                    @elseif($order->status == 'delivered') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <div>
                <strong>Customer:</strong> {{ $order->user->name }}
            </div>
            <div>
                <strong>Email:</strong> {{ $order->user->email }}
            </div>
            <div>
                <strong>Total:</strong> ${{ number_format($order->total, 2) }}
            </div>
            <div>
                <strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}
            </div>
        </div>
        @if($order->shipping_address)
        <div class="mt-4">
            <strong>Shipping Address:</strong><br>
            {{ $order->shipping_address }}
        </div>
        @endif
    </div>

    <!-- Order Items -->
    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h2 class="text-xl font-bold">Order Items</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($order->orderDetails as $detail)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($detail->product->image)
                                    <img src="{{ asset('storage/' . $detail->product->image) }}" alt="{{ $detail->product->name }}" class="w-10 h-10 rounded-lg mr-3">
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $detail->product->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $detail->product->category->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($detail->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $detail->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($detail->price * $detail->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right text-sm font-medium text-gray-900">Order Total:</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">${{ number_format($order->total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Status Update -->
    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Update Order Status</h2>
        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
            @csrf
            @method('PATCH')
            <div class="flex items-center space-x-4">
                <label for="status" class="text-sm font-medium text-gray-700">Status:</label>
                <select name="status" id="status" class="rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl">Update Status</button>
            </div>
        </form>
    </div>
</div>
@endsection