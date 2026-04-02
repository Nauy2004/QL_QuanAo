@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Our Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg overflow-hidden">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                    <form method="POST" action="{{ route('cart.add') }}" class="inline">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{ $products->links() }}
</div>
@endsection