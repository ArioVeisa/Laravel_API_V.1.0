@extends('layouts.app')

@section('title', 'Add New Resource')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add New Resource</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/resources') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-bold mb-2">Resource Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded"
                value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 rounded" required>{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ url('/resources') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-600">Save
                Resource</button>
        </div>
    </form>
@endsection
