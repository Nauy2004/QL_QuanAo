@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $product->name }}</h1>

    <div class="bg-white/20 backdrop-blur-lg rounded-2xl shadow-lg p-6">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-xl mb-4">
        @endif

        <p class="text-gray-600 mb-4">{{ $product->description }}</p>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
            </div>
            <div>
                <strong>Quantity:</strong> {{ $product->quantity }}
            </div>
            <div>
                <strong>Category:</strong> {{ $product->category->name }}
            </div>
            <div>
                <strong>Created:</strong> {{ $product->created_at->format('M d, Y') }}
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-xl mr-2">Edit</a>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-xl">Back</a>
        </div>
    </div>
</div>
@endsection