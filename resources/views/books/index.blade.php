@extends('layouts.app')

@section('content')

@auth
  <div>welcome {{auth()->user()->name}}</div>  
@endauth
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">Your Books</h1>
    <a href="{{ route('books.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mb-6">Add New Book</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
            <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
                
                <div class="p-4">
                    <a href="{{route('books.show', $book)}}" class="text-xl font-semibold mb-2">{{ $book->title }}</a >
                    <p class="text-gray-700 mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                    
                    <div class="flex justify-between">
                        <a href="{{ route('books.edit', $book) }}" class="inline-block px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
