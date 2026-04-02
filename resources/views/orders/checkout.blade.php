@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Checkout</h1>

    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-4">
                <label for="shipping_address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                <textarea name="shipping_address" id="shipping_address" rows="4" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('shipping_address') }}</textarea>
                @error('shipping_address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('cart.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-xl mr-2">Back to Cart</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-xl">Place Order</button>
            </div>
        </form>
    </div>
</div>
@endsection