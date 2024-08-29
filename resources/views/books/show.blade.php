@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4 bg-slate-600 text-white p-2 rounded-md">{{ $book->title }}</h1>
        <p class="text-lg mb-2"><strong class="font-semibold">Author:</strong> {{ $book->author }}</p>
        <p class="text-lg mb-4"><strong class="font-semibold">Description:</strong> {{ $book->description }}</p>
        <a href="{{ route('books.index') }}" class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Back to List</a>
    </div>
</div>
@endsection
